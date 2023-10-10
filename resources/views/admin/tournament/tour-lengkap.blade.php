@extends('layout.header')
@section('index-content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <title>INFO LENGKAP</title>
    </head>

    <style>
        .content {
            margin: 1rem;
            width: auto;
        }

        .team {
            padding: 0;
            font-size: 17px;
        }

        .dropdown-menu {
            display: none;
            margin-top: 7px;
            margin-left: -30px;
        }

        .dropdown-menu li a {
            text-decoration: none;
            text-align: center;
            color: black;
        }

        .dropdown-menu li:hover {
            background-color: rgb(241, 241, 241);
        }

        .nav-item:hover .dropdown-menu {
            display: block;
            cursor: pointer;
        }

        @media screen and (max-width: 796px) {
            .content {
                top: 0;
                margin: 1rem;
                display: flex;
                flex-direction: column;
                overflow: auto;
            }

            .content .table {
                width: 70rem;
            }
        }
    </style>

    <body>
        <a href="{{ route('tournament.create') }}"
            class="caption d-flex fw-bold text-decoration-none text-success fs-4 ms-4 mt-4">+Add Tournament</a>
        <div class="d-flex justify-content-center content" id="content">
            <table class="table text-center">
                <thead class="table-light">
                    <tr>
                        {{-- <th>Pembuat</th> --}}
                        <th>Nama</th>
                        <th>Lokasi</th>
                        <th>Tanggal</th>
                        <th>Regulasi</th>
                        <th>Hadiah</th>
                        <th>Contact</th>
                        <th>Regis</th>
                        <th>Team</th>
                        <th>Poster</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tournament as $item)
                        <tr class="align-middle">
                            {{-- <td>{{ $item->user->name }}</td> --}}
                            <td>{{ $item->tournament }}</td>
                            <td>{{ $item->location }}</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->challenges }}</td>
                            <td style="white-space: pre-wrap;">{{ $item->prizes }}</td>
                            <td>{{ $item->contact }}</td>
                            <td>{{ $item->registration_fee }}</td>
                            <td>
                                @if ($item->info_team == 1)
                                    true
                                @else
                                    false
                                @endif
                            </td>
                            <td><img src="{{ asset('storage/' . $item->image) }}" alt="" style="width: 50px;">
                            </td>
                            <td>
                                <div class="d-flex gap-2 p-2 mt-3 w-100 justify-content-center">
                                    <div class="update" id="show-update">
                                        <a type="button" class="btn btn-outline-warning"
                                            href="{{ route('tournament.edit', $item->id) }}">
                                            <i class='bx bxs-edit-alt bx-sm' style="color: black"></i></a>
                                    </div>
                                    <div class="delete">
                                        <form action="{{ route('tournament.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger" type="submit"><i
                                                    class='bx bx-trash bx-sm'></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="d-flex ms-2 w-100 justify-content-center">
                                    <ul class="team w-100">
                                        <li class="nav-item dropdown p-1 list-unstyled rounded border border-secondary">
                                            <a class="nav-link dropdown-toggle text-dark" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                team
                                            </a>
                                            <ul class="dropdown-menu text-center" id="dropdown-menu">
                                                <li><a href="{{ route('team.show', ['team' => $item->id]) }}">team</a></li>
                                                <li><a
                                                        href="{{ route('antrian.show', ['antrian' => $item->id]) }}">antrian</a>
                                                </li>
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
