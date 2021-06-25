@extends('layouts.dashboard.master')

@section('title', 'Post Create')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header">Create Post</div>
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input id="title" class="form-control @error('title') is-invalid @enderror" type="text" name="title"
                        value="{{ old('title') }}">

                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" class="form-control @error('description') is-invalid @enderror"
                        name="description" rows="3">{{ old('description') }}</textarea>

                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image_url">Image URL</label>
                    <input id="image_url" class="form-control @error('image_url') is-invalid @enderror" type="text"
                        name="image_url" value="{{ old('image_url') }}">

                    @error('image_url')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" class="form-control @error('status') is-invalid @enderror" name="status">
                        <option value="">-- Select Status --</option>
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>

                    @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('posts.index') }}" class="btn btn-success">Back</a>
            </form>
        </div>
    </div>

</div>
@endsection
