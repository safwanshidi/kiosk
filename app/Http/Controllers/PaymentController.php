<?php

namespace App\Http\Controllers;

use App\Models\PaymentRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Carbon;


class PaymentController extends Controller
{
    //view make payment
	function viewMakePaymentPage()
    {
		return view('ManagePayment\MakePaymentInterface');
    }
	
	//view search result of arrears ,search by user ID
    function viewSearchPaymentPage(Request $request)
    {
		//type : 0 specific user
		//type ：1 all user 
		
			
		//validate request
		$validated = $request->validate([
			
			'userId' => ['required','regex:/^[0-9]+$/'],
			
		]);
		
		$paymentModel = new PaymentRecord();
		
		$data = $paymentModel->searchArrearsByUserId($request->userId,0);

		if(($data ==null))
		{
			return view('ManagePayment\UidNotFoundInterface');//return id not found page
		}
		else if($data[1]->isEmpty())
		{
			return view('ManagePayment\SearchPaymentResultInterface',['data'=>'all settle','user'=>$data[0]]); //if no unpaid arrears
		}
		else
		{	
			return view('ManagePayment\SearchPaymentResultInterface',['data'=>$data[1],'user'=>$data[0]]);
		}   
        
    }
	
	//process after click pay in make payment
	function handlePayment(Request $request)
	{
		//validate
		
		$validated = $request->validate([
			'arrearsId' => 'required|array',
			
		]);
		
		$arrearsId = $request->arrearsId;
		
		$paymentModel = new PaymentRecord();
		
		$data = $paymentModel->searchArrearsById($request->arrearsId);
		
		if(!$data->isEmpty())
		{
			$total = $this->calculateAmount($data);

			$this->updateArrears($arrearsId,$request->userId);

			$paymentData = $this->generateReceipt($data, $request->userId, $total);

			//type = 0 is view receipt after payment
			return view('ManagePayment\ViewReceiptInterface',['paymentData'=>$paymentData,'type'=>0]);

			
		}
	}

	//calc the total amount
	function calculateAmount($data)
	{
		$total=0;
		foreach($data as $amount)
		{
			$total = $total + $amount->amount;
			
		}
		return $total;
	}

	//update arrears
	function updateArrears($arrearsId,$userId)
	{
		$paymentModel = new PaymentRecord();
		$paymentModel->updateArrearsStatus($arrearsId,$userId);

	}
	
	//generate receipt
	function generateReceipt($arrears, $userId, $total)
	{
		//months for pay
		$arrearsDate=" ";
		foreach($arrears as $arrears)
		{
			$arrearsDate .= $arrears->date.",";
		}

		//get time
		$time = Carbon::now()->toTimeString();
		
		//get date
		$date = Carbon::now()->toDateString();

		//generate Payment id
		$paymentId = "PY".preg_replace('/[^0-9]/', '', $date).preg_replace('/[^0-9]/', '', $time);

		//insert receipt data
		$paymentModel = new PaymentRecord();
		$id = $paymentModel->insertReceipt($userId, $total,$arrearsDate,$time,$date,$paymentId);
		
		//search receipt data by payment id
		$paymentData = $paymentModel->searchReceipt($paymentId);
		
		//view payment data
		return $paymentData;
		

	}

	function viewArrearsInterface(Request $request)
	{
		//if request null(not input user id) or have pageination
		
		if(empty($request->all())||$request->filled('page'))
		{
			$paymentModel = new PaymentRecord();
	
			$allArrears = $paymentModel->searchAllArrears();
			
			return view('ManagePayment\ViewArrearsInterface',['allArrears'=>$allArrears]);
		}
		else
		{
			//validate userId
			$validated = $request->validate([
				
				'uid' => ['required','regex:/^[0-9]+$/'],
				
			]);		

			$paymentModel = new PaymentRecord();			

			$allArrears = $paymentModel->searchArrearsDetail($request);
			if($allArrears==null)
			{
				return view('ManagePayment\UidNotFoundInterface');//return id not found page
			}
			else
			{
				
				return view('ManagePayment\ViewArrearDetailInterface',['arrears'=>$allArrears]);
				
			}
		}


	}

	//view arrears detail page
	function viewArrearDetail(Request $request)
	{
		
		$paymentModel = new PaymentRecord();
	
		$allArrears = $paymentModel->searchArrearsDetail($request);
		return view('ManagePayment\ViewArrearDetailInterface',['arrears'=>$allArrears]);

	}
	
	//view monthy amount
	function setMonthlyAmount()
	{
		$paymentModel = new PaymentRecord();

		$amount = $paymentModel->searchMontlyAmount();
		
		return view('ManagePayment\SetMontlyAmountInterface',['amount'=>$amount]);		
	}

	//view modifyAmount page
	function modifyAmount()
	{
		return view('ManagePayment\ModifyAmountInterface');				
	}

	//update monthly amount
	function updateAmount(Request $request)
	{
		$paymentModel = new PaymentRecord();

		$message = $paymentModel->updateAmount($request->amount);
		 
		return $message;
	}
	
	//view recent receipt 
	function viewRecentReceip()
	{
		$paymentModel = new PaymentRecord();

		$receipt = $paymentModel->searchRecentReceipt();

		return view('ManagePayment\ViewRecentReceiptInterface',['receipt'=>$receipt]);				
	}

	function viewReceiptDetail(Request $request)
	{
		$paymentModel = new PaymentRecord();

		$paymentData = $paymentModel->searchReceipt($request->id);

		//type = 1 is for view Receipt
		//type = 2 is view Receipt by user ID
		if($request->type==2)
		{
			return view('ManagePayment\ViewReceiptInterface',['paymentData'=>$paymentData,'type'=>2]);			
		}
		else
		{
			return view('ManagePayment\ViewReceiptInterface',['paymentData'=>$paymentData,'type'=>1]);			
		}
		
	}	
	
	function searchReceiptById(Request $request)
	{
		
		$paymentModel = new PaymentRecord();
		
		if($request->type=='rid')
		{
			$validated = $request->validate([
				
				'uid' => ['required','regex:/^[0-9a-zA-Z]+$/'],
				
			]);			
			//select by receipt id
			
			$receipt = $paymentModel->searchReceipt($request->uid);

			if($receipt==null)
			{
				//return receipt not found page
				return view('ManagePayment\ReceiptNotFoundInterface');
			}
			else
			{
				//view receipt detail by receipt id
				return view('ManagePayment\ViewReceiptInterface',['paymentData'=>$receipt,'type'=>1]);	
					
			}

		}
		else
		{
			//select by user id	
			$validated = $request->validate([
				
				'uid' => ['required','regex:/^[0-9]+$/'],
				
			]);			

			$receipt = $paymentModel->searchReceiptById($request->uid);
			if($receipt->isEmpty())
			{
				return view('ManagePayment\UidNotFoundInterface');	
			}
			elseif($receipt[0]->id==null)
			{
				return view('ManagePayment\ViewUserRecptInterface',['receipt'=>$receipt,'record'=>'no']);	
			}
			else
			{
				return view('ManagePayment\ViewUserRecptInterface',['receipt'=>$receipt]);	
			}
								
		}
		

	}	
	
	function refreshReceipt(Request $request)
	{
		$paymentModel = new PaymentRecord();
		if($request->type=='all')
		{
			$receipt = $paymentModel->searchReceiptById($request->uid);
		}
		else
		{
			$receipt = $paymentModel->searchReceiptByDate($request->month,$request->year,$request->uid);
		}
		
		return view('ManagePayment\RefreshTable',['receipt'=>$receipt]);	
		
	}

	function checkDateStatus()
	{
		if(date('j')==date('j'))
		{
			/* if last day of a month, check whether status = 1
				1 = already update
				0 = not yet update
			*/
			$paymentModel = new PaymentRecord();
			$status = $paymentModel->searchStatus();	

			//if not update
			if($status->status!=1)
			{
				
				//get monthly payment amount
				$monthlyPayment = $paymentModel->searchMontlyAmount();	
				//create arrears for this month
				$id = $paymentModel->createArrear($monthlyPayment->amount);

				//create arrears status for all user for this month
				$result = $paymentModel->creareStatus($id);
				
				//update status = 1
				$status = $paymentModel->updateStatus(1);
			}			

		}
		else if (date('j')=='1')
		{
			// if first day  of  month, set status = 0
			$paymentModel = new PaymentRecord();
			$status = $paymentModel->updateStatus(0);
		
		}

	}

}
