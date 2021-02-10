@extends('layouts.layout')

@section('main-content')
<div class="container">
    <!-- <a class="btn btn-success" href="{{ route('student.addStudent') }}">Add New Student</a> -->
    <a class="btn btn-success" href="#">Add New Student</a>
    <!-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p class="lead">{{ $message }}</p>
        </div>
    @endif -->
    <table class="table table-hover">
        <thead class="bg-dark text-light">
            <th width="5%">№</th>
            <th width="30%">Name</th>
            <th width="10%">Age</th>
            <th width="10%">Profession</th>
            <th width="20%">Profile Image</th>
            <th width="25%">Functions</th>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->age }}</td>
                <td>{{ $student->Profession }}</td>
                <td>{{ $student->profile_image }}</td>
                <td>
                <form action="" method="post">
                    <button class="btn btn-outline-info" href="#">Show</button>
                    <button class="btn btn-outline-primary" href="#">Edit</button>
                
                 @csrf
                 @method('DELETE')   
                <button class="btn btn-outline-danger">Delete</button>     
                </form>            
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection