@extends('layout.header')
@section('index-content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>INFO LENGKAP</title>
</head>
<body>
    <div class="card-body m-5 p-3 border justify-content-center">
    <caption><a href="{{ route('team.index') }}" class="fw-bold text-decoration-none text-success fs-4">Team</a></caption>
    <table class="table caption-top text-center table-bordered">
        <thead class="table-light">
            <tr>
                <th>Tournament</th>
                <th>Nama Team</th>
                <th>Nama Anggota</th>
                <th>Team Logo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($team as $item)    
            <tr>
                <td>{{ $item->tournament->tournament }}</td>
                <td>{{ $item->team }}</td>
                <td>{{ $item->member }}</td>
                <td><img src="{{ asset('storage/' .$item->image) }}" style="width: 50px;"></td>
            </tr>
            @endforeach
            {{-- <tr>
                <td>agha TEAM</td>
                <td>abian, maulana, riri, luna, kiki, zian</td>
                <td><img src="{{ ('assets/image/it/cyber-security.jpg') }}" style="width: 50px;"></td>
            </tr>
            <tr>
                <td>KAAA TEAM</td>
                <td>rizky, maulana, riri, luna, kiki, zian</td>
                <td><img src="{{ ('assets/image/it/cyber-security.jpg') }}" style="width: 50px;"></td>
            </tr> --}}
        </tbody>
    </table>
    </div>
</body>
</html>    
@stop