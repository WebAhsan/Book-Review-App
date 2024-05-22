@extends('layout.app')

@section('main')
<div class="container mt-3 ">
    <div class="row justify-content-center d-flex mt-5">
        <div class="col-md-12">
            <a href="{{route('home.index')}}" class="text-decoration-none text-dark ">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp; <strong>Back to books</strong>
            </a>
            <div class="row mt-4">
                <div class="col-md-4">
                    @if(!empty($books->image))
                    <a href="detail.html"><img src="{{asset('uploads/book/'.$books->image)}}" alt="" class="card-img-top"></a>
                    @else{
                    <a href="detail.html"><img src="https://placehold.co/400" alt="" class="card-img-top"></a>
                    }
                    @endif
                </div>
                <div class="col-md-8">
                    <h3 class="h2 mb-3">{{ $books->title }}</h3>
                    <div class="h4 text-muted">{{ $books->author }}</div>
                    <div class="star-rating d-inline-flex ml-2" title="">
                        <span class="rating-text theme-font theme-yellow">5.0</span>
                        <div class="star-rating d-inline-flex mx-2" title="">
                            <div class="back-stars ">
                                <i class="fa fa-star " aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>

                                <div class="front-stars" style="width: 100%">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <span class="theme-font text-muted">(0 Review)</span>
                    </div>

                    <div class="content mt-3">
                        <p>
                            {{ $books->description }}
                        </p>
                    </div>

                    <div class="col-md-12 pt-2">
                        <hr>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h2 class="h3 mb-4">Readers also enjoyed</h2>
                        </div>

                        @foreach($relatedBooks as $relatedBook)

                        <div class="col-md-4 col-lg-3 mb-4">
                            <div class="card border-0 shadow-lg">

                                @if(!empty($relatedBook->image))
                                <a href="detail.html"><img src="{{asset('uploads/book/'.$relatedBook->image)}}" alt="" class="card-img-top"></a>
                                @else{
                                <a href="detail.html"><img src="https://placehold.co/400" alt="" class="card-img-top"></a>
                                }
                                @endif

                                <div class="card-body">
                                    <h3 class="h4 heading"><a href="{{ route('home.singleBook',$books->id) }}">{{ $relatedBook->title }}</a></h3>
                                    <p>by {{ $relatedBook->author }}</p>
                                    <div class="star-rating d-inline-flex ml-2" title="">
                                        <span class="rating-text theme-font theme-yellow">5.0</span>
                                        <div class="star-rating d-inline-flex mx-2" title="">
                                            <div class="back-stars ">
                                                <i class="fa fa-star " aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>

                                                <div class="front-stars" style="width: 100%">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="theme-font text-muted">(2 Reviews)</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach

                    </div>
                    <div class="col-md-12 pt-2">
                        <hr>
                    </div>
                    <div class="row pb-5">
                        <div class="col-md-12  mt-4">
                            <div class="d-flex justify-content-between">
                                <h3>Reviews</h3>
                                <div>

                                    @if(Auth::check())
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Add Review
                                    </button>
                                    @else
                                    <a href="{{ route('account.login') }}" class="btn btn-primary"> Add Review</a>
                                    @endif
                                </div>
                            </div>

                            <div class="card border-0 shadow-lg my-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="mb-3">John Doe</h4>
                                            <span class="text-muted">8 Apr, 2024</span>
                                    </div>

                                    <div class="mb-3">
                                        <div class="star-rating d-inline-flex" title="">
                                            <div class="star-rating d-inline-flex " title="">
                                                <div class="back-stars ">
                                                    <i class="fa fa-star " aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>

                                                    <div class="front-stars" style="width: 70%">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="content">
                                        <p>This book does a great job of laying down the framework of how habits are formed, and shares insightful strategies for building good habits and breaking bad ones. Even though I was already familiar with research behind habit formation, reading through this book helped me approach habits I’m trying to adopt or break in my own life from different angles.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 shadow-lg my-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="mb-3">John Doe</h4>
                                            <span class="text-muted">8 Apr, 2024</span>
                                    </div>

                                    <div class="mb-3">
                                        <div class="star-rating d-inline-flex" title="">
                                            <div class="star-rating d-inline-flex " title="">
                                                <div class="back-stars ">
                                                    <i class="fa fa-star " aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>

                                                    <div class="front-stars" style="width: 70%">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="content">
                                        <p>This book does a great job of laying down the framework of how habits are formed, and shares insightful strategies for building good habits and breaking bad ones. Even though I was already familiar with research behind habit formation, reading through this book helped me approach habits I’m trying to adopt or break in my own life from different angles.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 shadow-lg my-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="mb-3">John Doe</h4>
                                            <span class="text-muted">8 Apr, 2024</span>
                                    </div>

                                    <div class="mb-3">
                                        <div class="star-rating d-inline-flex" title="">
                                            <div class="star-rating d-inline-flex " title="">
                                                <div class="back-stars ">
                                                    <i class="fa fa-star " aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>

                                                    <div class="front-stars" style="width: 70%">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="content">
                                        <p>This book does a great job of laying down the framework of how habits are formed, and shares insightful strategies for building good habits and breaking bad ones. Even though I was already familiar with research behind habit formation, reading through this book helped me approach habits I’m trying to adopt or break in my own life from different angles.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Review for <strong>Atomic Habits</strong></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="reviewForm">
                <div class="modal-body">
                    <input type="hidden" id="book_id" name="book_id" value="{{ $books->id }}">
                    <div class="mb-3">
                        <label for="review" class="form-label">Review</label>
                        <textarea name="review" id="review" class="form-control" cols="5" rows="5" placeholder="Review"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select name="rating" id="rating" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Review Submission Error</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                You have already submitted a review for this book.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@endsection


@section('script')

<script>
    $('#reviewForm').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Get form values
        var review = $('#review').val();
        var rating = $('#rating').val();
        var bookId = $('#book_id').val(); // Assuming there's an input for book_id

        // Basic client-side validation
        if (!review || !rating || !bookId) {
            alert('Please fill in the review, rating, and select a book.');
            return; // Stop the function execution
        }

        $.ajax({
            url: '{{ route("reviews.store") }}', // Update with your actual route
            method: 'POST',
            data: {
                review: review,
                rating: rating,
                book_id: bookId,
                _token: '{{ csrf_token() }}' // Include CSRF token for security
            },
            success: function(response) {
                // Handle success and error messages
                if (response.message === 'You have already submitted a review for this book.') {
                    // Display the message in a Bootstrap modal or a custom popup modal
                    $('#myModal').modal('show');
                } else {
                    alert(response.message);
                    if (response.message === 'Review submitted successfully!') {
                        $('#reviewForm')[0].reset(); // Reset form fields
                        $('.modal').modal('hide'); // Optionally, close the modal
                    }
                }
            },
            error: function(xhr) {
                // Handle error response
                alert('An error occurred while submitting your review.');
            }
        });
    });
</script>


@endsection