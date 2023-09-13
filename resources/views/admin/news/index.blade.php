@extends('layout.header')
@section('index-content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <title>index</title>
    </head>
    <style>
        .title {
            font-size: 15px;
        }

        @media screen and (max-width: 796px) {
            .content {
                flex-direction: column;
                overflow: auto;
                margin: 10px;
                margin-top: -15px;
            }

            .content .table{
                width: 50rem;
            }
        }
    </style>

    <body>
        <div class="sesion d-flex justify-content-center mt-5">
            @if (session('success'))
                <div class="alert alert-success w-75">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="d-flex justify-content-center content mb-5">
            <table class="table caption-top text-center ms-5 me-5">
                <caption><a href="{{ route('news.create') }}" class="fw-bold text-decoration-none text-success fs-4">+ Add
                        News</a>
                </caption>
                <thead class="table-light">
                    <tr>
                        <th>Pembuat</th>
                        <th>Judul</th>
                        <th>Detail</th>
                        <th>Tanggal</th>
                        <th>Poster</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $item)
                        <tr class="align-middle">
                            <td>{{ $item->user->name }}</td>
                            <td class="title">{{ $item->title }}</td>
                            <td>
                                {{ Str::limit($item->content, '150', '...')}}
                            </td>
                            <td>{{ $item->date }}</td>
                            <td><img src="{{ asset('storage/' . $item->image) }}" style="width: 80px"></td>
                            <td>
                                <div class="d-grid gap-2 p-3 text-center">
                                    <div class="update">
                                        <a class="btn btn-outline-warning w-100" type="button"
                                            href="{{ route('news.edit', $item->id) }}"><i class='bx bxs-edit-alt bx-sm'
                                                style="color: black"></i></a>
                                    </div>
                                    <div class="delete">
                                        <form action="{{ route('news.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger w-100" type="submit"><i
                                                    class='bx bx-trash bx-sm' style="color: black"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
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
