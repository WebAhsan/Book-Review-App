@extends('layout.app')

<div class="container">
    <div class="row my-5">
        @include('layout.sidebar')
        <div class="col-md-9">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="card border-0 shadow">
                <div class="card-header  text-white">
                    Books
                </div>
                <div class="card-body pb-0">

                    <form action="" method="get">
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="{{route('books.addbook')}}" class="btn btn-primary">Add Book</a>
                            <div class="d-flex gap-2">
                                <input type="text" class="form-control" value="{{Request::get('keyword')}}" name="keyword" placeholder="Keyword">
                                <button type="submit" class="btn btn-primary">Search</button>
                                <a href="{{route('books.booklist')}}" class="btn btn-secondary">Clear</a>
                            </div>
                        </div>
                    </form>



                    <table class="table  table-striped mt-3">
                        <thead class="table-dark">
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th width="150">Action</th>
                            </tr>
                        <tbody>

                            @if(!empty($books))
                            @foreach($books as $book)
                            <tr>
                                <td> {{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td> 3.0 (3 Reviews)</td>
                                <td>
                                    @if($book->status == 1)
                                    <span class="text-success">Active</span>
                                    @else
                                    <span class="text-danger">Block</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class="btn btn-success btn-sm"><i class="fa-regular fa-star"></i></a>
                                    <a href="{{route('books.editbook',$book->id)}}" class="btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a href="{{ route('books.dltbookauth',$book->id) }}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @else
                            <tr>
                                <td colspan="5">Books not found</td>
                            </tr>

                            @endif

                        </tbody>
                        </thead>
                    </table>
                    <nav aria-label="Page navigation ">
                        {{ $books->links() }}
                    </nav>
                </div>

            </div>
        </div>
    </div>
</div>