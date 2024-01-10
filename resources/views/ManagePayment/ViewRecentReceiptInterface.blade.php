@extends('adminTemplate')

@section('content')
	<link href="/css/ManagePayment/payment.css" rel="stylesheet">
	<link href="/css/ManagePayment/table-normal.css" rel="stylesheet">
	
	@auth
		@if(auth()->user()->role == 'ADMIN')
			@php $role = 'admin' @endphp
		@elseif(auth()->user()->role == 'FK BURSARY')
			@php $role = 'bursary'@endphp
		@endif
	@endauth
	
	<div class="background-content">
		<div class="title fs-4 container-fluid">View Receipt > Main</div>
			<form action="/staff/{{$role}}/searchReceiptById" class="big-padding">
				<div class="fs-6 invalid-comment">{{$errors->first()}}</div>
				<div class="input-group d-flex justify-content-center">
					<select class="grey-background fs-6 fw-bold" name="type">
					  <option value ="rid">Receipt ID</option>
					  <option value ="uid">User ID</option>
					</select>
					<input class="form-control" type="text" placeholder="Enter Receipt ID/ User ID" name="uid">
					<button class="btn-ligth-no-width" type="submit"><img width="20px" height="20px" src="/assets/Search_black.png">Search</button>
				</div>
			</form>
			<div class="padding-content">
				<div class="fs-5 fw-bold">Recent Receipts</div>
				<div class="padding-content">
					<table class="fs-5">
						<thead>
							<tr>
								<th >Payment ID</th>
								<th>User ID</th>
								<th>Paid Amout (RM)</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody class="fw-bold">
						@foreach($receipt as $single_receipt)
						<tr>
							<td>{{$single_receipt->id}}</td>
							<td>{{$single_receipt->user_id}}</td>
							<td>{{$single_receipt->amount}}</td>
							<td><a href="/staff/{{$role}}/viewReceiptDetail?id={{$single_receipt->id}}">View Detail</a></td>
						</tr>
						@endforeach					  
						</tbody>	
					</table>
				
				</div>
			</div>
		
	</div>
@endsection