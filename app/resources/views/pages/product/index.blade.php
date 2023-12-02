@extends('layout.master')
@section('content')
<x-bread-crumb-component :modal=true modalType="Product" modalId="add_product" />
<x-modal-add-product-component/>
<x-table-component/>
@endsection
@push('extended-js')
  <script src="{{ asset('assets/core/product/table.js') }}"></script>
  <script src="{{ asset('assets/core/product/main.js') }}"></script>
@endpush