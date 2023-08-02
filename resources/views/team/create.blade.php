@extends('team.layout')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card mt-3" style="width:40rem;">
            <div class="card-header">
                Add New Team
            </div>
            <div class="card-body bg-secondary">
                <form action="{{ route('team.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex justify-content-center gap-5">
                        <div class="form-left">
                            <div class="mb-3">
                                <label for="tournament_id" class="form-label">Tournament</label>
                                <select class="form-select" aria-label="Default select example" name="tournament_id">
                                    <option selected>Open this select menu</option>
                                    @foreach ($tournament as $item)
                                        <option value="{{ $item->id }}">{{ $item->tournament }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="team" class="form-label">Team Name</label>
                                <input type="text" class="form-control" id="team" autocomplete="off"
                                    name="team">
                            </div>
                        </div>
                        <div class="form-right">
                            
                            <div class="mb-3">
                                <label for="member" class="form-label">Member</label>
                                <textarea class="form-control" placeholder="Leave a comment here" id="member" name="member" style="white-space: pre-wrap"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Team Logo</label>
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
