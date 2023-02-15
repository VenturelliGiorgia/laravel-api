@extends('layouts.app')

@section('content')
<h1 class="mt-3">Modifica progetto {{ $project->id }}</h1>
<form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" class="form-control" name="name" value="{{ $project->name }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Descrizione</label>
        <textarea name="description" cols="30" rows="5" class="form-control">{{ $project->description }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Tipologia</label>
        <select class="form-select" name="type_id">
        <option></option>
        <option value="{{$project->type->id}}">{{$project->type->name}}</option> 
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Immagine</label>
        <input type="file" class="form-control" name="cover_img" value="{{ $project->cover_img }}">
    </div>
    <div class="mb-3">
        <label class="form-label d-block">Tecnologia</label>            
        @foreach ($technologies as $technology)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="technologyCheckbox_{{ $loop->index }}" value="{{ $technology->id }}" name="technologies[]" {{ $project->technologies->contains('id', $technology->id) ? 'checked' : '' }}>
                <label class="form-check-label" for="technologyCheckbox_{{ $loop->index }}">{{ $technology->name }}</label> 
            </div>
        @endforeach
    </div>
    <div class="mb-3">
        <label class="form-label">Link GitHub</label>
        <input type="text" class="form-control" name="github_link" value="{{ $project->github_link }}">
    </div>
    <button class="btn btn-info text-white" type="submit">Salva progetto</button>
</form>
@endsection