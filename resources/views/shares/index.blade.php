@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif

  <div class="row">
    <a href="{{ route('shares.create')}}" class="btn btn-primary">CREATE</a>
  </div>
  
   <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Cod</td>
          <td>Name</td>
          <td>Stock</td>
          <td >Edit</td>
          <td >Delete</td>
          
        </tr>
    </thead>
    <tbody>
        @foreach($shares as $share)
        <tr>
            <td>{{$share->id}}</td>
            <td>{{$share->cod}}</td>
            <td>{{$share->name}}</td>
            <td>{{$share->stock}}</td>
            <td><a href="{{ route('shares.edit',$share->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('shares.destroy', $share->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>

<div class="row"><a href="{{ route('import')}}" class="btn btn-primary">IMPORT JSON</a></div>



@endsection