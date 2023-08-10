@extends('layout.sidebar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ ('assets/css/admin/tournament/tour.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update tour</title>
</head>
<body>
    <div class="bagan">
        <h2>Update Tournament</h2>
        <!-- FORM -->
        <div class="form">
            <form action="">
                <div class="tmbh-tour">
                    <div class="form-left">
                        <div class="input-tur">
                            <span class="details">Nama Tournament</span>
                            <input type="text" size="22" required>
                        </div>
                        <div class="input-tur">
                            <span class="details">Detail</span>
                            <textarea name="deskripsi" cols="38" rows="5" required></textarea>
                        </div>
                        <div class="input-tur">
                            <span class="details">tanggal</span>
                            <input type="date" size="22" required>
                        </div>
                        <div class="input-tur">
                            <span class="details">Hadiah</span>
                            <textarea name="hadiah" id="" cols="35" rows="7" required></textarea>
                        </div>
                    </div>
                    <div class="form-right">

                        <div class="input-tur">
                            <span class="details">Contact Person</span>
                            <textarea name="hadiah" id="" cols="28" rows="3" required></textarea>
                        </div>
                        <div class="input-tur">
                            <span class="details">Poster</span>
                            <input type="file" style="box-shadow:none" required>
                        </div>
                        <div class="output">
                            <span class="details">OUTPUT GAMBAR</span>
                            <img src="gambar/team.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="btn">
                    <input type="reset" value="BATAL" class="btn-reset">
                    <input type="submit" value="UPDATE" class="btn-submit">
                </div>
            </form>
        </div>
    </div>
</body>
</html>        
@stop