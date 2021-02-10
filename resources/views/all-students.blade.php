@extends('layouts.layout')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-center">All Students</h1>
            <a class="btn btn-success" href="/add-student">Add New Student</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            @if(Session::has('student_deleted'))
            <div class="alert alert-success">
                {{ Session::get('student_deleted') }}
            </div>
            @endif
            <table class="table table-striped shadow">
                <thead class="bg-dark text-light" style="background-color: #222">
                    <th width="5%" class="text-center">№</th>
                    <th width="30%" class="text-center">Name</th>
                    <th width="10%" class="text-center">Age</th>
                    <th width="10%" class="text-center">Profession</th>
                    <th width="20%" class="text-center">Profile Image</th>
                    <th width="25%" class="text-center">Functions</th>
                </thead>
                <tbody>
                    <?php $tableId = 0; ?>
                    @foreach($students as $student)
                    <tr>
                        <td style="padding-top:30px">{{ ++$tableId }}</td>
                        <td style="padding-top:30px">{{ $student->name }}</td>
                        <td style="padding-top:30px">{{ $student->age }}</td>
                        <td style="padding-top:30px">{{ $student->Profession }}</td>
                        <td><img src="{{asset('images')}}/{{ $student->profile_image }}" alt="Profile Image" style="width:100px; height: 100px; border-radius: 50%"></td>
                        <td style="padding-top:30px">
                            <a class="btn btn-primary" href="/edit-student/{{ $student->id }}">Edit</a>

                            <a class="btn btn-danger" href="/delete-student/{{ $student->id }}" onclick="confirm('Are you sure !?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">

        </div>
    </div>

</div>


@endsection