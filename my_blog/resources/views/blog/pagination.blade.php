@extends('layouts.layout')

@section('content')
<table class="table table-striped">
    <thead>
        <tr class="table-success">
            <th scope="col">#Id</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
        </tr>
    </thead>
    <tbody>
        @foreach($blogs as $blog)
        <tr>
            <td scope="row">{{ $blog->id }}</td>
            <td >{{ $blog->title }}</td>
            <td >{{ $blog->blogHasUser?->name }}</td>
        </tr>
        @endforeach

    </tbody>
</table>
<!-- on doit connecter bootstrap avec laravel pour ne pas detruire le design -->
{{ $blogs }}

@endsection