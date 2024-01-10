@extends('adminTemplate')

@section('content')
	<link href="/css/ManagePayment/payment.css" rel="stylesheet">
	<link href="/css/ManagePayment/uid-not-found.css" rel="stylesheet">
	
	<div class="background-content">
		<div class="title fs-4 container-fluid">Search Not Found</div>
			<div class="flex">
				<div class="row d-flex flex-column">
					<img id="wrong-img" src="/assets/wrong.png">
					<div class="sub-title-text fs-2 fw-bold">User Not Found</div>
					<button id="back-btn" class="align-self-center" ><img src="/assets/Refund_back.png" width="20px" height="20px"> Back</button>
				</div>		
			</div>
				
	</div>
@endsection
<script type="text/javascript" src="/js/ManagePayment/uidNotFound.js"></script>