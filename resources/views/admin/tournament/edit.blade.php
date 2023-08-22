@extends('layout.sidebar')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="{{ asset('assets/css/admin/tournament/tour.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>update tour</title>
    </head>

    <body>
        <div class="bagan">
            <h2>Update Tournament</h2>
            <!-- FORM -->
            <div class="form">
                <form action="{{ route('tournament.update', $tournament->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="tmbh-tour">
                        <div class="form-left">
                            <div class="input-tur">
                                <span class="details">Competisi</span>
                                <select name="competition_id" id="">
                                    @forelse ($competition as $item)
                                        @if ($tournament->competition_id == $item->id)
                                        <option value="{{ $item->id }}" selected>{{ $item->competition }}</option>
                                        
                                        @else
                                        <option value="{{ $item->id }}">{{ $item->competition }}</option>
                                            
                                        @endif
                                    @empty
                                        <option selected>Null</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="input-tur">
                                <span class="details">Nama Tournament</span>
                                <input type="text" size="17" required name="tournament" value="{{ $tournament->tournament }}">
                            </div>
                            <div class="input-tur">
                                <span class="details">Lokasi</span>
                                <input type="text" size="17" required name="location" value="{{ $tournament->location }}">
                            </div>
                            <div class="input-tur">
                                <span class="details">Peserta</span>
                                <textarea name="participants" cols="35" rows="5" required style="white-space: pre-wrap;">{{ $tournament->participants }}</textarea>
                            </div>
                            <div class="input-tur">
                                <span class="details">Regulasi</span>
                                <textarea name="challenges" cols="35" rows="5" required style="white-space: pre-wrap;">{{ $tournament->challenges }}</textarea>
                            </div>
                            <div class="input-tur">
                                <span class="details">Hadiah</span>
                                <textarea name="prizes" cols="35" rows="5" required style="white-space: pre-wrap;">{{ $tournament->prizes }}</textarea>
                            </div>
                        </div>
                        <div class="form-right">
                            <div class="input-tur">
                                <span class="details">Tanggal</span>
                                <input type="date" size="20" required name="date" value="{{ $tournament->date }}">
                            </div>
                            <div class="input-tur">
                                <span class="details">Contact Person</span>
                                <textarea name="contact" id="" cols="26" rows="3" required>{{ $tournament->contact }}</textarea>
                            </div>
                            <div class="input-tur">
                                <span class="details">Harga</span>
                                <input type="text" size="17" required name="registration_fee" value="{{ $tournament->registration_fee }}">
                            </div>
                            <div class="input-tur">
                                <span class="details">Poster</span>
                                <input type="file" style="box-shadow:none" required name="image" id="inputFile">
                            </div>
                            <div class="output">
                                <span class="details">OUTPUT GAMBAR</span>
                                <img src="{{ asset('storage/' .$tournament->image) }}" alt="" id="review">
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
