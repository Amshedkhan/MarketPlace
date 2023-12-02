@extends('layout.master')
@section('content')
<x-bread-crumb-component :modal=false />
   <div class="row">
    @foreach ($products as $item)
        <div class="col-md-3 card p-5 m-3">
            <h3>{{$item->name}}({{$item->qty}})</h3><hr>
            <p>{{$item->description}}</p> <hr>
            <form action="{{route('order.store',$item->id)}}" method="POST">
               @csrf
               <button type="submit">pay ${{$item->price}}</button>
            </form>
        </div>
    @endforeach
   </div>
@endsection
@push('extended-js')
@if (session('success'))
<script>
  showSuccessMessage("Success Done")
</script>
@endif
@endpush