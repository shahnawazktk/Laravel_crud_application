@extends('welcome')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Students List</h2>
        <a href="{{ route('students.create') }}" class="btn btn-primary">Add New Student</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Father Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Picture</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->fname }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>
                            @if ($student->pic)
                                <img src="{{ Storage::url($student->pic) }}"
                                     alt="{{ $student->name }}'s picture"
                                     class="img-thumbnail"
                                     width="50"
                                     height="50">
                            @else
                                <span>No picture</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('students.show', $student->id) }}"
                                   class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('students.edit', $student->id) }}"
                                   class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('students.destroy', $student->id) }}"
                                      method="POST"
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this student?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No students found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $students->links() }}
    </div>
</div>
@endsection
