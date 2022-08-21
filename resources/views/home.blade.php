@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><div class="form-group row mb-0">
                        <div class="col-sm-10" style="padding-top: 3%;">
                        <div  class="ml-4 text-sm text-gray-700 dark:text-gray-500 " >HOME</div>
                        </div>
                            <div class="col-sm-2">
                            <a  href="/manage_account">
                            <button id="manage_button" type="button" class="btn btn-primary" style="margin-right:13px;">MANAGE ACCOUNT</button></a>
                            </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('short') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="original_url" class="col-md-4 col-form-label text-md-end">{{ __('Input Original URL:') }}</label>
                                <div class="col-md-6">
                                        <input id="original_url" type="url" name="original_url">
                                </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-3 offset-md-4"> 
                            <a  href="/short}}">
                                <button type="submit" class="btn btn-primary" style = " width='10';">
                                            {{ __('short') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
