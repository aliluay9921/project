@extends('adminlte.layouts.dashboard')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <form action="{{ route('add.countary') }}" method="POST">

                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">code</label>
                    <input type="text" name="code" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">user_id</label>
                    <input type="text" name="user_id" class="form-control" id="exampleInputPassword1">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>




    </div>
@endsection
