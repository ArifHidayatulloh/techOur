@extends('competition.layout')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card mt-5" style="width:20rem;">
            <div class="card-header">
                Update Competition
            </div>
            <div class="card-body bg-secondary">
                <form action="{{ route('competition.update', $competition->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Competition Name</label>
                        <input type="text" class="form-control" id="name" autocomplete="off" name="competition" value="{{ $competition->competition }}">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Competition Logo</label>
                        <input class="form-control" type="file" id="formFile" name="image">
                    </div>
                    <div class="mb-3">
                        <img src="..." class="" alt="...">
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
