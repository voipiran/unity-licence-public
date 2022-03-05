@extends('layouts.master')

@section('content')
    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('licences.store') }}" class="form-material" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>Enter The Licence You Recieve From Voipiran</label>
                                <textarea name="license" rows="5" class="form-control"></textarea>
                                <span class="error">{{ $errors->first('license') }}</span>
                                <span class="error">{{ $errors->first('invalid-licence') }}</span>
                                <span class="error">{{ $errors->first('error-occured') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('titles')
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Licences</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('licences.index') }}">Licenece</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </div>
@endsection

@section('css')
    <style>
        span.error{
            color: tomato;
        }
    </style>
@endsection