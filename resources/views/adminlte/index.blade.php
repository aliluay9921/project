@extends('adminlte.layouts.dashboard')
@section('content')
<div class="content-wrapper">
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Admin</h3>
    </div>
    <div class="box-body">
        {!! $dataTable->table([
        'class'=>'datatable table table-striped table-hover table-bordered'

        ]) !!}

    </div>
</div>
</div>
@push('js')

{!! $dataTable->scripts() !!}

@endpush
@endsection