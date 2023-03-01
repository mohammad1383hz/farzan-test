@extends('welcome')
@section('content')

    <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h3 class="card-title">model:{{$motorbike->model}}</h3>
    <h5 class="card-title">color:{{$motorbike->color}}</h5>
    <h5 class="card-title">weight:{{$motorbike->weight}}kg</h5>
    <h5 class="card-title">price:{{$motorbike->price}}$</h5>
  </div>
</div>


@endsection