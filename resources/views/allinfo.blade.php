@extends('adminlte.layouts.dashboard')
@section('content')
<div class = "content-wrapper">
<div class = "container">

        <table class = "table">
            <thead>
              <tr>
                <th scope = "col">#</th>
                <th scope = "col">name</th>
                <th scope = "col">bio</th>
                <th scope = "col">province</th>
                <th scope = "col">gender</th>
                <th scope = "col">url</th>
                <th scope = "col">Country</th>

              </tr>
            </thead>
            @foreach ($get as $item)
            <tbody>
                <tr>
                  <th >{{$item->id }}</th>
                  <td>{{ $item->name }}</td>
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
                             <td> @if ( empty($item->countaries->name)  )
                                null
                                @else 
                                {{ $item->countaries->name }}
                            @endif           
                                 </td>   
                                            </tr>
              </tbody>
            @endforeach          
        </table>
    </div>
   

    
</div>
@endsection
