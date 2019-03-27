@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Share
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
      <form method="post" action="{{ route('shares.update', $share->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Share code:</label>
          <input type="text" class="form-control" name="cod" value={{ $share->cod }} />
        </div>
        <div class="form-group">
          <label for="price">Share name :</label>
          <input type="text" class="form-control" name="name" value={{ $share->name }} />
        </div>
        <div class="form-group">
          <label for="quantity">Share stock:</label>
          <input type="text" class="form-control" name="stock" value={{ $share->stock }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection