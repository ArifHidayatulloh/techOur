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

        <title>index</title>
    </head>
    <style>
        .title {
            font-size: 15px;
        }

        .content .table {
            width: 75%;
        }

        .caption {
            margin-left: 10rem;
        }

        .btn {
            width: 50%;
        }

        @media screen and (max-width: 796px) {
            .content {
                flex-direction: column;
                overflow: auto;
                margin: 10px;
                margin-top: -15px;
            }

            .caption {
                margin-left: 0;
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
        <a href="{{ route('users.create') }}"
            class="caption d-flex fw-bold text-decoration-none text-success fs-4 mb-3">+Add
            User</a>
        <div class="d-flex justify-content-center content mb-3">
            <table class="table text-center">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone number</th>
                        <th>Role</th>
                        <th>Limit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $item)
                        <tr class="align-middle">
                            <td class="title">{{ $item->name }}</td>
                            <td class="text-break p-3" id="text-news">{{ $item->email }}</td>
                            <td class="text-break p-3" id="text-news">{{ $item->hp }}</td>
                            <td class="text-break p-3" id="text-news">{{ $item->role }}</td>
                            @if ($item->role == 'admin')
                                <td class="text-break p-3" id="text-news">no limit</td>
                            @else
                                <td class="text-break p-3" id="text-news">{{ $userLimit[$item->id] }}</td>
                            @endif
                            <td>
                                <div class="d-flex gap-2 p-3 w-100 justify-content-center">
                                    <div class="update">
                                        <a class="btn btn-outline-warning w-100" type="button"
                                            href="{{ route('users.edit', $item->id) }}"><i class='bx bxs-edit-alt bx-sm'
                                                style="color: black"></i></a>
                                    </div>
                                    <div class="delete">
                                        <form action="{{ route('users.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger w-100" type="submit"><i
                                                    class='bx bx-trash bx-sm'></i></button>
                                        </form>
                                    </div>
                                </div>
                                <button class="btn btn-outline-success" type="button" data-bs-toggle="modal"
                                    data-bs-target="#detailModal{{ $item->id }}" style="font-size: 15px">
                                    See Detail
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">User Detail</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="d-flex modal-body">
                                                <div class="modal-text text-start fw-bold">
                                                    <p>Name</p>
                                                    <p>Email</p>
                                                    <p>Phone Number</p>
                                                    <p>Role</p>
                                                    <p>Created at</p>
                                                    <p>Last Login</p>
                                                    <p>Last Logout</p>
                                                </div>
                                                <div class="modal-isi text-start ms-5">
                                                    <p>: {{ $item->name }}</p>
                                                    <p>: {{ $item->email }}</p>
                                                    <p>: {{ $item->hp }}</p>
                                                    <p>: {{ $item->role }}</p>
                                                    <p>: {{ $item->created_at }}</p>
                                                    <p>: {{ $item->last_login }}</p>
                                                    <p>: {{ $item->last_logout }}</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" align="center">
                                <div class="alert alert-dark " role="alert" style="width:40rem;">
                                    Belum Ada Data
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
@stop
