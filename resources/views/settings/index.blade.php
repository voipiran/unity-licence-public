@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            Soon!
        </div>
    </div>
@endsection

@section('titles')
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Setting</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Setting</li>
        </ol>
    </div>
@endsection

@section('css')
    <style>
        table,
        td,
        th {
            text-align: center;
        }

    </style>
@endsection
