@extends('layout.header')
@section('index-content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

        <title>create limit</title>
    </head>

    <style>
        .bagan {
            background-color: white;
            border: 1px solid black;
            border-radius: 10px;
            margin: 20px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .bagan .form {
            justify-content: center;
            align-items: center;
            margin: 20px;
        }

        .form .tmbh-limit {
            display: flex;
            flex-direction: column;
            border-radius: 10px;
        }

        .form .tmbh-limit .input-limit input {
            width: 100%;
            letter-spacing: 1px;
            color: black;
            line-height: 20px;
            border: 1px solid black;
            background-color: transparent;
            border-radius: 3px;
            padding: 3px;
        }

        @media screen and (max-width: 796px) {
            .bagan {
                width: 100%;
            }

            .form .tmbh-limit {
                display: flex;
                flex-direction: column;
                gap: 0;
            }
        }
    </style>

    <body>
        <div class="d-flex justify-content-center content">
            <div class="bagan">
                <div class="card-header text-center fs-3 p-2 rounded-top text-white border-bottom border-dark"
                    style="background-color:#576b7d;">
                    <h2>Limit</h2>
                </div>

                <!-- FORM -->
                <div class="form">
                    <form action="#" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="tmbh-limit">
                            <div class="input-limit">
                                <span class="details">Name</span>
                                <input type="text" size="22" required name="limit" autocomplete="off">
                            </div>
                            <div class="input-limit">
                                <span class="details">Limit</span>
                                <input type="text" size="22" required name="limit" autocomplete="off">
                            </div>
                            <div class="input-limit">
                                <span class="details">Harga</span>
                                <input type="prizes" size="22" required name="limit" autocomplete="off">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center gap-2 mt-3 mb-4">
                            <input type="reset" value="BATAL" class="btn btn-outline-danger w-auto">
                            <input type="submit" value="SIMPAN" class="btn btn-outline-success w-auto">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>
@stop
