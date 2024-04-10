@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Leave Requests</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Duration</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leaves as $leave)
                    <tr>
                        <td>{{ $leave->id }}</td>
                        <td>{{ $leave->user->name }}</td>
                        <td>{{ $leave->start_date }}</td>
                        <td>{{ $leave->end_date }}</td>
                        <td>{{ $leave->duration }}</td>
                        <td>{{ $leave->reason }}</td>
                        <td>{{ $leave->status }}</td>
                        <td>
                            @if($leave->status == 'pending')
                                <form action="{{ route('admin.leave.approve', $leave->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Approve</button>
                                </form>
                                <form action="{{ route('admin.leave.reject', $leave->id) }}" method="POST" style="margin-top:10px"> 
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Reject</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
