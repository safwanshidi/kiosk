@auth
	@if(auth()->user()->role == 'ADMIN')
		@php 
			$role = 'staff/admin'; 
			$template = 'admin';
		@endphp
	@elseif(auth()->user()->role == 'FK BURSARY')
		@php 
			$role = 'staff/bursary';
			$template = 'admin';
		@endphp
	@else
		@php 
			$role = 'user';
			$template = 'participant';
		@endphp
	@endif
@endauth

@extends($template.'Template')

@section('content')
	<link href="/css/ManagePayment/payment.css" rel="stylesheet">
	<link href="/css/ManagePayment/table-normal.css" rel="stylesheet">

	<div class="background-content">
		<div class="title fs-4 container-fluid">View Receipt > User Receipt</div>
		<input type="hidden" value="{{$role}}" id="role">
		<div class="padding-content row">
			<div class="fs-4 fw-bold">User information</div>
			<div class="fs-5 fw-bold col-3">ID</div>
			<input id="uid" type="hidden" value='{{$receipt[0]->user_id}}'>
			<div class="fs-5 col-9">: {{$receipt[0]->user_id}}</div>
			<div class="fs-5 fw-bold col-3">Name</div>
			<div class="fs-5 col-9">: {{$receipt[0]->name}}</div>
		</div>
		<div class="fs-4 fw-bold padding-content">Receipts
			@if(!isset($record))
			<div class="d-flex pt-3">
				<!--select tpye -->
				<div class="me-5">
					<div class="fs-6">Type</div>
					<select class="grey-background fs-5 fw-bold px-3" id="type" name="type">
						<option id="all" value ="all">All</option>
						<option id="date" value ="date">Date</option>
					</select>
				</div>

				<!--select month-->
				<div class="me-5">
					<div class="fs-6">Month</div>
					<select class=" fs-5 fw-bold px-3" name="month" id="month" disabled>
						<?php
							for($i=1;$i<=12;$i++)
							{	
								if($i==date("n"))
								{
									echo "<option value =".$i." name='month' selected>".$i."</option>";
								}
								else
								{
									echo "<option value =".$i." name='month'>".$i."</option>";
								}
							}						
						?>
					</select>
				</div>
				<!--select year-->
				<div class="me-5">
					<div class="fs-6">Year</div>
					<select class=" fs-5 fw-bold px-3" name="year" id="year" disabled>
						<?php
							for($i=2015;$i<=2030;$i++)
							{
								if($i==date("Y"))
								{
									echo "<option value =".$i." name='year' selected>".$i."</option>"; 
								}
								else
								{
									echo "<option value =".$i." name='year'>".$i."</option>"; 
								}
							}
						?>
					</select>
				</div>
			</div>
			<table class="fs-5 mt-3">
				<thead>
					<tr>
						<th >Payment ID</th>
						<th>Date</th>
						<th>Paid Amout (RM)</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="tbody" class="fw-bold">
				@foreach($receipt as $single_receipt)
				<tr>
					<td>{{$single_receipt->id}}</td>
					<td>{{$single_receipt->date}}</td>
					<td>{{$single_receipt->amount}}</td>
					<td><a href="/{{$role}}/viewReceiptDetail?id={{$single_receipt->id}}&type=2">View Detail</a></td>
				</tr>
				@endforeach					  
				</tbody>	
			</table>
			@else
				<div class="item-center fs-4 fw-normal">No result</div>
			@endif	
		</div>	
	
		<script type="text/javascript" src="/js/ManagePayment/searchReceiptbyUid.js"></script>
	</div>
@endsection