@extends('layout.header')
@section('index-content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <title>index</title>
    </head>

    <body>
        <div class="sesion d-flex justify-content-center mt-3">
            @if (session('success'))
                <div class="alert alert-success w-75">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="d-flex justify-content-center ms-5 me-5 mb-3">
            <table class="table caption-top text-center w-75">
                <!-- tabel -->
                <caption><a href="{{ route('competition.create') }}"
                        class="fw-bold text-decoration-none text-success fs-4">+
                        Add Competition</a></caption>
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($competition as $item)
                        <tr>
                            <td class="align-middle">{{ $item->competition }}</td>
                            <td class="align-middle"><img src="{{ asset('storage/' . $item->image) }}" alt=""
                                    style="width: 50px;">
                            </td>
                            <td>
                                <div class="d-grid gap-2 p-3 d-md-flex justify-content-center">
                                    <div class="update">
                                        <a class="btn btn-outline-warning w-100" type="button"
                                            href="{{ route('competition.edit', $item->id) }}"><i
                                                class='bx bxs-edit-alt bx-sm' style="color: black"></i></a>
                                    </div>
                                    <div class="delete">
                                        <form action="{{ route('competition.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger" type="submit"><i
                                                    class='bx bx-trash bx-sm'></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" align="center">
                                <div class="alert alert-dark " role="alert" style="width:40rem;">
                                    Belum Ada Data
                                </div>
                            </td>
                        </tr>
                    @endforelse
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
