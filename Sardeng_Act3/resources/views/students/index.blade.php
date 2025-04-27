@extends('layouts.app')

@section('content')
    <h1>Students</h1>
    
    <div class="mb-3">
        <form action="{{ route('students.index') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search students..." value="{{ $search ?? '' }}">
                <button type="submit" class="btn btn-outline-primary">Search</button>
            </div>
        </form>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Student ID</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                    <td>{{ $student->student_id }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                        <a href="{{ route('students.show', $student) }}" class="btn btn-outline-info">View</a>
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-outline-primary">Edit</a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $students->links() }}
@endsection