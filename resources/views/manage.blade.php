<!-- @extends('layouts.app')

@section('content')
<div class="container-fluid" style="padding-left: 10%;">
<div class="container">
    <div class="row">
        <div class="col-md-10" style="padding-left: 6%; height: 100%; position:fixed;">
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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">LONG URL</th>
                            <th scope="col">SHORT URL</th>
                            <th scope="col">CREATED_ON</th>
                            <th scope="col">ACTION</th>

                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user )

                        <tr>
                          <td>{{ $user->id}}</td>
                          <td>{{ $user->name}}</td>
                          <td>{{ $user->original_url }}</td>
                          <td>{{ $user->short_url }}</td>
                          <td>{{ $user->created_at}}</td>
                          <td style="float:center; ">
                                <span  style="margin-right:13px;"><i style="color:rgb(46, 99, 3);" class="fa fa-fw fa-eye"></i></span>
                                <span style="margin-right:13px;"><i style="color: rgb(189, 3, 3);" class="fa fa-fw fa-trash"></i></span>
                                <span ><i style="color: navy;" class="fa fa-fw fa-eraser"></i></span>
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

@endsection -->
