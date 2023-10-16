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

        <title>Team Pending</title>
    </head>
    <style>
        @media screen and (max-width: 796px) {
            .content {
                display: flex;
                flex-direction: column;
                overflow-x: auto;
            }
        }
    </style>

    <body>
        <div class="link w-200 mt-3 ms-5">
            <div class="link-content">
                <a href="{{ route('tournament.show', ['tournament' => $tournamentId]) }}" class="btn btn-primary">Back</a>
                <a href="{{ route('team.show', ['team' => $tournamentId]) }}" class="btn btn-success">Team Terdaftar</a>
            </div>
        </div>
        <div class="d-flex justify-content-center content">
            <table class="table caption-top text-center w-75 justify-content-center">
                <caption><a href="{{ route('team.index') }}" class="fw-bold text-decoration-none text-success fs-4">Team</a>
                </caption>
                <thead class="table-light">
                    <tr>
                        <th>Tournament</th>
                        <th>Nama Team</th>
                        <th>Nama Anggota</th>
                        <th>Kontak</th>
                        <th>Team Logo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($team as $item)
                        <tr class="align-middle">
                            <td>{{ $item->tournament->tournament }}</td>
                            <td>{{ $item->team }}</td>
                            <td style="white-space: pre-wrap">{{ $item->member }}</td>
                            <td>{{ $item->contact }}</td>
                            <td><img src="{{ asset('storage/' . $item->image) }}" style="width: 50px;"></td>
                            <td>
                                <div class="d-flex gap-2 p-3 w-100 justify-content-center">
                                    <form action="{{ route('antrian.ubah', ['id' => $item->id]) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-outline-primary" role="button" type="submit"><i
                                                class='bx bx-check bx-sm'></i></button>
                                    </form>
                                    <form action="{{ route('antrian.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger" type="submit"><i
                                                class='bx bx-trash bx-sm'></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" align="center">
                                <div class="alert alert-dark " role="alert" style="width:40rem;">
                                    Belum Ada Data
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </body>

    </html>
@stop
