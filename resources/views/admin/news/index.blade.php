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

        <title>News</title>
    </head>
    <style>
        .title {
            font-size: 15px;
        }

        .caption {
            margin-left: 5rem;
        }

        @media screen and (max-width: 796px) {
            .button {
                margin-bottom: 1rem;
            }

            .caption {
                margin-left: 1rem;
            }

            .btn {
                margin-right: 1rem;
            }

            .content {
                flex-direction: column;
                overflow: auto;
                margin: 7px;
                margin-top: -15px;
            }

            .content .table {
                width: 50rem;
            }
        }
    </style>

    <body>
        <div class="sesion d-flex justify-content-center mt-4">
            @if (session('success'))
                <div class="alert alert-success w-75">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="button d-flex justify-content-between">
            <a href="{{ route('news.create') }}"
                class="caption fw-bold text-success fs-4 mb-3 mt-2 text-decoration-none">+Add
                News</a>

            @if (Auth::user()->role == 'admin')
                <a href="{{ route('news.pending') }}"
                    class="btn approve btn-outline-primary justify-content-end mt-2 mb-3 me-5">+ Approve News</a>
            @endif
        </div>
        <div class="d-flex justify-content-center content mb-5">
            <table class="table text-center ms-5 me-5">
                <thead class="table-light">
                    <tr>
                        <th>Maker</th>
                        <th>Title</th>
                        <th>Detail</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($news as $item)
                        <tr class="align-middle">
                            <td>{{ $item->user->name }}</td>
                            <td class="title">{{ $item->title }}</td>
                            <td>
                                {{ Str::limit($item->content, '150', '...') }}
                            </td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->status }}</td>
                            <td><img src="{{ asset('storage/' . $item->image) }}" style="width: 80px"></td>
                            <td>
                                <div class="d-flex gap-2 p-3 justify-content-center">
                                    <div class="update">
                                        <a class="btn btn-outline-warning" type="button"
                                            href="{{ route('news.edit', $item->id) }}"><i class='bx bxs-edit-alt bx-sm'
                                                style="color: black"></i></a>
                                    </div>
                                    <div class="delete">
                                        <form action="{{ route('news.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger" type="submit"><i
                                                    class='bx bx-trash bx-sm'></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="7" align="center">
                                <div class="alert alert-dark " role="alert" style="width:40rem;">
                                    Belum Ada Data
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </body>

    </html>
@stop
