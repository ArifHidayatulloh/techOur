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
    <style>
        .title {
            font-size: 15px;
        }

        .content .table {
            width: 75%;
        }

        .caption {
            margin-left: 10rem;
        }

        .btn {
            width: 50%;
        }

        @media screen and (max-width: 796px) {
            .content {
                flex-direction: column;
                overflow: auto;
                margin: 10px;
                margin-top: -15px;
            }

            .caption {
                margin-left: 0;
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
        <a href="{{ route('users.create') }}"
            class="caption d-flex fw-bold text-decoration-none text-success fs-4 mb-3">+Add
            User</a>
        <div class="d-flex justify-content-center content mb-3">
            <table class="table text-center">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>No Telpon</th>
                        <th>Role</th>
                        <th>Limit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                        <tr class="align-middle">
                            <td class="title">{{ $item->name }}</td>
                            <td class="text-break p-3" id="text-news">{{ $item->email }}</td>
                            <td class="text-break p-3" id="text-news">{{ $item->hp }}</td>
                            <td class="text-break p-3" id="text-news">{{ $item->role }}</td>
                            <td class="text-break p-3" id="text-news">{{ $item->limit }}</td>
                            <td>
                                <div class="d-flex gap-2 p-3 w-100 justify-content-center">
                                    <div class="update">
                                        <a class="btn btn-outline-warning w-100" type="button"
                                            href="{{ route('users.edit', $item->id) }}"><i class='bx bxs-edit-alt bx-sm'
                                                style="color: black"></i></a>
                                    </div>
                                    <div class="delete">
                                        <form action="{{ route('users.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger w-100" type="submit"><i
                                                    class='bx bx-trash bx-sm'></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- <script>
            const textNews = document.getElementById("text-news");

            const text = textNews.textContent;

            const kalimatArray = text.split(".");

            if (kalimatArray.length > 1) {
                const kalimatTerkondensasi = kalimatArray.slice(0, 1).join(".") + "...";
                textNews.textContent = kalimatTerkondensasi;
            }

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

        </script> --}}
    </body>

    </html>
@stop
