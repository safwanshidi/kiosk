<style>
    .btn-grad {
        background-image: linear-gradient(to right, #4776E6 0%, #8E54E9 51%, #4776E6 100%);
        margin: 0px;
        padding: 15px 45px;
        text-align: center;
        text-transform: uppercase;
        transition: 0.5s;
        background-size: 200% auto;
        color: white;
        box-shadow: 0 0 20px #eee;
        border-radius: 10px;
        display: block;
    }

    .btn-grad:hover {
        background-position: right center;
        color: #000000;
        text-decoration: none;
    }
</style>

@extends('layouts.userNav')

@section('main-content')
    <div class="container2" style="background-color: white; border-radius: 30px; margin-left: 100px; margin-right: 100px;">

        <form action="{{ route('apply-kiosk') }}" method="POST" enctype="multipart/form-data">

            <div class="mt-4 profile-header pr-5 pl-5 pt-3">
                <div class="text-center">
                    <h4 class="font-weight-bold mx-auto mt-2 profile-title mb-4">Apply for Kiosk</h4>
                </div>

                <hr class="border-0">

                <div class="d-flex align-items-center">
                    <div class="col-3">
                        <p><b>Business Name</b></p>
                    </div>

                    <div class="w-100">
                        <input type="text" class="form-control" id="business_name" name="business_name"
                            placeholder="Enter business name" required>
                    </div>
                </div>

                <hr class="border-0">

                <div class="d-flex align-items-center">
                    <div class="col-3">
                        <p><b>Business Role</b></p>
                    </div>


                    <div class="w-100">
                        <select class="form-select" id="business_role" name="business_role" required>
                            <option selected>Select business role</option>
                            <option value="FK Student">FK STUDENTS</option>
                            <option value="Vendor">VENDOR</option>
                        </select>
                    </div>
                </div>

                <hr class="border-0">

                <div class="d-flex align-items-center">
                    <div class="col-3">
                        <p><b>Business Category</b></p>
                    </div>

                    <div class="w-100">
                        <select class="form-select" id="business_category" name="business_category" required>
                            <option selected>Select business category</option>
                            <option value="Category1">Food & Baverages</option>
                            <option value="Category2">Apparel & Accessories</option>
                            <option value="Category3">Health & Beauty</option>
                            <option value="Category4">Sports & Lifestyle</option>
                            <option value="Category5">Home & Living</option>
                            <option value="Category6">Electronics & Accessories</option>
                            <option value="Category7">Books & Stationery</option>
                        </select>
                    </div>
                </div>

                <hr class="border-0">

                <div class="d-flex align-items-center">
                    <div class="col-3">
                        <p><b>Business Information</b></p>
                    </div>

                    <div class="w-100">
                        <textarea name="business_information" class="form-control" id="business_information" cols="30" rows="5"
                            placeholder="Enter business information"></textarea>
                    </div>
                </div>

                <hr class="border-0">

                <div class="d-flex align-items-center">
                    <div class="col-3">
                        <p><b>Operating Hours</b></p>
                    </div>

                    <div class="w-100">
                        <input type="text" class="form-control" id="business_operating_hour"
                            name="business_operating_hour" placeholder="Specify operating hours">
                    </div>
                </div>

                <hr class="border-0">

                <div class="d-flex align-items-center">
                    <div class="col-3">
                        <p><b>Start Date</b></p>
                    </div>

                    <div class="w-100">
                        <input type="date" class="form-control" id="business_start_date" name="business_start_date"
                            required>
                    </div>
                </div>

                <!-- Add other form fields as needed -->

                <hr class="border-0">

                <div class="d-flex">
                    <div class="col-3">
                        <p><b>Upload Documents</b></p>
                    </div>

                    <div class="mb-3">
                        <p style="font-weight: bold; color: black;">SSM<span style="font-weight: bold; color: red;">*</span>
                            <span style="font-weight: bold; color: black;">(.pdf only)</span></p>
                        <input class="form-control" type="file" id="ssm_pdf" name="ssm_pdf" required>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="col-3">

                    </div>

                    <div class="mb-3">
                        <p style="font-weight: bold; color: black;">BUSINESS PROPOSAL<span
                                style="font-weight: bold; color: red;">*</span> <span
                                style="font-weight: bold; color: black;">(.pdf only)</span></p>
                        <input class="form-control" type="file" id="business_proposal_pdf" name="business_proposal_pdf"
                            required>
                    </div>
                </div>

                <<hr class="border-0">

<div class="text-center mt-5">
    @csrf
    <button type="submit" class="btn pl-3 pr-3 mb-4 btn-grad" style="color: #ffffff"
        data-mdb-ripple-init>Apply</button>
</div>
</div>

</form>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function () {
$('.btn-grad').click(function () {
// Submit the form
$(this).closest('form').submit();
});
});
</script>
@endsection
