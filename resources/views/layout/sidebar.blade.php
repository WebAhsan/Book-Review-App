<div class="col-md-3">
    <div class="card border-0 shadow-lg">
        <div class="card-header  text-white">
            Welcome, {{Auth::User()->name}}

        </div>
        <div class="card-body">
            <div class="text-center mb-3">
                @if( Auth::user()->image != "" )
                <img src="{{asset('uploads/profile/'.Auth::user()->image)}}" class="img-fluid rounded-circle" alt="{{ Auth::user()->name }}">
                @endif
            </div>
            <div class="h5 text-center">
                <strong>{{Auth::User()->name}}</strong>
                <p class="h6 mt-2 text-muted">5 Reviews</p>
            </div>
        </div>
    </div>
    <div class="card border-0 shadow-lg mt-3">
        <div class="card-header  text-white">
            Navigation
        </div>
        <div class="card-body sidebar">
            <ul class="nav flex-column">

                @if(Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a href="{{route('books.booklist')}}">Books</a>
                </li>
                <li class="nav-item">
                    <a href="reviews.html">Reviews</a>
                </li>
                @endif


                <li class="nav-item">
                    <a href="{{route('account.userprofile')}}">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="my-reviews.html">My Reviews</a>
                </li>
                <li class="nav-item">
                    <a href="change-password.html">Change Password</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('account.logout')}}">Logout</a>
                </li>
            </ul>

        </div>
    </div>
</div>