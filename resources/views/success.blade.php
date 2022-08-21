@extends('layouts.app')

@section('content')
<<div class="container">  
    <h1> Your short link </h1> 
            <div class="card">  
                <div class="card-header">  
                <div class="col-sm-2">
                        <a  href=".{{ $new_url }}">{{ $short_url }}</a>
                    </div>
                </div>  
            </div>  
@endsection