@extends('layout.header')
@section('index-content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="{{ asset('assets/css/admin/tournament/tour-lengkap.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <title>INFO LENGKAP</title>
    </head>

    <body>
        <div class="card-body m-5 p-3 border">
            <table class="table caption-top text-center">
                <caption><a href="/form-tour" class="fw-bold text-decoration-none text-success fs-4">+Add Tournament</a>
                </caption>
                <thead class="table-light">
                    <tr>
                        <th>Nama</th>
                        <th>Lokasi</th>
                        <th>Tanggal</th>
                        <th>Regulasi</th>
                        <th>Hadiah</th>
                        <th>Contact</th>
                        <th>Poster</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tournament as $item)
                        <tr>
                            <td>{{ $item->tournament }}</td>
                            <td>{{ $item->location }}</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->challenges }}</td>
                            <td>{{ $item->prizes }}</td>
                            <td>{{ $item->contact }}</td>
                            <td><img src="{{ asset('storage/' .$item->image) }}" alt="" style="width: 50px;">
                            </td>
                            <td>
                                <div class="d-grid gap-2 d-md-flex justify-content-center">
                                    <button class="btn btn-outline-danger w-50" type="button">DELETE</button>
                                    <button class="btn btn-outline-success w-50" type="button">EDIT</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>

    </html>
@stop
