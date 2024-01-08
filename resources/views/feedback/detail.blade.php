@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-header bg-dark text-white text-center">
                    <h5 class="card-title mb-0 text-capitalize">Feedback Details</h5>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Title:</strong>
                        </div>
                        <div class="col-md-8">
                            <p>{{$feedback->title}}</p>
                        </div>
                    </div>

                    <div class="row bg-light">
                        <div class="col-md-4">
                            <strong>Category:</strong>
                        </div>
                        <div class="col-md-8">
                            <p>{{$feedback->category}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <strong>Status:</strong>
                        </div>
                        <div class="col-md-8">
                            <p>{{$feedback->status}}</p>
                        </div>
                    </div>

                    <div class="row bg-light">
                        <div class="col-md-4">
                            <strong>Description:</strong>
                        </div>
                        <div class="col-md-8">
                            <p>{{$feedback->description}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <strong>Created By:</strong>
                        </div>
                        <div class="col-md-8">
                            <p>{{$feedback->created_by->name ?? ''}}</p>
                        </div>
                    </div>

                    <div class="row bg-light">
                        <div class="col-md-4">
                            <strong>Created At:</strong>
                        </div>
                        <div class="col-md-8">
                            <p>{{$feedback->created_at}}</p>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <a href="{{ route('feedback.index') }}" class="btn btn-primary"> <i class="fa fa-fw fa-reply-all"></i>Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // function loadFeedbackDetails() {
    //     // Fetch feedback details using AJAX and update modal content
    //     // For demonstration purposes, let's assume the feedback details are fetched from a URL endpoint '/feedbacks/1/details'
    //     fetch('/feedbacks/1/details')
    //         .then(response => response.text())
    //         .then(data => {
    //             document.getElementById('feedbackDetailContent').innerHTML = data;
    //         })
    //         .catch(error => console.error('Error:', error));
    // }
</script>
@endsection
