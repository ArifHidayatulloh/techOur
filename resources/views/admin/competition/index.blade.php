@extends('layout.header')
@section('index-content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <title>index</title>
    </head>

    <body>
        <div class="sesion d-flex justify-content-center mt-5">
            @if (session('success'))
                <div class="alert alert-success w-75">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="d-flex justify-content-center ms-5 me-5">
            <table class="table caption-top text-center table-bordered w-75">
                <!-- tabel -->
                <caption><a href="{{ route('competition.create') }}"
                        class="fw-bold text-decoration-none text-success fs-4">+
                        Add Competition</a></caption>
                <thead class="table-light">
                    <tr>
                        <th>Nama</th>
                        <th>Output Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($competition as $item)
                        <tr>
                            <td>{{ $item->competition }}</td>
                            <td><img src="{{ asset('storage/' . $item->image) }}" alt="" style="width: 50px;">
                            </td>
                            <td>
                                <div class="d-grid gap-2 p-3 d-md-flex justify-content-center">
                                    <div class="delete">
                                        <form action="{{ route('competition.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger" type="submit">DELETE</button>
                                        </form>
                                    </div>
                                    <div class="update">
                                        <a class="btn btn-outline-success w-100" type="button"
                                            href="{{ route('competition.edit', $item->id) }}">EDIT</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    {{-- <tr>
                <td>Mobile Legend</td>
                <td><img src="{{ ('assets/image/it/cyber-security.jpg') }}" alt="" style="width: 50px;"></td>
                <td>
                    <div class="d-grid gap-2 d-md-flex justify-content-center">
                        <button class="btn btn-outline-danger w-20" type="button">DELETE</button>
                        <button class="btn btn-outline-success w-20" type="button">EDIT</button>
                    </div>
                </td>
            </tr> --}}
                </tbody>
            </table>
        </div>
    </body>

    </html>
@stop
