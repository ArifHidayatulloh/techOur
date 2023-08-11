@extends('layout.sidebar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('assets/css/admin/news/news.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update news</title>
</head>
<body>

    <div class="bagan">
        <h2>Update News</h2>

        <!-- FORM -->
        <div class="form">
            <form action="{{ route('news.update' ,$news->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="tmbh-news">
                    <div class="form-left">
                        <div class="input-news">
                            <span class="details">Judul</span>
                            <textarea cols="50" rows="3" required name="title">{{ $news->title }}</textarea>
                        </div>
                        <div class="input-news">
                            <span class="details">Detail</span>
                            <textarea name="content" cols="50" rows="10" required>{{ $news->content }}</textarea>
                        </div>
                        <div class="input-news">
                            <span class="details">Tanggal</span>
                            <input type="date" name="date" value="{{ $news->date }}">
                        </div>   
                    </div>
                    <div class="form-right">
                        <div class="input-news">
                            <span class="details">Poster</span>
                            <input type="file" style="box-shadow:none" required name="image">
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

</body>
</html>
@stop