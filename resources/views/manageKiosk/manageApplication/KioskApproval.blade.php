<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@extends('layouts.pupukAdminNav')

@section('main-content')
<style>
    body {
        background-image: url('{{ asset('img/Background.jpg') }}');
        background-repeat: no-repeat;
        background-size: cover;
    }

    .container-fluid {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
    }

    .custom-table {
        width: 100%;
        margin-bottom: 1em;
    }

    .custom-table th, .custom-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .custom-table th {
        background-color: #f2f2f2;
    }
</style>

<div class="container-fluid">
    <h2 class="mt-4">Manage Applications</h2>
    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Application ID</th>
                            <th>Business Name</th>
                            <th>Business Role</th>
                            <th>Business Category</th>
                            <th>Business Information</th>
                            <th>Operating Hours</th>
                            <th>Start Date</th>
                            <th>SSM PDF</th>
                            <th>Business Proposal PDF</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $application)
                            <tr>
                                <td>{{ $application->applicationId }}</td>
                                <td>{{ $application->business_name }}</td>
                                <td>{{ $application->business_role }}</td>
                                <td>{{ $application->business_category }}</td>
                                <td>{{ $application->business_information }}</td>
                                <td>{{ $application->business_operating_hour }}</td>
                                <td>{{ $application->business_start_date }}</td>
                                <td><a href="{{ asset($application->ssm_pdf) }}" target="_blank">View PDF</a></td>
                                <td><a href="{{ asset($application->business_proposal_pdf) }}" target="_blank">View PDF</a></td>
                                <td>
                                    <button class="delete-btn" data-id="{{ $application->applicationId }}">Delete</button>
                                    <a href="{{ route('edit-kiosk', ['applicationId' => $application->applicationId]) }}" class="btn btn-success">Approval</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    $('.delete-btn').click(function () {
        if (confirm('Are you sure you want to delete this application?')) {
            var applicationId = $(this).data('id');

            // Get CSRF token
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Perform AJAX request to delete the application
            $.ajax({
                url: '/delete-application/' + applicationId,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function (response) {
                    // Reload the page or update the table as needed
                    location.reload();
                },
                error: function (error) {
                    console.error('Error deleting application:', error);
                }
            });
        }
    });
});
</script>

@endsection
