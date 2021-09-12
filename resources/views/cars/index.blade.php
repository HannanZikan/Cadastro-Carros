@extends('cars.template')

@section('title','Visualizar Carros')

@section('content')
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
@if (\Session::has('warning'))
    <div class="alert alert-warning">
        <ul>
            <li>{!! \Session::get('warning') !!}</li>
        </ul>
    </div>
@endif
@if (\Session::has('error'))
    <div class="alert alert-danger">
        <ul>"form-text text-muted">Nome do Carro a ser cadastrado.</small>
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
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
            <li>{!! \Session::get('error') !!}</li>
        </ul>
    </div>
@endif
<button type="button" class="btn btn-success btn-icon btn-sm" title='Adicionar' onclick='location.href="{{ route('cars.create')}}"'>
  Adicionar
  <i class="fa fa-pen"></i>
</button>
<br>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Categoria</th>
        <th scope="col">Marca</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($cars->items() as $car)
        <tr>
          <th scope="row">{{$car->id}}</th>
          <td>{{$car->name}}</td>
          <td>{{$car->category->name}}</td>
          <td>{{$car->brand->name}}</td>
          <td>
            <button type="button" class="btn btn-info btn-icon btn-sm" title='Editar' onclick='location.href="{{ route('cars.edit', $car)}}"'>
              Editar
              <i class="fa fa-pen"></i>
            </button>
            <br>
            <form action="{{route('cars.destroy',[$car->id])}}" method="POST">
              @method('DELETE')
              @csrf
              <button  type="submit" class="btn btn-danger btn-icon btn-sm" title='Deletar'>
                Deletar
                <i class="fa fa-pen"></i>
              </button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{$cars->links()}}
@endsection