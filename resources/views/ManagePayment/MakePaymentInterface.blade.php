@extends('adminTemplate')

@section('content')
	<link href="/css/ManagePayment/payment.css" rel="stylesheet">
	
	<div class="background-content">
		<div class="title fs-4 container-fluid">Make Payment > Search</div>
		
		@auth
			@if(auth()->user()->role == 'ADMIN')
				@php $role = 'admin' @endphp
			@elseif(auth()->user()->role == 'FK BURSARY')
				@php $role = 'bursary'@endphp
			@endif
		@endauth
		
		<form class="" action="/staff/{{$role}}/searchPaymentResult">
				<div class="flex">
					<div class="row d-flex flex-column">
						<div class="sub-title-text fs-2 fw-bold">Enter user ID</div>
						
						@if($errors->any())
							
							<div class="invalid-comment">{{$errors->first()}}</div>
						@endif
						
						<input class="form-control form-control-lg col-5 align-self-center fs-6" placeholder="user ID" type="text" name="userId" >
						<button id="submit-btn" class="col align-self-end" type="submit"><img src="/assets/Search_alt.png" width="20px" height="20px">Submit</button>
					</div>
					
				</div>
				
				
		</form>
	</div>
@endsection
