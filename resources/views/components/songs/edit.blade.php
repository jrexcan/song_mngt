@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
                        <h1 class="mt-4">Song Lyrics Management</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Edit Song
                            </div>
                            
                            <div class="card-body">
                            <form method="POST" action="{{ route('songs.update',$song->id)}}">
                                @csrf
                                @method('PUT')
                                            <div class="form-floating mb-3">
                                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $song->title }}" required placeholder="Title" />
                                                <label for="title">Title</label>
                                                @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input id="artist" type="text" class="form-control @error('artist') is-invalid @enderror" name="artist" value="{{ $song->artist }}" required placeholder="Artist" />
                                                <label for="artist">Artist</label>
                                                @error('artist')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea id="lyrics" type="text" class="form-control @error('lyrics') is-invalid @enderror" name="lyrics" required placeholder="Song Lyrics">{{ $song->lyrics }}</textarea>
                                                <label for="lyrics">Song Lyrics</label>
                                                @error('artist')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Save') }}
                                                </button>
                                            </div>
                                        </form>
                            </div>
                        </div>
                    </div>
@endsection
