@extends('adminlte.layouts.dashboard')
@section('content')
<div class = "content-wrapper">
    <div class = "container">
        <?php
        $i=1 
        ?>
     
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">البلد</th>
                <th scope="col">حالات مؤكدة جديدة</th>
                <th scope="col">مجموع الحالات </th>
                <th scope="col">عدد الوفيات الجدد</th>
                <th scope="col">عدد الوفيات الكلي</th>
                <th scope="col">حالات شفاء جديدة</th>
                <th scope="col">مجموع حالات الشفاء</th>


                

              </tr>
            </thead>
            @foreach ($res['Countries'] as $item)
            <tbody>
              <tr>
                
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $item['Country'] }}</td>
                <td>{{ $item['NewConfirmed'] }}</td>
                <td>{{ $item['TotalConfirmed'] }}</td>
                <td>{{ $item['NewDeaths'] }}</td>
                <td>{{ $item['TotalDeaths'] }}</td>
                <td>{{ $item['NewRecovered'] }}</td>
                <td>{{ $item['TotalRecovered'] }}</td>


              </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection
