@extends('adminlte.layouts.dashboard')
@section('content')
<div class="content-wrapper">
<div class="container">
    <form action="{{ route('save.info') }}" method="post">
      @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">Bio</label>
        <input type="text" name="bio" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">province</label>
        <input type="text" name="province" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Url</label>
        <input type="text" name=" url" class="form-control" id="exampleInputPassword1">
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">select Gender</label>
        <select class="form-control" name="gender" id="exampleFormControlSelect1">
          <option value="male">male</option>
          <option value="female">Female</option>
        
        </select>
      </div>


      <button type="submit" class="btn btn-primary">Ok</button>
    </form>
  </div>
   
</div>
@endsection
