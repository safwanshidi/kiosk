@extends('layouts.app') {{-- Use the appropriate layout --}}

@section('content')
    <div class="container">
        <h2>Kiosk Participants</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Kiosk ID</th>
                    <th>Application ID</th>
                    <th>User ID</th>
                    <th>Kiosk No</th>
                    <th>Kiosk Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kioskApprovals as $kioskApproval)
                    <tr>
                        <td>{{ $kioskApproval->kioskID }}</td>
                        <td>{{ $kioskApproval->application_id }}</td>
                        <td>{{ $kioskApproval->user_id }}</td>
                        <td>{{ $kioskApproval->KioskNo }}</td>
                        <td>{{ $kioskApproval->kioskStatus }}</td>
                        <td>{{ $kioskApproval->created_at }}</td>
                        <td>{{ $kioskApproval->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
