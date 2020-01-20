@extends('layouts.app')


@section ('content')

    <form method="POST" action="/posts" role="form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="title">Titulo</label>
          <input type="text" class="form-control" id="title" placeholder="Elija un titulo" name="title">
        </div>
        <div class="form-group">
          <label for="body">Contenido</label>
          <textarea class="form-control" name="body" id="body" placeholder="Contenido"></textarea>
        </div>

        <div class="form-group">
          <label for="image">Imagen</label>
          <input type="file" class="form-control-file" id="file" name="file"/>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
@endsection