@extends('layout.header')
@section('index-content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

        <link rel="stylesheet" href="{{ asset('assets/css/admin/tournament/tour.css') }}">

        <title>Form Tournament</title>
    </head>

    <body>
        <div class="d-flex justify-content-center m-3 content">
            <div class="bagan">
                <div class="card-header text-center fs-3 p-2 rounded-top text-white border-bottom border-dark"
                    style="background-color:#576b7d;">
                    <h2>Tournament</h2>
                </div>

                <!-- FORM -->
                <div class="form">
                    @if (session('message'))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                    @endif

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
                                <div class="input-tur d-none">
                                    <span class="details">user</span>
                                    <input type="text" size="17" required name="user_id"
                                        value="{{ Auth::user()->id }}">
                                </div>
                                <div class="input-tur">
                                    <span class="details">Nama Tournament</span>
                                    <input type="text" size="17" required name="tournament">
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
                                <div class="form-check">
                                    <input class="form-check-input border border-black" type="checkbox"
                                        id="flexCheckDefault" name="info_team">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Detail Team
                                    </label>
                                </div>
                            </div>
                            <div class="form-right">
                                <div class="input-tur">
                                    <span class="details">Lokasi</span>
                                    <input type="text" size="17" required name="location">
                                </div>
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
                                    <input type="file" style="box-shadow:none; border: none" required name="image"
                                        id="inputFile">
                                </div>
                                <div class="output">
                                    <span class="details">OUTPUT GAMBAR</span>
                                    <img src="" alt="" id="review" style="height: auto" class="w-25">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center gap-2">
                            <input type="reset" value="BATAL" class="btn btn-outline-danger w-25">
                            <input type="submit" value="SIMPAN" class="btn btn-outline-success w-25">
                        </div>
                    </form>
                </div>
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
