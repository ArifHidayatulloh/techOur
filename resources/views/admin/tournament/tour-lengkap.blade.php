@extends('layout.header')
@section('index-content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset('assets/css/admin/tournament/tour-lengkap.css') }}">

        <title>INFO LENGKAP</title>
    </head>
    <body>
        <div class="d-flex justify-content-center content" id="content">
            <table class="table caption-top text-center table-bordered tbl">
                <caption><a href="{{ route('tournament.create') }}" class="fw-bold text-decoration-none text-success fs-4">+Add Tournament</a></caption>
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
                                            <button class="btn btn-outline-danger w-100" type="submit">DELETE</button>
                                        </form>
                                    </div>
                                    <div class="update" id="show-update"> 
                                        <a class="btn btn-outline-success w-100" type="button" href="{{ route('tournament.edit', $item->id) }}">EDIT</a>
                                    </div>
                                    <ul class="team">
                                        <li class="nav-item dropdown border p-1 list-unstyled rounded border border-secondary">
                                            <a class="nav-link dropdown-toggle text-dark" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                team
                                            </a>
                                            <ul class="dropdown-menu text-center" id="dropdown-menu">
                                                <li><a href="/team">team</a></li>
                                                <li><a href="/team-approve">team approve</a></li>
                                            </ul>
                                        </li>
                                    </ul>
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

            /* FORM ADD */
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

            document.getElementById('inputFile').addEventListener('change', previewImage);
        </script>
    </body>
    </html>
@stop
