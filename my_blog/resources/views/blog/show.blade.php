@extends('layouts.layout')
@section('content')


<div class="row">
    <div class="col-12 pt-2">
        <a href="{{ route('blog.index')}}" class="btn btn-outline-primary">Retourner</a>
        <h4 class="display-5 mt-2">{{$blogPost->title}}</h4>
        <hr>
        <p>
            {{$blogPost->body}}
        </p>
        <p>
            <strong>Author: </strong>{{$blogPost->user_id}}
        </p>
    </div>
</div>
<div class="row">
    <!-- MODIFIER -->
    <div class="col-6">
        <a href="{{ route('blog.edit', $blogPost->id) }}" class="btn btn-primary">Modifier</a>
    </div>
    <!-- DELETER -->
    <div class="col-6">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletemodal">
            Effacer
        </button>

    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Effacer la données</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Etes-vous certain de bien vouloir effacer la données ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="" method="post">
                    @method('delete')
                    @csrf
                    <input type="submit" value="Effacer" class="btn btn-danger">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection