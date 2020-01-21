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
                        <p class="card-text">
                            <small class="text-muted">
                                <form action="{{url('posts', [$post->id])}}" method="POST">
                                
                                    <input class="btn btn-danger" type="submit" value="Borrar" />
                                
                                    @method('DELETE')
                                @csrf
                            </form>
                                <a class="btn btn-primary" href={{url('/posts').'/'.$post->id.'/edit'}}>Editar</a>
                            </small>
                        </p>
                            
                            {{-- <a href={{url('/posts').'/'.$post->id.'/delete'}}>Borrar</a> --}}
                            
                        </div>
                    </div>
                    </div>
                </div>     
            </div> 
        
    @endforeach
</div>
@endsection