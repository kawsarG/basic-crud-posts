@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                    <a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger btn-sm"
                        style="float: right;">Add New Post</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p>All Posts</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Tag</th>
                                <th scope="col">Author</th>
                                <th scope="col">Description</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($posts as $post)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$post->title}}</td>
                                <td>{{$post->tag}}</td>
                                <td>{{$post->auth}}</td>
                                <td>{{$post->description}}</td>
                                <td style="display: flex;">
                                    <a href="/posts/edit/{{$post->id}}" class="btn btn-warning btn-sm mr-2">Edit</a>
                                    <a href="/posts/delete/{{$post->id}}" class="btn btn-danger btn-sm mr-2"
                                        id="del">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('/post')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="post title" t name="title">
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" name="author" placeholder="author name">
                    </div>
                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <input type="tags" class="form-control" id="tags" name="tags" placeholder="tags">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection