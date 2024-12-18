<!-- resources/views/teacher/report.blade.php -->
@extends('welcome')
@section('content')
    <div class="container">
        <h2>Teacher Report</h2>
        <table class="table table-bordered">
            <thead>

                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Class</th>
                        <th>Subject</th>
                        <th>Actions</th>


                    <!-- Add more fields as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($teachers as $teacher)
                    <tr>
                        <<td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>{{ $teacher->password }}</td>
                        <td>{{ $teacher->class }}</td>
                        <td>{{ $teacher->subject }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
