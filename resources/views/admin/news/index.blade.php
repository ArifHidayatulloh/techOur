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
            font-size: 20px;
        }

        .text {
            height: 100%;
            font-size: 20px;
        }

        .btn {
            display: grid;
        }

        @media screen and (max-width: 796px) {
            .title {
                font-size: 15px;
            }

            .text {
                font-size: 10px;
                width: 100%;
                height: 50%;
            }

            .btn {
                text-align: center;
                display: flex;
            }
        }
    </style>

    <body>
        <div class="card-body m-5 p-3 border">
            <table class="table caption-top text-center table-bordered">
                <caption><a href="{{ route('news.create') }}" class="fw-bold text-decoration-none text-success fs-4">+ Add News</a></caption>
                <thead class="table-light">
                    <tr>
                        <th>Judul</th>
                        <th class="w-25">Detail</th>
                        <th>Tanggal</th>
                        <th>Poster</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $item)
                        <tr>
                            <td class="title">{{ $item->title }}</td>
                            <td class="text-break p-3 text" id="text-news">
                                {{ $item->content}}
                            </td>
                            <td>{{ $item->date }}</td>
                            <td><img src="{{ asset('storage/' .$item->image) }}" style="width: 80px"></td>
                            <td>
                                <div class="d-grid gap-2 d-md-flex justify-content-center btn">
                                    <div class="delete">
                                        <form action="{{ route('news.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger w-20" type="submit">DELETE</button>
                                        </form>
                                    </div>
                                    <div class="update"> 
                                        <a class="btn btn-outline-success w-20" type="button" href="{{ route('news.edit', $item->id) }}">EDIT</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script>
            const textNews = document.getElementById("text-news");

            const text = textNews.textContent;

            const kalimatArray = text.split(".");

            if (kalimatArray.length > 1) {
                const kalimatTerkondensasi = kalimatArray.slice(0, 1).join(".") + "...";
                textNews.textContent = kalimatTerkondensasi;
            }
        </script>
    </body>

    </html>
@stop
