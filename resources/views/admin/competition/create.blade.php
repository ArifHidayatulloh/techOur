@extends('layout.sidebar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('assets/css/admin/competition/competition.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form competition</title>
</head>

<body>
    <div class="bagan">
        <h2>+ Competition</h2>

        <!-- FORM -->
        <div class="form">
            <form action="{{ route('competition.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="tmbh-competition">
                    <div class="form-left">
                        <div class="input-competition">
                            <span class="details">Nama</span>
                            <input type="text" size="22" required name="competition" autocomplete="off">
                        </div>
                        <div class="input-competition">
                            <span class="details">Gambar</span>
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
    </div>
</body>
</html>
@stop
