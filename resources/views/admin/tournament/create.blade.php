@extends('layout.sidebar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('assets/css/admin/tournament/tour.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tournament</title>
</head>
<body>
    <div class="bagan">
        <h2>+ Tournament</h2>

        <!-- FORM -->
        <div class="form">
            <form action="{{ route('tournament.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="tmbh-tour">
                    <div class="form-left">
                        <div class="input-tur">
                            <span class="details">Competisi</span>
                            <select name="competition_id" id="">
                                <option selected>Pilih Competisi</option>
                                @forelse ($competition as $item)
                                    <option value="{{ $item->id }}">{{ $item->competition }}</option>
                                @empty
                                    <option selected>Null</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="input-tur">
                            <span class="details">Nama Tournament</span>
                            <input type="text" size="17" required name="tournament">
                        </div>
                        <div class="input-tur">
                            <span class="details">Lokasi</span>
                            <input type="text" size="17" required name="location">
                        </div>
                        <div class="input-tur">
                            <span class="details">Peserta</span>
                            <textarea name="participants" cols="35" rows="5" required style="white-space: pre-wrap;"></textarea>
                        </div>
                        <div class="input-tur">
                            <span class="details">Regulasi</span>
                            <textarea name="challenges" cols="35" rows="5" required style="white-space: pre-wrap;"></textarea>
                        </div>
                        <div class="input-tur">
                            <span class="details">Hadiah</span>
                            <textarea name="prizes" cols="35" rows="5" required style="white-space: pre-wrap;"></textarea>
                        </div>
                    </div>
                    <div class="form-right">
                        <div class="input-tur">
                            <span class="details">Tanggal</span>
                            <input type="date" size="20" required name="date">
                        </div>
                        <div class="input-tur">
                            <span class="details">Contact Person</span>
                            <textarea name="contact" id="" cols="26" rows="3" required></textarea>
                        </div>
                        <div class="input-tur">
                            <span class="details">Harga</span>
                            <input type="text" size="17" required name="registration_fee">
                        </div>
                        <div class="input-tur">
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
    </div>
</body>
</html>
@stop