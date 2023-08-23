@extends('layout.header')
@section('index-content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/admin/competition/competition.css') }}">
    <title>form competition</title>
</head>
<body>
    <div class="d-flex justify-content-center content">
    <div class="bagan">
        <div class="card-header text-center fs-3 p-2 rounded-top text-white border-bottom border-dark" style="background-color:#576b7d;">
            <h2>Competition</h2>
        </div>

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
                            <input type="file" style="box-shadow:none;  border:none;" required name="image" id="inputFile">
                        </div>
                        <div class="output">
                            <span class="details">OUTPUT GAMBAR</span>
                            <img src="" alt="" id="review">
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
