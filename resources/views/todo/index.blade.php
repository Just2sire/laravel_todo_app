@extends('todo.layout')

@section('title')
    Acceuil
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md col-lg">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-decoration-underline">Todo App</h2>
                    </div>

                    <div class="col-lg text-center d-none" id="tacheVide">
                        <div class="alert alert-danger alert-dismissible h5 text-danger fade show" role="alert">
                            Aucune tâche dans le repertoire
                            <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>

                    @if ($message = Session::get('message'))
                    <div class="col-lg text-center">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @endif
                    <div class="card-body">
                        <button class="btn btn-success btn-sm p-2" title="Ajouter une nouvelle tâche" onclick="addForm()">
                            New Task <i class="fa fa-plus" aria-hidden="true"></i> 
                        </button>
                        <br/>
                        <form action="/todo/store" method="POST" enctype="multipart/form-data" class="my-3 d-none" id="addTask">
                            @csrf
                            <div class="form-group pt-3">
                                <input class="form-control input-box" type="text" name="name" placeholder="Nom..." autocomplete="off">
                            </div>

                            <div class="form-group pt-3">
                                <input class="form-control input-box" type="text" name="sujet" placeholder="Sujet..." autocomplete="off">
                            </div>
    
                            <div class="form-group pt-3 mb10">
                                <textarea class="form-control textarea-box" rows="8" name="content" placeholder="Entrez votre message..."></textarea>
                            </div>

                            <div class="form-group text-center pt-3">
                                <button type="submit" class="btn btn-success">AJOUTER</button>
                            </div>
                        </form>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-dark table-hover table-bordered rounded text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Titre</th>
                                        <th>Contenu</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($todo as $item)
                                    <tr class="fst-italic">
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->sujet }}</td>
                                        <td class="w-50">{{ $item->content }}</td>
                                        <td class="justifiy-content.align">
                                            <a href="{{ url('/todo/' . $item->id . '/edit') }}" class="btn btn-warning btn-sm p-2" title="Editer une tâche">Editer <i class="fa-solid fa-pen"></i> 
                                            </a>
                                            <form action="{{ route('todo.destroy', $item->id) }}" method="post" style="display:inline" class="justify-content-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm p-2" title="Supprimer une tâche">Supprimer <i class="fa-solid fa-trash"></i> 
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                            <td><i>Vide...</i></td>
                                            <td><i>Vide...</i></td>
                                            <td><i>Vide...</i></td>
                                            <td><i>Vide...</i></td>
                                            <td class="justifiy-content.align">
                                                <a class="btn btn-warning btn-sm p-2" title="Editer une tâche" onclick="emptyTask()">Editer <i class="fa-solid fa-pen"></i> 
                                                </a>
                                                <a class="btn btn-danger btn-sm p-2" title="Supprimer une tâche" onclick="emptyTask()">Supprimer <i class="fa-solid fa-trash"></i></a>
                                            </td>
                                    </tr>                                    
                                @endforelse 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection