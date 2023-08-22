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

        .popup, .popup-update{
        display: none;
        position: absolute;
        top: 5%;
        left: 10%;
        width: 70rem;
        height: 35rem;
        background-color: rgb(255, 255, 255);
        border-radius: 10px;
        border: 1px solid black;
        justify-content: center;
        align-items: center;
        z-index: 999; /* Pastikan popup ada di atas konten lain */
        transform: translateY(0.25);
    }

    .popup-content {
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        position: relative;
    }

    .close {
        position: absolute;
        top: 0;
        right: 10px;
        font-size: 40px;
        cursor: pointer;
    }

    .bagan h2{
        letter-spacing: 1px;
        color: black;
        text-shadow: 2px 2px 3px white;
        font-size: 33px;
        margin-left: 20px;
        margin-top: 10px;
        bottom: 0;
    }

    .form .form-news input, textarea{
        letter-spacing: 1px;
        color: black;
        background-color: transparent;
        padding: 5px;
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
            <caption class="fw-bold text-decoration-none text-success fs-4" id="show-popup">
                + Add News
                {{-- <a href="{{ route('news.create') }}" class="fw-bold text-decoration-none text-success fs-4" id="show-popup">+ Add News</a>--}}
            </caption>
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

    <!-- FORM NEWS -->
    <div class="popup" id="popup">
        <div class="bagan">
            <span class="close" id="close-popup">&times;</span>
            <h2>+ News</h2>
            <hr>
    
            <!-- FORM -->
            <div class="form">
                <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-news d-flex justify-content-center" style="gap: 8rem;">
    
                        <div class="form-left">
                            <div class="input-news">
                                <span class="details">Judul</span>
                                <textarea class="w-100" cols="50" rows="3" required name="title"></textarea>
                            </div>
                            <div class="input-news">
                                <span class="details">Detail</span>
                                <textarea class="w-100" name="content" cols="50" rows="10" required></textarea>
                            </div>  
                        </div>
                        <div class="form-right">
                            <div class="input-news">
                                <span class="details">Tanggal</span>
                                <input class="w-100" type="date" name="date">
                            </div> 
                            <div class="input-news">
                                <span class="details">Poster</span>
                                <input type="file" style="box-shadow:none" required name="image" id="inputFile">
                            </div>
                            <div class="output">
                                <span class="details">OUTPUT GAMBAR</span>
                                <img src="" alt="" id="review">
                            </div>
                        </div>
                    </div>
                    <div class="btn d-flex gap-2 p-1 m-3 justify-content-center">
                        <input type="reset" value="BATAL" class="btn btn-outline-danger w-25">
                        <input type="submit" value="SIMPAN" class="btn btn-outline-success w-25">
                    </div>
                </form>
            </div>
        </div>
    </div>

        <script>
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
        </script>
    </body>

    </html>
@stop
