@extends("layouts.app")

@section('content')
<div class="d-flex justify-content-between mt-3">

<h1> Lista Progetti</h1>
    <a href="{{ route('projects.create') }}"><button class="btn btn-info text-white"> Aggiungi</button></a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Immagine</th>
            <th>Nome</th>
            <th>Tipologia</th>
            <th>Descrizione</th>
            <th>Link Github</th>
            <th>Visualizza</th>
            <th>Edita</th>
            <th>Elimina</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
        <tr>
            <td>
                <div>
                    <img style="width:60px" src="{{ asset('/storage/' . $project->cover_img) }}" alt=""></td>
                </div>
            <td>{{$project->name }}</td>
            <td>{{$project->type->name }}</td>
            <td>{{ Str::limit($project->description, 50) }}</td>
            {{-- <td> {{ $project->cover_img }}</td> --}}
             <td><a href="{{$project->github_link}}"> Link to GitHub </a></td>
            <td>
                <a href="{{ route('projects.show', $project->id) }}" >
                    <button class="btn btn-info text-white">Show</button>
                </a>
            </td>
            <td>
                <a href="{{ route('projects.edit', $project->id) }}">
                    <button class="btn btn-info text-white">Edit</button>
                </a>
            </td>
            <td>    
                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="delete-form d-inline-block">
                    @csrf()
                    @method('delete')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach  
    </tbody>
</table>


@endsection
