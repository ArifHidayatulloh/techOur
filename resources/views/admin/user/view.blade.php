@extends('layout.header')
@section('index-content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>approve paket</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>

    <body>
        <div class="d-flex justify-content-center content m-5">
            <table class="table text-center">
                <thead class="table-light">
                    <tr>
                        <th>paket</th>
                        <th>bukti tf</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="align-middle">
                        <td>Paket 1</td>
                        <td></td>
                        <td>
                            <button class="btn btn-outline-primary" role="button" type="submit"><i
                                    class='bx bx-check bx-sm'></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>

    </html>
@stop
