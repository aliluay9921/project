@extends('adminlte.layouts.dashboard')
@section('content')
<div class = "content-wrapper">
    <div class = "container">
        <div class="row">
            <div class="col-md-12">
                <h2>Upload image</h2>

                @if (session()->has('success'))
                    <div  class="alert alert-success alert-block" >
                        <button type="button" class="close" data-dismiss="alert" >*</button>
                        <strong>{{ session()->get('success') }}</strong>
                    </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                   @foreach ($errors->all() as $error)
                       {{ $error }}
                   @endforeach
                  </div>
                @endif

                <form action="{{ route('image.upload') }}" method="post" enctype="multipart/form-data" m-5>
                    @csrf
                    <div class="form-group">
                    <label for="">Upload images</label>
                    <input class="form-control" type="file" name="images[]" multiple>
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
