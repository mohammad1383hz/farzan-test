@extends('welcome')
@section('content')
<div class="container-fluid">
<div class="mb-2">
  <a href={{route('motorbike.create')}} class="btn btn-success">create motorbikes</a>
  </div>
<div class="row">
<div class="col-sm-1"><a href="/motorbikes?sort=time" class="btn btn-primary">sort time</a>
</div>
  <div class="col-sm-1"><a href="/motorbikes?sort=price" class="btn btn-primary">sort price</a>
</div>
<div>
</div>
    <br/>
    <br/>

<ul class="list-group">
<h3>filter by color:</h3>
@foreach ($colors as $color)
  <li class="list-group-item">
  <a href="/motorbikes?color={{$color->color}}" class="btn btn-secondary">{{$color->color}}</a>
  </li>
@endforeach
</ul>
<br/>
  <br/>
@foreach ($motorbikes as $motorbike)

<div class="card col-sm-3 mt-5">
  <img class="card-img-top" style="width:200px;height:200px;" src="{{ asset('images/'.$motorbike->image) }}" alt="Card image cap">
  <div class="card-body">
    <h3 class="card-title">{{$motorbike->model}}</h3>
    <a href={{route('motorbike.show',['motorbike'=>$motorbike->id])}} class="btn btn-primary">Go detail</a>
  </div>
</div>
@endforeach
</div>
</div>
{{ $motorbikes->withQueryString()->links('vendor.pagination.bootstrap-4') }}
@endsection