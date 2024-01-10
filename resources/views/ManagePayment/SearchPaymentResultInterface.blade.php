@extends('adminTemplate')

@section('content')
	<link href="/css/ManagePayment/payment.css" rel="stylesheet">
	<link href="/css/ManagePayment/table-style.css" rel="stylesheet">
	
	<div class="background-content">
		<div class="title fs-4 container-fluid">Make Payment > Search Result</div>
		
		<!--user info-->
		<div class="padding-content row">
				<div class="fs-4 fw-bold">User Information</div>
				<div class="fs-5 col-2">ID</div><div class="fs-5 col-10">: {{$user['id']}}</div>
				<div class="fs-5 col-2">Name</div><div class="fs-5 col-10">: {{$user['name']}}</div>
			</div>
			
		@if($data == 'all settle')
			
			<div class="fs-4 fw-bold" align="center">All Arrears were settle.</div>
		
		@else
			
			<form class="padding-content"action="/staff/bursary/viewReceiptInterface">
				<div class="fs-4 fw-bold pb-2">Unsettle Arrears</div>
				<div class="fs-6 invalid-comment">{{$errors->first()}}</div>
				<div class="table-size d-flex flex-column">
					<table class="fs-5">
					  <thead>
						<tr>
						  <th ></th>
						  <th>Date</th>
						  <th>Amount (RM)</th>
						</tr>
					  </thead>
					  <tbody class="fw-bold">
							@foreach($data as $arrears_data)
								<tr>
									<td><input type="checkbox" id= "{{$arrears_data->id}}" name="arrearsId[]" value="{{$arrears_data->id}}">
									</td>
									<td>{{$arrears_data->date}}</td>
									<td>{{$arrears_data->amount}}</td>
								</tr>
							@endforeach					  
						
					  </tbody>	
					</table>	

					<input type="hidden" name="userId" value="{{$user['id']}}">
					<input class="btn-light-color align-self-end" id="pay-btn" type="button" value="Pay" data-bs-toggle="modal"data-bs-target="#exampleModal" >
					
					<!-- -->
					

				</div>
				<div class="modal" id="exampleModal" tabindex="-1">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<h5 class="item-center modal-title fs-3" id="amount-text">Are you sure to pay RM</h5>
								<div class="flex-boxs">
									<input type="submit" class="button-margin btn-light-color" value="Confirm">
									<button type="button" class="button-margin btn-grey-color" data-bs-dismiss="modal">Cancle</button>
								</div>
								
							</div>
							
						</div>
					</div>
				</div> 	  
			</form>

					 

		@endif			
		<script type="text/javascript" src="/js/ManagePayment/searchPaymentResult.js"></script>	
	</div>
@endsection
		