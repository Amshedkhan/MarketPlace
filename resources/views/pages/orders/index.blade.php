@extends('layout.master')
@section('content')
<x-bread-crumb-component :modal=false />
<x-table-component/>
@endsection
@push('extended-js')
  <script src="{{ asset('assets/core/order/table.js') }}"></script>
@endpush