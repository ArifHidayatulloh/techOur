@extends('tournament.layout')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card mt-3" style="width:40rem;">
            <div class="card-header">
                Add New Tournament
            </div>
            <div class="card-body bg-secondary">
                <form action="{{ route('tournament.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex justify-content-center gap-5">
                        <div class="form-left">
                            <div class="mb-3">
                                <label for="name" class="form-label">Category</label>
                                <select class="form-select" aria-label="Default select example" name="competition_id">
                                    <option selected>Open this select menu</option>
                                    @foreach ($competition as $item)
                                        <option value="{{ $item->id }}">{{ $item->competition }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Tournament Name</label>
                                <input type="text" class="form-control" id="name" autocomplete="off"
                                    name="tournament">
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" autocomplete="off" name="date">
                            </div>
                            <div class="mb-3">
                                <label for="venue" class="form-label">Venue</label>
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="location" style="white-space: pre-wrap"></textarea>
                            </div>
                        </div>
                        <div class="form-right">

                            <div class="mb-3">
                                <label for="participant" class="form-label">Participant</label>
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="participants" style="white-space: pre-wrap"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="challenges" class="form-label">Challenge</label>
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="challenges" style="white-space: pre-wrap"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="prizes" class="form-label">Prize</label>
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="prizes" style="white-space: pre-wrap"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Competition Logo</label>
                                <input class="form-control" type="file" id="formFile" name="image">
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
