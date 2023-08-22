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
        <div class="d-flex justify-content-center content">
            <table class="table caption-top text-center table-bordered tbl">
                <caption class="fw-bold text-decoration-none text-success fs-4" id="show-popup">+Add Tournament</caption>
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
                                            <a class="nav-link dropdown-toggle text-dark" href="/index-tournament" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                team
                                            </a>
                                            <ul class="dropdown-menu" id="dropdown-menu">
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
        

        <!-- FORM ADD -->
        <div id="popup" class="popup">
            <div class="bagan">
                <span class="close" id="close-popup">&times;</span>
                <h2>+ Tournament</h2>
                <hr>
        
                <!-- FORM -->
                <div class="form">
                    <form action="{{ route('tournament.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-details d-flex justify-content-center" style="gap: 8rem;">
                            <div class="form-left">
                                <div class="input-form">
                                    <span class="details">Competisi</span>
                                    <select name="competition_id" id="">
                                        {{--
                                        <option selected>Pilih Competisi</option>
                                        @forelse ($competition as $item)
                                            <option value="{{ $item->id }}">{{ $item->competition }}</option>
                                        @empty
                                            <option selected>Null</option>
                                        @endforelse
                                        --}}
                                    </select>
                                </div>
                                <div class="input-form">
                                    <span class="details">Nama Tournament</span>
                                    <input class="w-100" type="text" size="17" required name="tournament">
                                </div>
                                <div class="input-form">
                                    <span class="details">Lokasi</span>
                                    <input class="w-100" type="text" size="17" required name="location">
                                </div>
                                <div class="input-form">
                                    <span class="details">Peserta</span>
                                    <textarea class="w-100" name="participants" cols="35" rows="5" required style="white-space: pre-wrap;"></textarea>
                                </div>
                                <div class="input-form">
                                    <span class="details">Regulasi</span>
                                    <textarea class="w-100" name="challenges" cols="35" rows="5" required style="white-space: pre-wrap;"></textarea>
                                </div>
                                <div class="input-form">
                                    <span class="details">Hadiah</span>
                                    <textarea class="w-100" name="prizes" cols="35" rows="5" required style="white-space: pre-wrap;"></textarea>
                                </div>
                            </div>
                            <div class="form-right">
                                <div class="input-form">
                                    <span class="details">Tanggal</span>
                                    <input class="w-100" type="date" size="20" required name="date">
                                </div>
                                <div class="input-form">
                                    <span class="details">Contact Person</span>
                                    <textarea class="w-100" name="contact" id="" cols="26" rows="3" required></textarea>
                                </div>
                                <div class="input-form">
                                    <span class="details">Harga</span>
                                    <input class="w-100" type="text" size="17" required name="registration_fee">
                                </div>
                                <div class="input-form d-flex flex-column">
                                    <span class="details">Poster</span>
                                    <input type="file" style="box-shadow:none" required name="image" id="inputFile">
                                </div>
                                <div class="output d-flex flex-column">
                                    <span class="details">OUTPUT GAMBAR</span>
                                    <img class="w-50" alt="" id="review">
                                </div>
                            </div>
                        </div>
                        <div class="btn d-flex gap-2 p-1 justify-content-center">
                            <input type="reset" value="BATAL" class="btn btn-outline-danger w-25">
                            <input type="submit" value="SIMPAN" class="btn btn-outline-success w-25">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- UPDATE FORM 
        <div class="popup-update" id="popup-update">
            <div class="bagan">
                <span class="close" id="close-popup">&times;</span>
                <h2>Update Tournament</h2>
              
                <div class="form">
                    <form action="{{ route('tournament.update', $tournament->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="tmbh-tour">
                            <div class="form-left">
                                <div class="input-tur">
                                    <span class="details">Competisi</span>
                                    <select name="competition_id" id="">
                                        {{--
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
        </div>
        --}}

        
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


            document.getElementById('show-popup').addEventListener('click', function() {
                document.getElementById('popup').style.display = 'block';
            });

            document.getElementById('close-popup').addEventListener('click', function() {
                document.getElementById('popup').style.display = 'none';
            });

            /* UPDATE FORM 
            document.getElementById('show-update').addEventListener('click', function() {
                document.getElementById('popup-update').style.display = 'block';
            });

            document.getElementById('close-popup').addEventListener('click', function() {
                document.getElementById('popup-update').style.display = 'none';
            });
            */

            document.getElementById('inputFile').addEventListener('change', previewImage);
        </script>
    </body>

    </html>
@stop
