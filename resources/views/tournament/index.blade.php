@extends('tournament.layout')
@section('content')
    <div class="card mt-5" style="width: 70rem;">
        <div class="card-header">
            <h3>Tournament</h3>
            <a class="btn btn-success mt-1 mb-1" href="{{ route('tournament.create') }}" role="button">Add New
                Tournament</a>
        </div>
        <div class="card-boy">
            <table class="table" style="width: 70rem;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Tournament</th>
                        <th scope="col">Date</th>
                        <th scope="col">Venue</th>
                        <th scope="col">Participant</th>
                        <th scope="col">Challenge</th>
                        <th scope="col">Prize</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Registration Fee</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tournament as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->competition->competition }}</td>
                            <td>{{ $item->tournament }}</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->location }}</td>
                            <td>{{ $item->participants }}</td>
                            <td>{{ $item->challenges }}</td>
                            <td>{{ $item->contact }}</td>
                            <td>{{ $item->registration_fee }}</td>
                            <td>{{ $item->prizes }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $item->image) }}" alt="" style="width:50px;">
                            </td>
                            <td>
                                <div class="d-flex gap-3 align-items-center">
                                    <a class="btn btn-warning mt-1 mb-1" href="{{ route('tournament.edit', $item->id) }}"
                                        role="button">Edit</a>
                                    <form action="{{ route('tournament.destroy', $item->id) }}" method="POST">
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
