@extends('layouts.app')
<style>
    
    .container {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .heading {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #007bff;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }
        .auth-links {
            margin-top: 20px;
        }
        .auth-links a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            margin: 0 10px;
        }
        .auth-links a:hover {
            text-decoration: underline;
        }
        /* Additional Styles */
        .form-container {
            margin-top: 50px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group input[type="date"],
        .form-group button {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }
        .form-group button {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
        .history {
            margin-top: 50px;
        }
        .history h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }
        .history ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .history ul li {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
    </style>
@section('content')
    <div class="container">
        <div>
            <h1 class="heading">Leave Tracker</h1>
            <div class="form-container">
                <form action="{{url('/')}}/submitLeave" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" id="start_date" name="start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" id="end_date" name="end_date" required>
                    </div>
                    <div class="form-group">
                        <label for="reason">Reason</label>
                        <input type="text" id="reason" name="reason" placeholder="Enter reason for leave" required>
                    </div>
                    <div class="form-group">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
          <div class="history" style="overflow:auto">
    <h2>Leave History</h2>
    <span>Accepted {{$acceptedCount}}</span>
    <span>Rejected {{$rejectedCount}}</span>
    <span>Pending {{$pendingCount}}</span>

    <ul>
        @foreach($leaveHistory as $leave)
            <li>
                <strong>User:</strong> {{ $leave->user->name }} |
                <strong>Start Date:</strong> {{ $leave->start_date }} |
                <strong>End Date:</strong> {{ $leave->end_date }} |
                <strong>Reason:</strong> {{ $leave->reason }} |
                <strong>Status:</strong> {{ $leave->status }}
            </li>
        @endforeach
    </ul>
</div>
        </div>
    </div>
@endsection
