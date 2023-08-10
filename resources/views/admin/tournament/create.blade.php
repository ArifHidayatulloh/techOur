@extends('layout.sidebar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ ('assets/css/admin/tournament/tour.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tournament</title>
</head>
<body>
    <div class="bagan">
        <h2>+ Tournament</h2>

        <!-- FORM -->
        <div class="form">
            <form action="">
                <div class="tmbh-tour">
                    <div class="form-left">
                        <div class="input-tur">
                            <span class="details">Nama Tournament</span>
                            <input type="text" size="17" required>
                        </div>
                        <div class="input-tur">
                            <span class="details">Detail</span>
                            <textarea name="deskripsi" cols="35" rows="5" required></textarea>
                        </div>
                        <div class="input-tur">
                            <span class="details">Tanggal</span>
                            <input type="date" size="20" required>
                        </div>
                        <div class="input-tur">
                            <span class="details">Hadiah</span>
                            <textarea name="hadiah" id="" cols="35" rows="7" required></textarea>
                        </div>
                    </div>
                    <div class="form-right">
                        
                        <div class="input-tur">
                            <span class="details">Contact Person</span>
                            <textarea name="contact" id="" cols="26" rows="3" required></textarea>
                        </div>
                        <div class="input-tur">
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