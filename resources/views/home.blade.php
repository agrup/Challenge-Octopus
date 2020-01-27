@extends('layouts.app')


@section ('content')
<div class="card-columns">
    @foreach ($posts as $post)

            <div class="container">
                <div class="card mb-3" style="max-width: 540px;">
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
                        <p class="card-text"><small class="text-muted">Creado {{Carbon\Carbon::parse($post->created_at)->format('d-m-Y')}}</small></p>

                    </div>
                    </div>
                    </div>
                </div>     
            </div> 
        
    @endforeach
</div>
@endsection
