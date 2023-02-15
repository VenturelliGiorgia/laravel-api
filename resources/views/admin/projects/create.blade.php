@extends("layouts.app")

 @section('content')
<h1 class="text-center mt-3">Nuovo Progetto</h1>

@if ($errors->any())
          <div class="alert alert-danger">
            I dati inseriti non sono validi:

            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        
    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
    @csrf 

    <div class="row justify-content-center">
        <div class="mb-3">
            <label class="form-label">Nome: </label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label class="form-label">Tipologia</label>
            <select class="form-select" name="type_id">
                <option></option>
                @foreach ($types as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
                </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Descrizione: </label>
            <textarea name="description" cols="30" rows="5" class="form-control"></textarea>
        </div>
        <div class="mb-3">
        <label class="form-label d-block">Tecnologia:</label>            
        @foreach ($technologies as $technology)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="technologyCheckbox_{{ $loop->index }}" value="{{ $technology->id }}" name="technologies[]">
                <label class="form-check-label" for="technologyCheckbox_{{ $loop->index }}">{{ $technology->name }}</label> 
            </div>
        @endforeach
    </div>
        <div class="mb-3">
            <label class="form-label">Link Github: </label>
            <input type="text" class="form-control" name="github_link">
        </div>
        <div class="mb-3">
            <label class="form-label">Immagine: </label>
            <input type="file" class="form-control" name="cover_img">
        </div>
    </div>
    <div class="text-center">
    <button class="btn btn-info text-white">Salva progetto</button>
    </div>
</form>
@endsection
