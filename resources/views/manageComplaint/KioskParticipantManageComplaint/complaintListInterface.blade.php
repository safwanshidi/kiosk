@extends('participantTemplate')

@section('content')
    <link href="/css/ManagePayment/payment.css" rel="stylesheet">
    <link href="/css/ManagePayment/table-normal.css" rel="stylesheet">

    @auth
        @if (auth()->user()->role == 'STUDENT' || auth()->user()->role == 'VENDOR')
            @php $template = 'participant'@endphp
        @else
            @php $template = 'admin'@endphp
        @endif
    @endauth

    <div class="background-content">
        <div class="title fs-4 container-fluid">Manage Complaint > Complaint List</div>

        <!-- search bar -->
        <form class="padding-content">
            <div class="px-5 invalid-comment">{{ $errors->first() }}</div>
            <div class="px-5 py-3 input-group">
                <input class="form-control form-control-lg fs-6 " placeholder="Complaint ID" type="text" name="uid">
                <button class="btn-ligth-no-margin" type="submit" id="btnn"><img
                        src="/assets/Search_black.png">Search</button>
            </div>
        </form>
        <form class="row">

            <!--complaint list-->
            <div class="fs-5 fw-bold padding-content row">

                <div class>
                    <table class="fs-6">
                        <thead>
                            <tr>
                                <th>Complaint Date</th>
                                <th>Complaint ID</th>
                                <th>Name</th>
                                <th>IC Number</th>
                                <th>Damage Type</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody class="fw-bold">
                            {{-- @foreach ($allArrears as $item)
                                    <tr>
                                        <td>{{ $item->users_id }}</td>
                                        <td>{{ $item->users_id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->users_ic }}</td>
                                        <td>{{ $item->amount }}</td>
                                        <td>{{ $item->amount }}</td>

                                    </tr>
                                @endforeach --}}
                        </tbody>
                    </table>

                </div>



            </div>
    </div>
@endsection
