@extends('app')

@section('title', 'Profile Page')

@section('content')

<div class="container">

    <h1>Profile</h1>

    <p>Username: {{ $username ?? '-' }}</p>

    <img height="128" width="128" src="{{ asset('storage/avatar/'.$username.'.jpg') }}" alt="Avatar" required>

    <form method="POST" action="{{ route('upload-avatar') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="avatar">Avatar</label>
            <input id="avatar" type="file" accept="image/*" class="form-control" name="avatar">
        </div>

        <br>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Save
            </button>

            <button type="reset" class="btn btn-outline">
                Reset
            </button>
        </div>
    </form>
</div>

@endsection
