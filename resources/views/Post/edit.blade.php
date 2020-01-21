@extends('layouts.app')


@section ('content')

<form method="POST" action={{"/posts/".$post->id."/update"}} role="form" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group">
      <label for="title">Titulo</label>
      <input type="text" class="form-control" id="title" placeholder="Elija un titulo" name="title" value={{$post->title}}>
    </div>
    <div class="form-group">
      <label for="body">Contenido</label>
      <textarea class="form-control" name="body" id="body" placeholder="Contenido">{{$post->body}}</textarea>
    </div>

    {{-- <div class="form-group">
        <label for="image">Imagen</label>
        <div class="col-md-4">
            <img src={{url($post->filename)}} class="card-img" alt="...">
        </div>
        <input type="file" class="form-control-file" id="file" name="file"/>
    </div> --}}
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
@endsection