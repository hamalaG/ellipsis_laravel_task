@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="form-group row mb-0">
                    <div class="col-sm-10" style="padding-top: 3%;">
                        <div  class="ml-4 text-sm text-gray-700 dark:text-gray-500 " >HOME</div>
                    </div>
                    </div>
                </div>
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                <div class="card-body">
                            <head>
                                <title>Edit URL</title>
                            </head>
                            <body>
                                <form action = "/click_edit/{{ $user->id }}" method = "post">
                                    @csrf
                                    <table>
                                        <tr>
                                            <td>Long URL</td>
                                            <td>
                                            <Input id="original_url" type="url" name="original_url"/> {{ $user->original_url }}</td>
                                        </tr>
                                        <tr></tr>
                                        <tr>
                                            <td>Shortened URL</td>
                                            <td>
                                            <input  id="short_url" type="text" name ="short_url"/>{{ $user->short_url }}</td>
                                        </tr>
                                        <tr></tr>
                                        <tr>
                                            <td colspan = '2'>
                                            <input type = 'submit' value = "Update url" />
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </body>
            </div>
        </div>
    </div>
</div>
@endsection
