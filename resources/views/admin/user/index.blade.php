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
    <style>
        .title {
            font-size: 15px;
        }

        .tbl{
            margin-left: 5rem;
            margin-right: 5rem;
        }

        @media screen and (max-width: 796px) {
            .title {
                font-size: 15px;
            }

            .content {
                width: 420px;
                margin-top: -15px;
            }

            .content .tbl{
                margin-left: 1rem;
                margin-right: 1rem;
            }

            .btn{
                flex-direction: column;
            }
        }
    </style>

    <body>
        <div class="sesion d-flex justify-content-center mt-5">
            {{-- @if (session('success'))
            <div class="alert alert-success w-75">
                {{ session('success') }}
            </div>
            @endif --}}
        </div>
        <div class="d-flex justify-content-center content">
            <table class="table caption-top text-center table-bordered tbl">
                <caption><a href="" class="fw-bold text-decoration-none text-success fs-4">+Add User</a>
                </caption>
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                        <tr>
                            <td class="title">{{ $item->name }}</td>
                            <td class="text-break p-3" id="text-news">{{ $item->email }}</td>
                            <td class="text-break p-3" id="text-news">{{ $item->role }}</td>
                            <td>
                                {{ $item->id }}
                                <div class="btn d-flex gap-2 p-3 text-center justify-content-center">
                                    <div class="update">
                                        <a class="btn btn-outline-success w-100" type="button" href="">EDIT</a>
                                    </div>
                                    <div class="delete">
                                        <form action="{{ route('users.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger" type="submit">DELETE</button>
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
