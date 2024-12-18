<!-- resources/views/teacher/report.blade.php -->
@extends('welcome')
@section('content')
    <div class="container">
        <h2>Employee Report</h2>
        <table class="table table-bordered">
            <thead>

                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Position</th>
                        <th>Salary</th>
                        <th>Actions</th>


                    <!-- Add more fields as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>${{ number_format($employee->salary, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
