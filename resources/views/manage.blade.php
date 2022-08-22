@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container-fluid" style="padding-left: 10%;">
<div class="container">
        <div class="col-md-10" >
            <div class="card">
                <div class="card-header">
                    <div class="form-group row mb-0">
                        <div class="col-sm-10" style="padding-top: 1%;">{{ Auth::user()->name }}</div>
                            <div class="col-sm-2">
                                <button type="button" value="Go back!" onclick="history.back()" class="btn btn-primary" style="width: 130px;">
                                    {{ __('back') }}
                                </button>
                            </div>
                    </div>
                </div>
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-hover ">
                    <style>
                        table {
                            border: 1px solid #666;
                            table-layout: fixed;
                            width: 180px;
                        }
                        th,
                        td {
                            border: 1px solid #666;
                            width: 90px;
                            overflow: hidden;
                        }
                     </style>
                <thead>  
                    <tr>  
                             <th scope="col">URL ID</th>
                            <th  scope="col">LONG URL</th>
                            <th scope="col">SHORT URL</th>
                            <th scope="col">CREATED_ON</th>
                            <th scope="col">EDIT</th>
                            <th scope="col">DELETE</th>
                            <th scope="col">VIEW</th>
                    </tr>  
                </thead>  
                <tbody>  
                @foreach ($users as $user )

                        <tr>
                        <td>{{ $user->id}}</td>
                        <td>{{ $user->original_url }}</td>
                        <td>{{ $user->short_url }}</td>
                        <td>{{ $user->created_at}}</td>
                        <td style="float:center; ">
                        <form method="get" action="/click_edit/{{ $user -> id }}">
                                {{csrf_field()}}
                                {{method_field('GET')}}
                                <button type="submit" class="btn btn-success">
                                    <span><i style="color: 'white';" class="fa fa-fw fa-eraser"></i></span>
                                    edit
                                </button>
                            </form>
                            </td>
                            <td style="float:center; ">
                             <form method="post" action="/click_delete/{{ $user->id }}">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger">
                                    <span><i style="color: 'white';" class="fa fa-fw fa-trash"></i></span>
                                    delete
                                </button>
                            </form>
                            </td>
                            <td style="float:center; ">
                             <form method="get" action="/click_view/{{ $user->id }}">
                                {{csrf_field()}}
                                {{method_field('GET')}}
                                <button type="submit" class="btn btn-primary">
                                    <span ><i style="color: 'white';" class="fa fa-fw fa-eye"></i></span>
                                    view
                                </button>
                            </form>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach  
            </table>  
                </div>
            </div>
        </div>
</div>
    </div>

@endsection
