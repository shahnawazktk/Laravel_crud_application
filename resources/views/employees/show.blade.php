@extends('welcome')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Employee Details</h2>

    <div class="mb-3">
        <p><strong>Name:</strong> {{ $employee->name }}</p>
        <p><strong>Email:</strong> {{ $employee->email }}</p>
        <p><strong>Phone:</strong> {{ $employee->phone }}</p>
        <p><strong>Position:</strong> {{ $employee->position }}</p>
        <p><strong>Salary:</strong> ${{ number_format($employee->salary, 2) }}</p>
    </div>

    <div>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back to List</a>
        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Edit</a>

        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>
@endsection
