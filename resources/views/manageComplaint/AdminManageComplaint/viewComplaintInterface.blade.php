@extends('adminTemplate')

@section('content')
	<link href="/css/ManagePayment/payment.css" rel="stylesheet">
	<link href="/css/ManagePayment/table-normal.css" rel="stylesheet">
	
	<div class="background-content">
		<div class="title fs-4 container-fluid">Manage Complaint > View Complaint Details</div>
		<div class="item-center padding-content fs-3 fw-bold">Complaint Information</div>
		<div class="row padding-content fs-4">
		
			<div class="col-3">Complaint ID</div><div class="col-9">: {{ $arrears[0]->users_id }}</div>
			<div class="col-3">Name</div><div class="col-9">: {{ $arrears[0]->name }}</div>
            <div class="col-3">Email</div><div class="col-9">: {{ $arrears[0]->email }}</div>
            <div class="col-3">Type of Damage</div><div class="col-9">: {{ $arrears[0]->email }}</div>
            <div class="col-3">Details</div><div class="col-9">: {{ $arrears[0]->email }}</div>
			
			<div class="d-flex justify-content-center padding-content">
				<button class="btn-ligth-no-width px-3" id="back-btn" >Back</button>
			</div>
		</div>
		
		@else
			<div class="item-center">No Complaint.</div>
		@endif
		<div class="d-flex justify-content-center padding-content">
			<button class="btn-ligth-no-width px-3" id="back-btn" >Back</button>
		</div>
		
	</div>
	<script type="text/javascript" src="/js/ManagePayment/uidNotFound.js"></script>
	


@endsection
