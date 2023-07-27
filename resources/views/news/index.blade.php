@extends('news.layout')
@section('content')
    <div class="card mt-5" style="width: 70rem">
        <div class="card-header">
            <h3>News</h3>
            <a class="btn btn-success mt-1 mb-1" href="{{ route('news.create') }}" role="button">Add News</a>
        </div>
        <div class="card-boy">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Date</th>
                        <th scope="col">Content</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->content }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $item->image) }}" alt="" style="width:50px;">
                            </td>
                            <td>
                                <div class="d-flex gap-3 align-items-center">
                                    <a class="btn btn-warning mt-1 mb-1" href="{{ route('news.edit', $item->id) }}"
                                        role="button">Edit</a>
                                    <form action="{{ route('news.destroy', $item->id) }}" method="POST">
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
