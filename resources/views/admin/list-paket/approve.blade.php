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

        <title>approve limit</title>
    </head>

    <body>
        <div class="d-flex justify-content-center content mt-4">
            <table class="table caption-top text-center w-75 justify-content-center">
                <caption><a href="" class="fw-bold text-decoration-none text-success fs-4">Approve Limit</a>
                </caption>
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Paket</th>
                        <th>Limit</th>
                        <th>Price</th>
                        <th>Bukti</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($history as $item)
                        <tr class="align-middle">
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->limit }}</td>
                            <td>Rp. {{ $item->prize }}</td>
                            <td><img src="{{ asset('storage/' . $item->image) }}" style="width: 50px;"></td>
                            <td>
                                <div class="d-flex gap-2 pt-3 pb-3 w-100 justify-content-center">
                                    <a class="btn btn-outline-primary p-2 button-edit" type="button"
                                        class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $item->id }}">
                                        detail
                                    </a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body d-flex justify-content-between m-5 mb-4 mt-4 border"
                                                    style="height: 5rem">
                                                    <div class="d-flex flex-column border-none">
                                                        <label class="form-label fw-bold">{{ $item->name }}</label>
                                                        <label class="form-label">Limit {{ $item->limit }}</label>
                                                    </div>
                                                    <div>
                                                        <label class="form-label text-success fw-bold">Rp.
                                                            {{ $item->prize }}</label>
                                                    </div>
                                                </div>
                                                <div class="form-check d-flex flex-column mb-3 ms-4">
                                                    <label for="formFile" class="form-label text-start">Bukti
                                                        Transfer</label>
                                                    <img src="{{ asset('storage/' . $item->image) }}" class="w-25"
                                                        alt="" id="review">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <form action="{{ route('limit.approve', $item->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-primary">Approve</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{route('limit.fail', ['id' => $item->id])}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')

                                    <button class="btn btn-outline-danger" type="submit"><i
                                            class='bx bx-trash bx-sm'></i></button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
@stop
