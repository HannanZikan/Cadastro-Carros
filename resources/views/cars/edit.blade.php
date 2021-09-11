@extends('cars.template')

@section('title','Visualizar Carros')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method='POST' action="{{route('cars.update',$carResource->id)}}" method="POST">
  @method('PUT')
  @csrf
  <div class="form-group">
    <label for="name">Nome do Carro</label>
    <input type="text" class="form-control" value="{{old('name',$carResource->name)}}" id="name" name="name" placeholder="Adicione o nome do Carro." required="required">
    <small id="nameHelp" class="form-text text-muted">Nome do Carro a ser cadastrado.</small>
  </div>
  <div class="form-group">
    <label for="category_id">Categoria do Carro</label>
    <select class="form-control" id='category_id' name="category_id">
      @foreach($categoriesResource as $category)
        <option value="{{$category->id}}" @if($carResource->category_id == $category->id) selected="selected" @endif>{{$category->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="brand_id">Marca do Carro</label>
    <select class="form-control" id='brand_id' name="brand_id">
      @foreach($brandsResource as $brand)
        <option value="{{$brand->id}}" @if($carResource->brand_id == $brand->id) selected="selected" @endif>{{$brand->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="capacity">Capacidade de Pessoas no Carro</label>
    <input type="text" class="form-control" value="{{old('capacity',$carResource->capacity)}}" id="capacity" name="capacity" placeholder="Adicione a capacidade de pessoas no Carro." required="required">
    <small id="capacityHelp" class="form-text text-muted">Capacidade de Pessoas no Carro a ser cadastrado.</small>
  </div>
  <div class="form-group">
    <label for="number_doors">Quantidade de portas do Carro</label>
    <input type="text" class="form-control" value="{{old('number_doors',$carResource->number_doors)}}" id="number_doors" name="number_doors" placeholder="Adicione a quantidade de portas do Carro." required="required">
    <small id="nameHelp" class="form-text text-muted">Quantidade de portas do Carro a ser cadastrado.</small>
  </div>
  <div class="form-group">
    <label for="engine_type">Tipo de motor do Carro</label>
    <input type="text" class="form-control" value="{{old('engine_type',$carResource->engine_type)}}" id="engine_type" name="engine_type" placeholder="Adicione o tipo de motor do Carro." required="required">
    <small id="nameHelp" class="form-text text-muted">Tipo de motor do Carro.</small>
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
@push('scripts')
<script>
</script>
@endpush