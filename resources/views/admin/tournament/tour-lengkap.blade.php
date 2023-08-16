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
            <table class="table caption-top text-center table-bordered">
                <caption><a href="{{ route('tournament.create') }}" class="fw-bold text-decoration-none text-success fs-4">+Add Tournament</a>
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
                                    <div class="delete">
                                        <form action="{{ route('tournament.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger w-20" type="submit">DELETE</button>
                                        </form>
                                    </div>
                                    <div class="update"> 
                                        <a class="btn btn-outline-success w-20" type="button" href="{{ route('tournament.edit', $item->id) }}">EDIT</a>
                                    </div>
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
