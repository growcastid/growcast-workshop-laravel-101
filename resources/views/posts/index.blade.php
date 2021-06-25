@extends('layouts.dashboard.master')

@section('title', 'List Posts')

@section('content')
<div class="container">
    @include('layouts.dashboard.include.message')
    <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-success mb-4">Create</a>
        </div>
    </div>
    <div class="row">
        @forelse ($posts as $post)    
            <div class="col-md-4">
                <div class="card mb-4">
                    <img class="card-img-top" src="{{ $post->image_url }}" alt="{{ $post->title }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <h5 class="card-title">{{ $post->title }}</h5>
                            </div>
                            <div class="col-md-3">
                                <span class="badge badge-{{ $post->status == 'inactive' ? 'danger' : 'success' }}">
                                    {{ $post->status == 'inactive' ? 'Inactive' : 'Active' }}
                                </span>
                            </div>
                        </div>
                        <p class="card-text">{{ substr($post->description,0,100) }}...</p>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Do you really want to delete {{ $post->title }}?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <h4 class="text-center">No Posts</h4>
        @endforelse
    </div>
</div>
@endsection