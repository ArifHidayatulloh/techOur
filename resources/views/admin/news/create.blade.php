@extends('layout.header')
@section('index-content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/admin/news/news.css') }}">
    <title>form news</title>
</head>
<body>
    <div class="d-flex justify-content-center content">
    <div class="bagan">
        <div class="card-header text-center fs-3 p-2 rounded-top text-white border-bottom border-dark" style="background-color:#576b7d;">
            <h2>News</h2>
        </div>

        <!-- FORM -->
        <div class="form">
            <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="tmbh-news">

                    <div class="form-left">
                        <div class="input-news">
                            <span class="details">Judul</span>
                            <textarea cols="50" required name="title"></textarea>
                        </div>
                        <div class="input-news">
                            <span class="details">Detail</span>
                            <textarea name="content" cols="30" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="form-right">
                        <div class="input-news">
                            <span class="details">Tanggal</span>
                            <input type="date" name="date">
                        </div>   
                        <div class="input-news">
                            <span class="details">Poster</span>
                            <input type="file" style="box-shadow:none; border:none;" required name="image" id="inputFile">
                        </div>
                        <div class="output">
                            <span class="details">OUTPUT GAMBAR</span>
                            <img src="" alt="" id="review">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center gap-2">
                    <input type="reset" value="BATAL" class="btn btn-outline-danger w-auto">
                    <input type="submit" value="SIMPAN" class="btn btn-outline-success text-center w-auto">
                </div>
            </form>
        </div>
    </div>
    </div>

    <script>
        function previewImage(event) {
            let fileInput = event.target;
            let reviewImage = document.getElementById('review')

            if (fileInput.files && fileInput.files[0]) {
                let reader = new FileReader();

                reader.onload = function(e) {
                    reviewImage.src = e.target.result;
                }

                reader.readAsDataURL(fileInput.files[0]);
            }
        }

        document.getElementById('inputFile').addEventListener('change', previewImage);
    </script>
</body>
</html>
@stop