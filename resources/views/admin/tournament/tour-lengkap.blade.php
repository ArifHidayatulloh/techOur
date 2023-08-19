@extends('layout.header')
@section('index-content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <title>INFO LENGKAP</title>
    </head>
    <style>
        .content{
            margin: 2rem;
        }

        @media screen and (max-width: 796px){
            .content{
                top: 0;
                margin: 1rem;
                display: flex;
                flex-direction: column;
                overflow: auto;
            }
        }

        @media screen and (max-width: 1000px){
            .content{
                top: 0;
                display: flex;
                flex-direction: column;
                overflow: auto;
            }
        }
    </style>
    <body>
        <div class="d-flex justify-content-center content">
            <table class="table caption-top text-center table-bordered tbl">
                <caption><a href="{{ route('tournament.create') }}" class="fw-bold text-decoration-none text-success fs-4">+Add Tournament</a>
                </caption>
                <thead class="table-light">
                    <tr>
                        <th>Nama</th>
                        <th>Lokasi</th>
                        <th>Tanggal</th>
                        <th>Regulasi</th>
                        <th>Hadiah</th>
                        <th>Contact</th>
                        <th>Poster</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tournament as $item)
                        <tr>
                            <td>{{ $item->tournament }}</td>
                            <td>{{ $item->location }}</td>
                            <td>{{ $item->date }}</td>
                            <td id="long-text">{{ $item->challenges }}</td>
                            <td id="long-text">{{ $item->prizes }}</td>
                            <td>{{ $item->contact }}</td>
                            <td><img src="{{ asset('storage/' .$item->image) }}" alt="" style="width: 50px;">
                            </td>
                            <td>
                                <div class="d-grid gap-2 p-3">
                                    <div class="delete">
                                        <form action="{{ route('tournament.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger" type="submit">DELETE</button>
                                        </form>
                                    </div>
                                    <div class="update"> 
                                        <a class="btn btn-outline-success w-100" type="button" href="{{ route('tournament.edit', $item->id) }}">EDIT</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script>
            const longText = document.getElementById("long-text");

            const text = longText.textContent;

            const kalimatArray = text.split(".");

            if (kalimatArray.length > 1) {
                const kalimatTerkondensasi = kalimatArray.slice(0, 1).join(".") + "...";
                longText.textContent = kalimatTerkondensasi;
            }
        </script>
    </body>

    </html>
@stop
