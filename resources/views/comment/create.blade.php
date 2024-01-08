@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <!-- Form for adding comments -->
                <div class="card">
                    <div class="card-header">
                        Add Comment
                    </div>
                    <div class="card-body">
                    <form method="POST" action="{{ route('comment.store') }}">
                            @csrf 

                            <div class="form-group">
                                <label for="username">Your Name</label>
                                <input id="username" type="text" class="form-control" placeholder="Your name" name="username" required>
                            </div>

                            <div class="form-group">
                                <label for="comment">Your Comment</label>
                                <textarea id="comment" class="form-control" placeholder="Write your comment here" name="comment" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
