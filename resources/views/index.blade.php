@extends('layouts.master')

@section('titles')
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Dashboard</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card-group">
        {{-- survey --}}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi {{ $survey->icon }} text-warning"></i></h2>
                        <h3 class="">Survey</h3>
                        <h6 class="card-subtitle">{{ $survey->installLabel }} , {{ $survey->licenceLabel }}</h6>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $survey->percent }}; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- webphone  --}}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi  {{ $webphone->icon }} text-success"></i></h2>
                        <h3 class="">Webphone</h3>
                        <h6 class="card-subtitle">{{ $webphone->installLabel }} , {{ $webphone->licenceLabel }}</h6>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $webphone->percent }}; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- autodialer  --}}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi {{ $autodialer->icon }} text-warning"></i></h2>
                        <h3 class="">Campaigns</h3>
                        <h6 class="card-subtitle">{{ $autodialer->installLabel }} , {{ $autodialer->licenceLabel }}</h6>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $autodialer->percent }}; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         {{-- callRequest  --}}
         <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi  {{ $callRequest->icon }} text-success"></i></h2>
                        <h3 class="">CallRequest</h3>
                        <h6 class="card-subtitle">{{ $callRequest->installLabel }} , {{ $callRequest->licenceLabel }}</h6>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $callRequest->percent }}; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
