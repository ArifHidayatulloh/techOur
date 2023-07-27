@extends('news.layout')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card mt-3" style="width:40rem;">
            <div class="card-header">
                Add News
            </div>
            <div class="card-body bg-secondary">
                <form action="{{ route('news.update', $news->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="d-flex justify-content-center gap-5">
                        <div class="form-left">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" autocomplete="off"
                                    name="title" value="{{ $news->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" autocomplete="off" name="date" value="{{ $news->date }}">
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" placeholder="Leave a comment here" id="content" name="content"
                                    style="white-space: pre-wrap"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input class="form-control" type="file" id="image" name="image">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center gap-4">
                        <button type="reset" class="btn btn-danger" style="width:100px">Cancel</button>
                        <button type="submit" class="btn btn-success " style="width: 100px;">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
