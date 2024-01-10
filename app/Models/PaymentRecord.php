<?php
	namespace App\Models;
	use DB;
	
	class PaymentRecord
	{
		public function searchArrearsByUserId($id,$type)
		{
			/* Type
				
				0：search for make payment
				1: search for view arrears

			*/
			
			//if search by user id and id not null
			if(($type==0)&&($id!=null)) 
			{
				$users = DB::table('users')->find($id);

				//if found user in database, get & return unpaid arrears
				if($users!=null) 
				{
					$arrears = DB::table('arrears as arrears')
					->select('arrears.*','status.status','status.users_id')
					->where('status.users_id', $id)
					->where('status.status',0)
					->join('payment_status as status','status.arrears_id', '=','arrears.id')
					->get();
					
					$userInfo = [
									'id'=>$users->id,
									'name'=>$users->name
								];
					$arrearsInfo =[$userInfo,$arrears];
					return $arrearsInfo;                
				}
				else
				{
					return null;
				}
			}
			else
			{
				return null;
			}
		   		
		}
	    
		public function searchArrearsById($id)
		{
			$arrears = DB::table('arrears')
			->whereIn('id', $id)
			->select('amount','date')
			->get();
			return $arrears;        
		}
		
		public function updateArrearsStatus($arrearsId,$userId)
		{
			$affected = DB::table('payment_status')
				  ->where('users_id', $userId) ->whereIn('arrears_id',$arrearsId)
				  ->update(['status' => 1]);
	
		}
		
		public function  insertReceipt($userId, $total, $arrearsDate, $time, $date, $paymentId)
		{
		   DB::table('receipts')->insert(
				[
					'id' => $paymentId, 
					'date' => $date,
					'time'=> $time,
					'amount'=>$total,
					'months_of_pay'=>$arrearsDate,
					'user_id'=> $userId
				]
			);	
		}

		public function searchReceipt($payment_id)
		{
		   $payment_data =  DB::table('receipts')->find($payment_id);

		   return $payment_data;
		}
	
		public function searchAllArrears()
		{
			$arrears = DB::table('payment_status as status')
						->select(DB::raw('SUM(arrears.amount) as amount'),'status.users_id')
						->where('status.status',0) //记得改回0
						->join('arrears as arrears','arrears.id','=','status.arrears_id')
						->groupBy('status.users_id')
						->orderBy('amount', 'desc')
						->paginate(6);

			return $arrears; 
		
		}	
		
		public function searchArrearsByUIdView($id)
		{
			if(($id!=null))
			{
				$users = DB::table('users')->find($id);

				if($users!=null)
				{
					$arrears = DB::table('arrears as arrears')
					->select('arrears.amount','status.users_id','status.arrears_id')
					->where('status.users_id', $id)
					->where('status.status',0)//记得改回0
					->join('payment_status as status','status.arrears_id', '=','arrears.id')
					->paginate(6);
					
					return $arrears;  
					
								  
				}
				else
				{
					return null; //if user not found
				}
	   
				
			}
			else
			{
				return null;
			}        
		}

		public function searchArrearsDetail($data)
		{
			if($data->uid!=null)
			{
				$users = DB::table('users')->find($data->uid);
				
				if($users!=null)
				{
					$arrears = DB::table('payment_status as status')
					->select('arrears.amount','status.users_id','arrears.date','users.name')
					->where('status.users_id', $data->uid)
					->where('status.status',0) //记得改回0
					->join('arrears as arrears','arrears.id', '=','status.arrears_id')
					->join('users as users','users.id', '=','status.users_id') //改join left/right 因为要获取用户数据
					->get();
					
					//if all arrears settle
					if($arrears->isEmpty())
					{
						//only return user info
						$arrears = [
									(object)[
												'users_id'=> $users->id,
												'name' =>$users->name,
											],
									];
								
					}
					return $arrears;					
				}
				else
				{
					return null; // if user not found
				}
			}
			else
			{
				return null;
			}
			
			
			
		}
	}