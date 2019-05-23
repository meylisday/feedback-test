@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-4 mt-2" style="margin-left: 600px;">
        <div class="form-group d-flex justify-content-between align-items-center">
            <label class="form-label mr-2">Sorting: </label>
            <select onchange="filter(this.value)" name="option" class="form-control custom-select selectized">
                <option {{old('option', 'created_at') == $sort_by ? 'selected':''}} value="created_at"> </option>
                <option {{old('option', 'name') == $sort_by ? 'selected':''}} value="name">Name</option>
                <option {{old('option', 'email') == $sort_by ? 'selected':''}} value="email">Email</option>
                <option {{old('option', 'created_at') == $sort_by ? 'selected':''}} value="created_at">Data</option>
            </select>
        </div>
    </div>
</div>
<div class="row">]
    @foreach ($feedback as $item)
    <div class="col-8 m-auto">
        <div class="card card-aside">
            <div class="card-body d-flex flex-column">
                @if (Auth::check())
                    <div class="ml-auto">
                        <a href="{{ route('deleteFeedback', ['id' => $item->id]) }}" class="icon d-none d-md-inline-block ml-3"><i class="fas fa-times fa-lg"></i></a>
                    </div>
                @endif
                <div class="d-flex align-items-center mt-auto">
                    <div class="avatar avatar-xxl mr-3" style="background-image: url({{ url('uploads/'.$item->filename)}})"></div>
                    <div>
                        <a href="./profile.html" class="text-default">{{ $item->name }}</a>
                        <small class="d-block text-muted">{{ $item->email }}</small>
                    </div>
                </div>
                    <div class="text-muted mt-2">{{ $item->message }}</div>
                    <div class="ml-auto">
                        <small class="d-block text-muted">{{ $item->created_at->diffForHumans() }}</small>
                    </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="col-8 m-auto">
        <div class="card mt-4">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @include ('layouts.errors')
                <form method="POST" action="{{url('/')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="form-label">Photo</div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image">
                            <label class="custom-file-label">Choose file</label>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input class="form-control" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="email" name="email">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" maxlength="200" minlength="5" name="message"></textarea>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection