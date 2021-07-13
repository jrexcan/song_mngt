@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
                        <h1 class="mt-4">Song Lyrics Management</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of Songs
                            </div>
                            
                            <div class="card-body">
                                <!-- <button class="btn btn-primary btn-sm">
                                                    {{ __('Add New Song') }}
                                </button> -->
                                <a class="btn btn-primary btn-sm" href="{{ route('songs.create') }}">
                                        {{ __('Add New Song') }}
                                    </a>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Artist</th>
                                            <th>Song Lyrics</th>
                                            <th>Date Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Artist</th>
                                            <th>Song Lyrics</th>
                                            <th>Date Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($songs as $song)
                                        <tr>
                                            <td>{{$song->title}}</td>
                                            <td>{{$song->artist}}</td>
                                            <td>{{$song->lyrics}}</td>
                                            <td>{{$song->created_at}}</td>
                                            <td>
                                            <!-- <a class="btn btn-link" href="{{route('songs.edit', ['id'=>$song->id])}}">Edit</a> -->
                                            <!-- <a class="btn btn-link" href="{{route('songs.destroy', ['id'=>$song->id])}}">Delete</a> -->
                                            <form action="{{route('songs.destroy',$song->id)}}" method="POST">
                                                <a class="btn btn-primary" href="{{ route('songs.edit',$song->id) }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection
