@extends('adminTemplate')

@section('content')
	<link href="/css/ManagePayment/payment.css" rel="stylesheet">
	<link href="/css/ManagePayment/table-normal.css" rel="stylesheet">
	
	<div class="background-content">
		<div class="title fs-4 container-fluid">View Users Arrears > Detail Arrears Info</div>
		<div class="item-center padding-content fs-3 fw-bold">Arrears Information</div>
		<div class="row padding-content fs-4">
		
			<div class="col-3">User ID</div><div class="col-9">: {{ $arrears[0]->users_id }}</div>
			<div class="col-3">Name</div><div class="col-9">: {{ $arrears[0]->name }}</div>
			
			@if(!empty($arrears[0]->amount))
			<?php
				$total = 0;
				foreach($arrears as $arrear)
				{
					$total +=$arrear->amount;  //sum the total amount
				}	
			?>			
			<div class="col-3">Total  Arrears (RM)</div><div class="col-9">: RM {{ $total }}</div>
		</div>
		
		
			<!--Detail of each arrear-->
			<div class="padding-content">
				<div class="fs-4 fw-bold">Detail Arrears</div>
				<table class="fs-5">
					<thead >
						<tr>
							<th >Date</th>
							<th>Amount (RM)</th>
						</tr>
					</thead>
					<tbody class="fw-bold">
					@foreach($arrears as $arrear)
					<tr>
						<td>{{$arrear->date}}</td>
						<td>{{$arrear->amount}}</td>
					</tr>
					@endforeach					  
					</tbody>	
				</table>
			</div>
		@else
			<div class="item-center">No Arrears.</div>
		@endif
	</div>
	
	


@endsection
