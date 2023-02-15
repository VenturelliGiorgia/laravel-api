@extends('layouts.app')

@section('content')
<div class="my-5">
    <div class="text-center my-5">
        <h1 class="">Progetto: {{ $project->name }} </h1>
    </div>
    <div class="row align-items-center">
        <div class="col-2">
            <div>
                <img class="img-fluid" src="{{ asset('/storage/' . $project->cover_img) }}" alt="">
            </div>
        </div>
        <div class="col">
            <ul class="list-group list-flush">
                <li class="list-group-item">
                    <span class="fw-bold">Description:</span>
                    <span>{{ $project->description }}</span>
                </li>
                <li class="list-group-item">
                    <span class="fw-bold">Type:</span>
                    <span>{{ $project->type->name }}</span>
                </li> 
                <li class="list-group-item">
                    <span class="fw-bold">Technology:</span>
                    @foreach ($project->technologies as $technology)
            <span class="badge rounded-pill text-bg-info">{{ $technology->name }}</span>
          @endforeach
                </li> 
                <li class="list-group-item">
                    <span class="fw-bold">Link GitHub: </span>
                    <span>{{ $project->github_link }}</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="text-center mt-5">
        <a href="{{route("projects.index")}}"><button class="btn btn-info text-white">Go to Index</button></a>
    </div>
</div>
@endsection