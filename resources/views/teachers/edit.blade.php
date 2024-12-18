@extends('welcome')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Edit Teacher</h2>
        <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $teacher->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $teacher->email }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" value="{{ $teacher->password }}" required>
            </div>
            <div class="form-group">
                <label for="class">Class:</label>
                <input type="text" name="class" id="class" class="form-control" value="{{ $teacher->class }}" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" name="subject" id="subject" class="form-control" value="{{ $teacher->subject }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
