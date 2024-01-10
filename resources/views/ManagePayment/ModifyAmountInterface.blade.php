@extends('adminTemplate')

@section('content')
	<link href="/css/ManagePayment/payment.css" rel="stylesheet">
	
	<div class="background-content">
		<div class="title fs-4 container-fluid">Set Monthly Payment > Modify Amount</div>
		<div class="big-padding">
			<div class="d-flex flex-column align-items-center">
				<div class="fs-3">Monthly Payment Amount</div>
				
				<div class="fs-4 fw-bold padding-content">
					<input type="text" id="amount" placeholder="Enter Amount (RM)" pattern="^[0-9]+(\.[0-9]{0,2})?$">
				</div>
			</div>
			
			<div class="d-flex justify-content-evenly padding-content">
				<button class="btn-ligth-no-width fs-5 " id="save-btn" data-bs-toggle="modal" data-bs-target="#saveModal" >&nbsp;&nbsp;Save&nbsp;&nbsp;</button>

				<a href="/staff/bursary/setMontlyAmount">
						<button class="btn-grey-color-no-width fs-5" >Cancel</button>
				</a>
				
			</div >
		</div>
		
	</div>
	<!--save Modal-->
    <div class="modal" id="saveModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
				<div class="modal-header">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<h5 class="modal-title fw-bold d-flex justify-content-center"id="amount-text">Are you sure modify monthly amount to RM </h5>
					<div class="padding-content d-flex justify-content-evenly ">
						<button type="button" class="btn-ligth-no-width" id="confirm-btn">Confirm</button>
						<button type="button" class="btn-grey-color-no-width" data-bs-dismiss="modal">&nbsp;&nbsp;Close&nbsp;&nbsp;</button>
					</div>
				</div>
            </div>
        </div>
    </div> 
	<!--success Modal-->
    <div class="modal" id="sucessModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
				<div class="modal-header">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body d-flex flex-column align-items-center">
					<img src="/assets/image 3.png" width="30px" height="30px" class="">
					<p class="fs-5 fw-bold">Success modify !</p>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>

            </div>
        </div>
    </div>
	<script type="text/javascript" src="/js/ManagePayment/modifyAmount.js"></script>	
@endsection