@extends('welcome')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Teacher Details</h2>

        <div class="mb-3">
            <p><strong>Name:</strong> {{ $teacher->name }}</p>
            <p><strong>Email:</strong> {{ $teacher->email }}</p>
            <p><strong>Password:</strong> {{ $teacher->password }}</p>
            <p><strong>Class:</strong> {{ $teacher->class }}</p>
            <p><strong>Subject:</strong> {{ $teacher->subject }}</p>
        </div>

        <div>
            <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Back to List</a>
            <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-primary">Edit</a>

            <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
