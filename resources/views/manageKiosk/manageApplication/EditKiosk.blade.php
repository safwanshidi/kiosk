@extends('layouts.userNav')

@section('main-content')
    <div class="container" style="background-color: white; border-radius: 30px; margin-left: 100px; margin-right: 100px; padding: 20px;">
        <h2>Edit Application</h2>
        <!-- Display the selected application information here -->
        <p>Application ID: {{ $application->applicationId }}</p>
        <p>Business Name: {{ $application->business_name }}</p>
        <p>Business Role: {{ $application->business_role }}</p>
        <p>Business Category: {{ $application->business_category }}</p>
        <P>Business Information: {{ $application->business_information }}</p>
        <p>Operating Hour: {{ $application->business_operating_hour }}</p>
        <p>Start Date: {{ $application->business_start_date }}</p>
        

        
        <form action="{{ route('update-application', ['applicationId' => $application->applicationId]) }}" method="POST">


    @csrf
    @method('PUT') <!-- Use the PUT method for updating -->

    <div class="form-group">
        <label for="KioskNo">Kiosk Number</label>
        <input type="text" class="form-control" id="KioskNo" name="KioskNo" value="{{ $application->KioskNo }}" required>
    </div>

    <div class="form-group">
        <label for="kioskStatus">Kiosk Status</label>
        <select class="form-control" id="kioskStatus" name="kioskStatus" required>
            <option value="Approved">Approved</option>
            <option value="Waiting">Waiting</option>
            <option value="Rejected">Rejected</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update Application</button>
</form>
    </div>
@endsection
