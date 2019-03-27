@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Import Share
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('send') }}">
          <div class="form-group">
              @csrf
              <label for="name">Orden:</label>
              <select class="form-control" name="orden"/>
                <option>id</option>
                <option>+id</option>
                <option>-id</option>
              </select>
          </div>
           <div class="form-group">
              @csrf
              <label for="name">Indice de Elemento Inicial:</label>
              <input type="text" class="form-control" name="inicial"/>
          </div>
          <div class="form-group">
              @csrf
              <label for="name">Cantidad de elementos:</label>
              <input type="text" class="form-control" name="cant"/>
          </div>
          <div class="form-group">
              @csrf
              <label for="name">Pagina:</label>
              <input type="text" class="form-control" name="page"/>
          </div>
         
         
         
          </div>
          <button type="submit" class="btn btn-primary">SEND</button>
      </form>
  </div>
</div>
@endsection