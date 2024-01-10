@extends('adminTemplate')

@section('content')
	<link href="/css/ManagePayment/payment.css" rel="stylesheet">
	<link href="/css/ManagePayment/table-normal.css" rel="stylesheet">
	
	<div class="background-content">
		<div class="title fs-4 container-fluid">View Users Arrears > Search</div>
		
		<!-- search bar -->
		<form class="padding-content" action="/staff/bursary/viewArrearsInterface">
			<div class="px-5 invalid-comment">{{$errors->first()}}</div>
			<div class="px-5 py-3 input-group">
				<input class="form-control form-control-lg fs-6 " placeholder="user ID" type="text" name="uid" >
				<button class="btn-ligth-no-margin" type="submit" id="btnn"><img src="/assets/Search_black.png">Search</button>
			</div>
		</form>
		<form class="row">
 
		<!--arrears list-->
		<div class="fs-5 fw-bold padding-content row">
			<div class="pb-2 px-5">Users In Arrears</div>
			
				@if(!empty($allArrears))
					
					<div class="offset-1">
						<table class="fs-5">
							<thead >
								<tr>
									<th >User ID</th>
									<th>Arrears Amount (RM)</th>
									<th >Action</th>
								</tr>
							</thead>
							<tbody class="fw-bold">
								@foreach($allArrears as $item)
								<tr>
									<td>{{$item->users_id}}</td>
									<td>{{$item->amount}}</td>
									<td><a href="/staff/bursary/viewArrearDetailInterface?uid={{$item->users_id}}">View Detail</a>
									</td>
								</tr>
								@endforeach					  
							</tbody>	
						</table>
						
					</div>
					<div class="padding-content offset-4">{{$allArrears->links('bootstrapPagination')}}</div>
					
				@else
					<div class="fs-4">No result</div>
				@endif
		
		
		</div>
	</div>
	

	
@endsection