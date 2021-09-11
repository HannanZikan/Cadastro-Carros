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
<form action="{{route('cars.store')}}" method="POST">
  @method('POST')
  @csrf
  <div class="form-group">
    <label for="name">Nome do Carro</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Adicione o nome do Carro." required="required">
    <small id="nameHelp" class="form-text text-muted">Nome do Carro a ser cadastrado.</small>
  </div>
  <label for="category_id">Categoria do Carro</label>
  <select class="form-control" id='category_id' name="category_id">
    @foreach($categories as $category)
      <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
  </select>
  <label for="brand_id">Marca do Carro</label>
  <select class="form-control" id='brand_id' name="brand_id">
    @foreach($brands as $brand)
      <option value="{{$brand->id}}">{{$brand->name}}</option>
    @endforeach
  </select>
  <div class="form-group">
    <label for="capacity">Capacidade de Pessoas no Carro</label>
    <input type="text" class="form-control" id="capacity" name="capacity" placeholder="Adicione a capacidade de pessoas no Carro." required="required">
    <small id="capacityHelp" class="form-text text-muted">Capacidade de Pessoas no Carro a ser cadastrado.</small>
  </div>
  <div class="form-group">
    <label for="number_doors">Quantidade de portas do Carro</label>
    <input type="text" class="form-control" id="number_doors" name="number_doors" placeholder="Adicione a quantidade de portas do Carro." required="required">
    <small id="number_doorsHelp" class="form-text text-muted">Quantidade de portas do Carro a ser cadastrado.</small>
  </div>
  <div class="form-group">
    <label for="engine_type">Tipo de motor do Carro</label>
    <input type="text" class="form-control" id="engine_type" name="engine_type" placeholder="Adicione o tipo de motor do Carro." required="required">
    <small id="engine_typeHelp" class="form-text text-muted">Tipo de motor do Carro.</small>
  </div>


  
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
@push('scripts')
<script>
</script>
@endpush