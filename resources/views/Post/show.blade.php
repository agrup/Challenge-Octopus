@extends('layouts.app')


@section ('content')


<h1 class="bd-content-title">{{$post->title}}</h1>
<div class="content-body">
    <div class="form-group">
        <p >{{$post->body}}</p>
    </div>
    <div class="form-group">
        <hr>

    
    <form method="POST" action="{{"/posts/".$post->id."/publication"}}" role="form" enctype="multipart/form-data">
        @csrf

        <div class="input-group mb-3">
            <input type="text" name="publication" class="form-control" required placeholder="Comentar..." aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Comentar</button>
            </div>
          </div>
        {{-- <button type="submit" class="btn btn-primary">Guardar</button> --}}
      </form>
    </div>

    <div class="form-group">
        @foreach ($publications->reverse() as $publication)
        <div class="card">
            <div class="card-header">
              {{$publication->getUser($publication->user_id)}}
              Comento:
            </div>
            <div class="form-group">
                <div class="card-body">
                    <p class="card-text">{{$publication->publication}}</p>
                </div>
            </div>
        </div>
        <br>
        @endforeach
    </div>

</div>

@endsection