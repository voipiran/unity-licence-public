@extends('layouts.master')

@section('content')
    <a href="{{ route('licences.create') }}" class="btn btn-success mb-4">Add New Licence</a>

    @if (Session::has('licence-success'))
        <div class="alert alert-success">
            {{ Session::get('licence-success') }}
        </div>
    @endif

    @if (count($licences))
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>Id</th>
                        <th>App Name</th>
                        <th>Version</th>
                        <th>Status</th>
                        <th>Type</th>
                    </thead>
                    <tbody>
                        @foreach ($licences as $licence)
                            <tr>
                                <td>{{ $licence->app_id }}</td>
                                <td class="app">{{ $licence->app }}</td>
                                <td>{{ $licence->app_verions }}</td>
                                <td>
                                    <div class="badge badge-success">{{ $licence->status }}</div>
                                </td>
                                <td>
                                    <div class="badge badge-warning">{{ $licence->type }}</div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="alert alert-warning">
            No Licence Added Yet!
        </div>
    @endif
@endsection

@section('titles')
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Licences</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Licenece</li>
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
        .app{
            text-transform: capitalize;
        }
    </style>
@endsection
