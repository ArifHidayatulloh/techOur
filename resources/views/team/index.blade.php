@extends('team.layout')
@section('content')
    <div class="card mt-5" style="width: 70rem">
        <div class="card-header">
            <h3>Team</h3>
            <a class="btn btn-success mt-1 mb-1" href="{{ route('team.create') }}" role="button">Add New Team</a>
        </div>
        <div class="card-boy">
            <table class="table text">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tournament</th>
                        <th scope="col">Team Name</th>
                        <th scope="col">Member</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($team as $item)    
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->tournament->tournament }}</td>
                        <td>{{ $item->team }}</td>
                        <td>{{ $item->member }}</td>
                        <td>
                            <img src="{{ asset('storage/' .$item->image) }}" alt="" style="width:50px;">
                        </td>
                        <td>
                            <div class="d-flex gap-3 align-items-center">
                                <a class="btn btn-warning mt-1 mb-1" href="{{ route('team.edit', $item->id) }}" role="button">Edit</a>
                                <form action="{{ route('team.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger ">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
