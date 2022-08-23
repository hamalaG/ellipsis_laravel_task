@extends('layouts.app')

@section('content')
<div class="container-fluid" style="padding-left: 14%;">
    <div class="row">
        <div class="col-md-10" style="padding-left: 6%; height: 100%; position: fixed;">
            <div class="card">
                <div class="card-header">
                    <div class="form-group row mb-0">
                        <div class="col-sm-10" style="padding-top: 1%;">URL INFORMATION</div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-primary" value="Go back!" onclick="history.back()" style="width: 130px;">
                                    {{ __('back') }}
                                </button>
                            </div>
                    </div>
                </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach ($users as $user )

                    <ul class="list-group" >
                        <li class="list-group-item"><strong>User Name: </strong>{{ $user->name}} </li>
                        <li class="list-group-item"><strong>Original URL: </strong>{{ $user->original_url}}</li>
                        <li class="list-group-item"><strong>Short URL: </strong>{{ $user->short_url}}</li>
                    </ul>
                    @endforeach
@endsection
