@extends('layout.app')

@section('main')


<div class="container">
    <div class="row my-5">

        @include('layout.sidebar')

        <div class="col-md-9">
            <div class="card border-0 shadow">
                <div class="card-header  text-white">
                    Profile
                </div>

                <form action="{{route('account.profile.updateprofile')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif


                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" id="" />

                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Email</label>
                            <input type="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" id="email" />
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                            @if(!empty(Auth::user()->image))
                            <img src="{{asset('uploads/profile/'.Auth::user()->image)}}" class="img-fluid mt-4" alt="Luna John">
                            @endif
                            @error('image')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary mt-2">Update</button>
                    </div>

                </form>



            </div>
        </div>
    </div>
</div>


@endsection