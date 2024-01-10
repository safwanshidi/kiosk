@extends('adminTemplate')

@section('content')
	<link href="/css/ManagePayment/payment.css" rel="stylesheet">
	<div class="background-content">
		<div class="title fs-4 container-fluid">Make Payment > View Receipt</div>
		<!--receipt title-->
		<div class="fs-3 fw-bold padding-content flex-boxs">Receipt</div>
		<!--receipt content-->
		<div class="padding-content">
			<div class="row fs-5">
				<div class="col-2">Payment ID</div><div class="col-10">: {{$paymentData->id}}</div>
				<div class="col-2">User ID</div><div class="col-10">: {{$paymentData->user_id}}</div>
				<div class="col-2">Payment Date</div><div class="col-10">: {{$paymentData->date}}</div>
				<div class="col-2">Payment Time</div><div class="col-10">: {{$paymentData->time}}</div>
				<div class="col-2">Total Amount</div><div class="col-10">: {{$paymentData->amount}}</div>
				<div class="col-2">Pay For</div><div class="col-10">: {{$paymentData->months_of_pay}}</div>
			</div>
		</div>
		
		<?php

		/*
			type = 0 is view receipt after payment
			type = 1 is for view Receipt
			type = 2 view receipt detail by user id
		*/

			if($type==1)
			{
				$action = '/staff/bursary/viewRecentReceipt'; 
			}
			else if ($type==2)
			{
				$action = '/staff/bursary/searchReceiptById?uid='.$paymentData->user_id.'&type=uid';     
			}
			else
			{
				$action = '/staff/bursary/makePayment';
			}
			

		?>
		<div class="flex-boxs">
			<input type="button" onclick="window.location.href = '{{$action}}'" class="btn-light-color" value="Close">
		</div>
		
	</div>


@endsection
