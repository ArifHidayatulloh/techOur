@extends('layout.header')
@section('index-content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('assets/css/admin/tournament/index.css') }}">
        <title>Tournament</title>
    </head>

    <body>
        <div class="content">
            <div class="session-container">
                <div class="sesion  d-flex justify-content-center mt-5" style="margin-bottom: -10px">
                    @if (session('success'))
                        <div class="alert alert-success w-75">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="competition">
                <div class="list">
                    @foreach ($competition as $item)
                    <div class="gambar">
                        <a href="{{ route('tournament.show', ['tournament' => $item->id]) }}"><img src="{{ asset('storage/' .$item->image) }}"
                        alt=""></a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>

    </html>
@stop
