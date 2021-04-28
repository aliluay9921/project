@extends('adminlte.layouts.dashboard')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>send to telegeram </h2>
                    {{ $username }}
                    <form action="{{ route('storeTelegram') }}" method="post" m-5>
                        @csrf
                        <div class="form-group">
                            <label for="">send data </label>
                            <input class="form-control" type="text " name="text">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="store" class="btn btn-dark">

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
