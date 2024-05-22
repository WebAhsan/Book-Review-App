@extends('layout.app')
<div class="container">
    <div class="row my-5">
        @include('layout.sidebar')
        <div class="col-md-9">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="card border-0 shadow">
                <div class="card-header  text-white">
                    Add Book
                </div>


                <form action="{{route('books.editbookauth',$books->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" value="{{ $books->title }}" class="form-control @error('title') is-invaild @enderror " placeholder="Title" name="title" id="title" />
                            @error('title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" value="{{$books->author}}" class="form-control @error('author') is-invaild @enderror" placeholder="Author" name="author" id="author" />
                            @error('author')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="author" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invaild @enderror" value="{{old('description')}}" placeholder="Description" cols="30" rows="5"></textarea>
                            @error('description')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="Image" class="form-label">Image</label>
                            <input type="file" value="{{old('image')}}" class="form-control @error('image') is-invaild @enderror" name="image" id="image" />
                            @error('image')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        @if(!empty($books->image))
                        <img class="w-50" src="{{asset('uploads/book/'.$books->image)}}" alt="">
                        @endif

                        <div class="mb-3">
                            <label for="author" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Block</option>
                            </select>
                        </div>


                        <button class="btn btn-primary mt-2">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>