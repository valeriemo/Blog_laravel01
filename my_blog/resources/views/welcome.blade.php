@extends('layouts.layout')

@section('content')

    <p>Bienvenue dans notre blogue</p>
    <a href="{{ route('blog.index') }}" class="btn btn-outline-primary">Afficher les articles</a>
    
@endsection