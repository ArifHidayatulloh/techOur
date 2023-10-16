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

        <title>News pending</title>
    </head>
    <style>
        .title {
            font-size: 15px;
        }

        @media screen and (max-width: 796px) {
            .caption {
                margin-bottom: 5rem;
            }

            .content {
                flex-direction: column;
                overflow: auto;
                margin: 7px;
                margin-top: -15px;
            }

            .content .table {
                width: 50rem;
            }
        }
    </style>

    <body>
        <div class="sesion d-flex justify-content-center mt-4">
            @if (session('success'))
                <div class="alert alert-success w-75">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <a href="{{ route('news.create') }}"
            class="caption d-flex fw-bold text-decoration-none text-success fs-4 ms-5 mb-3">+ Add
            News</a>
        <div class="d-flex justify-content-center content mb-5">
            <table class="table text-center ms-5 me-5">
                <thead class="table-light">
                    <tr>
                        <th>Maker</th>
                        <th>Title</th>
                        <th>Detail</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Poster</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($news as $item)
                        <tr class="align-middle">
                            <td>{{ $item->user->name }}</td>
                            <td class="title">{{ $item->title }}</td>
                            <td>
                                {{ Str::limit($item->content, '150', '...') }}
                            </td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->status }}</td>
                            <td><img src="{{ asset('storage/' . $item->image) }}" style="width: 80px"></td>
                            <td>
                                <div class="d-grid gap-2 p-3 text-center">
                                    <div class="update">
                                        <form action="{{ route('news.approve', ['id' => $item->id]) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-outline-primary" role="button" type="submit"><i
                                                    class='bx bx-check bx-sm'></i></button>
                                        </form>
                                    </div>
                                    <div class="delete">
                                        <form action="{{ route('news.destroy', $item->id) }}" method="post">
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
                            <td colspan="7" align="center">
                                <div class="alert alert-dark " role="alert" style="width:40rem;">
                                    Belum Ada Data
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <script>
            document.getElementById('show-popup').addEventListener('click', function() {
                document.getElementById('popup').style.display = 'block';
            });

            document.getElementById('close-popup').addEventListener('click', function() {
                document.getElementById('popup').style.display = 'none';
            });

            /* POP UP UPDATE */
            document.getElementById('show-popup-update').addEventListener('click', function() {
                document.getElementById('popup-update').style.display = 'block';
            });

            document.getElementById('close-popup-update').addEventListener('click', function() {
                document.getElementById('popup-update').style.display = 'none';
            });
        </script>
    </body>

    </html>
@stop
