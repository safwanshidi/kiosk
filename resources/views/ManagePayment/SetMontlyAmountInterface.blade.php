@extends('adminTemplate')

@section('content')
	<link href="/css/ManagePayment/payment.css" rel="stylesheet">
	
	<div class="background-content">
		<div class="title fs-4 container-fluid">Set Monthly Payment > Main</div>
		<div class="d-flex flex-column align-items-center big-padding">
			<div class="fs-3">Monthly Payment Amount</div>
			<div class="fs-3 fw-bold">RM {{ $amount->amount }}</div>
			<a href="/staff/bursary/modifyAmount" class="align-self-end">
				<button class="btn-ligth-no-width"><img src="/assets/Edit_fill.png" width="25px" height="25px"> Modify</button>
			</a>
		</div>
		
	</div>
@endsection