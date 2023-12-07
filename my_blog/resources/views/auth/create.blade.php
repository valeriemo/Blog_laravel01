@extends('layouts.layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">

            <form action="{{ route('registration')}}" method="post">
                @csrf
                <div class="card-header display-6 text-center">
                    Créer un nouvel utilisateur
                </div>
                <div class="card-body">
                    <div class="control-group col-12">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                        <div class="text-danger">
                            {{$errors->first('name')}}
                        </div>
                        @endif
                    </div>
                    <div class="control-group col-12">
                        <label for="username">Username</label>
                        <input type="email" id="username" name="email" class="form-control" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                        <div class="text-danger">
                            {{$errors->first('email')}}
                        </div>
                        @endif
                    </div>
                    <div class="control-group col-12">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    @if ($errors->has('password'))
                    <div class="text-danger">
                        {{$errors->first('password')}}
                    </div>
                    @endif
                </div>
                <div class="card-footer text-center">
                    <input type="submit" value="Sauvegarder" class="btn btn-success">
                </div>
            </form>

        </div>
    </div>
</div>

@endsection