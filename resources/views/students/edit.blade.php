@extends('welcome')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Edit Student</h2>
        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}" required>
            </div>
            <div class="form-group">
                <label for="name">Father Name</label>
                <input type="text" name="fname" id="fname" class="form-control" value="{{ $student->fname }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $student->email }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $student->phone }}" required>
            </div>
            <div class="form-group">
                <label for="pic">Profile Picture</label>
                <input type="file" name="pic" id="pic" class="form-control" accept="image/*" required>
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
