@extends('layouts.app')

@section('content')
    <h1>Student Details</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $student->first_name }} {{ $student->last_name }}</h5>
            <p><strong>Student ID:</strong> {{ $student->student_id }}</p>
            <p><strong>Email:</strong> {{ $student->email }}</p>
            <p><strong>Phone:</strong> {{ $student->phone ?? 'N/A' }}</p>
            <p><strong>Address:</strong> {{ $student->address ?? 'N/A' }}</p>
            <h6>QR Code:</h6>
            {!! $qrCode !!}
        </div>
    </div>
    
    <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    <a href="{{ route('students.edit', $student) }}" class="btn btn-primary mt-3">Edit</a>
@endsection