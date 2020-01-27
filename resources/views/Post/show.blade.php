@extends('layouts.app')


@section ('content')


{{-- <script src="https://cdn.jsdelivr.net/npm/vue"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<div class="content-body">
    <div class="mb-3">
        <h1 class="bd-content-title">{{$post->title}}</h1>
        <img src={{url($post->filename)}} class="img-thumbnail" alt="...">
        
        <p >{{$post->body}}</p>
    </div>    
    <p class="card-text"><small class="text-muted">Creado {{Carbon\Carbon::parse($post->created_at)->format('d-m-Y')}}</small></p>

    <div id="app" class="btn-toolbar justify-content-between">

    <div class="btn-group">

        <like-component post="{{$post->id}}"></like-component>
    </div>
    @if(Auth::user()->isAdmin())
        <div class="btn-group">
            <form action="{{url('posts', [$post->id])}}" method="POST">
            
                <input class="btn btn-danger" type="submit" value="Rechazar" />
            
                @method('DELETE')
                @csrf
            </form>
        </div>
    @endif
    </div>
    <hr>
    <div class="form-group">
    
    <form method="POST" action="{{"/posts/".$post->id."/publication"}}" role="form" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <input type="text" name="publication" class="form-control" required placeholder="Comentar..." aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Comentar</button>
            </div>
          </div>
 
      </form>

    </div>

    <div class="form-group">
        @foreach ($publications->reverse() as $publication)
        <div class="card">
            <div class="card-header">
              {{$publication->getUser($publication->user_id)}}
              Comento..
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

{{-- <script>

    const app = new Vue({
        el: '#app',
        data:{
            likesvalue: '3'
        }
    });

</script> --}}
@endsection
