@extends('welcome')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Student Details</h2>
        <div class="card">
            <div class="card-body">
                <p><strong>Name:</strong> {{ $student->name }}</p>
                <p><strong>Father Name:</strong> {{ $student->fname }}</p>
                <p><strong>Email:</strong> {{ $student->email }}</p>

                <p><strong>Phone:</strong> {{ $student->phone }}</p>
                <p><strong>Picture:</strong> {{ $student->pic }}</p>
                <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back</a>
            </div>
        </div>
    </div>
@endsection
