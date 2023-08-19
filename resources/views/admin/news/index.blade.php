@extends('layout.header')
@section('index-content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>index</title>
</head>
<style>
        .title{
            font-size: 15px;
        }

        .content{
            margin: 2rem;
        }

        @media screen and (max-width: 796px) {
            .title {
                font-size: 15px;
            }

            .content{
                top: 0;
                margin: 1rem;
                display: flex;
                flex-direction: column;
                overflow: auto;
            }
    }
</style>
<body>
    <div class="d-flex justify-content-center content">
        <table class="table caption-top text-center table-bordered w-75 ">
            <caption><a href="{{ route('news.create') }}" class="fw-bold text-decoration-none text-success fs-4">+ Add News</a></caption>
            <thead class="table-light">
                <tr>
                    <th>Judul</th>
                    <th class="w-25">Detail</th>
                    <th class="w-25">Tanggal</th>
                    <th>Poster</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $item)
                <tr>
                    <td class="title">{{ $item->title }}</td>
                    <td class="text-break p-3" id="text-news">
                        {{$item->content}}
                    </td>
                    <td>{{ $item->date}}</td>
                    <td><img src="{{ asset('storage/' .$item->image) }}" style="width: 80px"></td>
                    <td>
                        <div class="d-grid gap-2 p-3 text-center">
                            <div class="delete">
                                <form action="{{ route('news.destroy', $item->id )}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger" type="button">DELETE</button>
                                </form>
                            </div>
                            <div class="update">
                                <a class="btn btn-outline-success w-100" href="{{ route('news.edit', $item->id) }}" type="button">EDIT</a>
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
