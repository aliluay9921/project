@extends('adminlte.layouts.dashboard')
@section('content')
<div class = "content-wrapper">
<div class = "container">

        <table class = "table">
            <thead>
              <tr>
                <th scope = "col">#</th>
                <th scope = "col">name</th>
                <th scope = "col">Email</th>
                <th scope = "col">bio</th>
                <th scope = "col">province</th>
                <th scope = "col">gender</th>
                <th scope = "col">url</th>
              </tr>
            </thead>
            @foreach ($getprofil as $item)
            <tbody>
                <tr>
                  <th >{{$item->id }}</th>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email }}</td>
                  <td> @if ( empty($item->profail_user->bio)  )
                    null
                      @else 
                      {{ $item->profail_user->bio }}
                  @endif     

                       </td>
                       <td> @if ( empty($item->profail_user->province) )
                        null
                        @else 
                        {{ $item->profail_user->province }}
                    @endif      
                         </td>
                         <td> @if ( empty($item->profail_user->gender)  )
                          null
                          @else 
                          {{ $item->profail_user->gender }}
                      @endif        
                           </td>
                           <td> @if ( empty($item->profail_user->url)  )
                            null
                            @else 
                            {{ $item->profail_user->url }}
                        @endif           
                             </td>     
                                            </tr>
              </tbody>
            @endforeach          
        </table>
    </div>
    <div  class  = "container">
    <form action = "{{ route('add.info') }}" method = "post">
        @csrf
        <div   class = "form-group">
        <label for   = "exampleInputEmail1">Name</label>
        <input type  = "text" name = "name"  value="{{ old('name') }}" class = "form-control" id = "exampleInputEmail1" aria-describedby = "emailHelp">
        </div>

        <div   class = "form-group">
        <label for   = "exampleInputEmail1">E-mail</label>
        <input type  = "email" name = "email" class = "form-control" id = "exampleInputEmail1" aria-describedby = "emailHelp">
        </div>

        <div   class = "form-group">
        <label for   = "exampleInputPassword1">Password</label>
        <input type  = "password" name = " password" class = "form-control" id = "exampleInputPassword1">
        </div>


        <button type = "submit" class = "btn btn-primary">Submit</button>
      </form>
    </div>

    
</div>
@endsection
