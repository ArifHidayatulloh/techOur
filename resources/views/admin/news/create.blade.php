@extends('layout.sidebar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ ('assets/css/admin/news/news.css') }}">
    <title>form news</title>
</head>
<body>
    <div class="bagan">
        <h2>+ News</h2>

        <!-- FORM -->
        <div class="form">
            <form action="">
                <div class="tmbh-news">

                    <div class="form-left">
                        <div class="input-news">
                            <span class="details">Judul</span>
                            <textarea name="deskripsi" cols="50" rows="3" required></textarea>
                        </div>
                        <div class="input-news">
                            <span class="details">Detail</span>
                            <textarea name="deskripsi" cols="50" rows="10" required></textarea>
                        </div>
                        <div class="input-news">
                            <span class="details">Tanggal</span>
                            <input type="date">
                        </div>   
                    </div>
                    <div class="form-right">

                        <div class="input-news">
                            <span class="details">Poster</span>
                            <input type="file" style="box-shadow:none" required>
                        </div>
                        <div class="output">
                            <span class="details">OUTPUT GAMBAR</span>
                            <img src="assets/image/team.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="btn">
                    <input type="reset" value="BATAL" class="btn-reset">
                    <input type="submit" value="SIMPAN" class="btn-submit">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
@stop