@extends('todo.layout')
@section('content')
<div class="conatiner">
  <div class="row">
    <div class="p-3 border col-lg-8 offset-lg-2 mt-2 rounded alert alert-warning">

      <h3 class="text-center text-decoration-underline">EDITER UNE TACHE</h3>
      
      <form action="{{ url('todo/' .$todo->id) }}" method="post" class="col-lg-8 offset-lg-2 p-3">
        {!! csrf_field() !!}
        @method("PATCH")
        <div class="form-group pt-3">
            <input type="hidden" name="id" id="id" value="{{$todo->id}}" id="id" />
        </div>

        <div class="form-group pt-3">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" value="{{$todo->name}}" class="form-control">
        </div>

        <div class="form-group pt-3">
            <label for="sujet">Sujet</label>
            <input type="text" name="address" id="sujet" value="{{$todo->sujet}}" class="form-control">
        </div>

        <div class="form-group pt-3">
            <label for="content">Commentaires</label>
            {{-- <textarea class="form-control textarea-box" rows="8" name="content" value="" placeholder="Entrez votre message...">{{$todo->content}}</textarea> --}}
            <input type="text" name="content" id="content" value="{{$todo->content}}" class="form-control p-3">
        </div>

        <div class="form-group pt-3 text-center">
            <input type="submit" value="EDITER" class="btn btn-success">
        </div>
      </form>
      <a href="{{url('todo')}}" class="btn btn-warning">Back</a>
    </div>
  </div>
</div>
@stop