@extends('layouts.app')


@section ('content')

    @foreach ($posts as $post)
            <div class="">
                <div class="card mb-3" >
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src={{url($post->filename)}} class="card-img" alt="...">
                        </div>
                        <div class="col-md-8 ">
                            <div class="card-body">
                                <a class="card-title" href="{{url('post/'.$post->id)}}">{{$post->title}}</a>
                                {{-- <h5 class="card-title">{{$post->title}}</h5> --}}
                                <p class="card-text">{{$post->body}}</p>
                                {{-- <p class="card-text"><small class="text-muted">Ultima Actualizacion {{$post->updated_at}}</small></p> --}}
                                <p class="card-text"><small class="text-muted">Autor {{$post->user()->first()->name}}</small></p>
                                <small class="text-muted">
                                    <form action="{{url('posts', [$post->id])}}" method="POST">
                                    
                                        <input class="btn btn-danger" type="submit" value="Rechazar" />
                                    
                                        @method('DELETE')
                                    @csrf
                                </form>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>     
            </div> 
        
    @endforeach

@endsection
