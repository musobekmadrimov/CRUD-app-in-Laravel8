@extends('layouts.layout')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <h1>Adding a Student</h1>
            @if(Session::has('student_added'))
            <div class="alert alert-success">
               {{ Session::get('student_added') }}
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data" style="width: 50%; margin: 0 auto">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="text" name="age" class="form-control">
                </div>
                <div class="form-group">
                    <label for="profession">Profession:</label>
                    <input type="text" name="profession" class="form-control">
                </div>
                <div class="form-group">
                    <label for="file">Photo:</label>
                    <input type="file" name="file" class="form-control" onchange="previewFile(this)">
                </div>
                <div class="form-group d-flex align-align-items-center justify-content-center">
                    <img alt="Profile Photo" id="previewImg" style="max-width: 100px; margin: 0 auto; border-radius: 50%">
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>

</div>
<script>
    function previewFile(input){
        let file = $('input[type=file]').get(0).files[0];
        if(file){
            let reader = new FileReader();
            reader.onload = function(){
                $('#previewImg').attr('src', reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>

@endsection