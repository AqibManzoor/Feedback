@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Showing All Feedbacks
                        </span>
                
                        <a  href="{{ route('feedback.create') }}" class="btn btn-primary bg-dark text-light border-light ">
                            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                            New Feedback
                        </a>

                    </div>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-8 offset-sm-4 col-md-6 offset-md-6 col-lg-5 offset-lg-7 col-xl-4 offset-xl-8">
                            <form method="POST" action="http://127.0.0.1:8000/search-users" accept-charset="UTF-8" role="form" class="needs-validation" id="search_users"><input name="_token" type="hidden" value="8hvzjXLD4MkmbGPKTV2Ri6xL4aITeSIyoQccJOyC">
                                <input type="hidden" name="_token" value="8hvzjXLD4MkmbGPKTV2Ri6xL4aITeSIyoQccJOyC" autocomplete="off">
                                <div class="input-group mb-3">
                                    <input id="user_search_box" class="form-control" placeholder="Search Feedback" aria-label="Search Feedback" name="user_search_box" type="text">
                                    <div class="input-group-append">
                                        <a href="#" class="input-group-addon btn btn-warning clear-search" data-toggle="tooltip" title="Clear Search Results" style="display:none;">
                                            <i class="fa fa-fw fa-times" aria-hidden="true"></i>
                                            <span class="sr-only">
                                                Clear Search Results
                                            </span>
                                        </a>
                                        <a href="#" class="input-group-addon btn btn-secondary" id="search_trigger" data-toggle="tooltip" data-placement="bottom" title="Submit Users Search">
                                            <i class="fa fa-search fa-fw" aria-hidden="true"></i>
                                            <span class="sr-only">
                                                Submit Feedback
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @foreach($feedbacks as $feedback)
                    <div class="container mt-2">
                        <div class="d-flex justify-content-center row">
                            <div class="col-md-8">
                                <div class="d-flex flex-column comment-section" id="accordion">
                                    <div class="bg-white p-2">
                                        <div class="d-flex flex-row user-info"><i class="fa fa-user mt-1"></i>
                                     
                                            <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">{{$feedback->created_by->name??''}}</span><span class="date text-black-50">{{date('Y-M-d',strtotime($feedback->created_at))}}</span></div>
                                        </div>
                                        <div class="mt-2">
                                            <p class="comment-text">{{ $feedback->description }}</p>
                                        </div>
                                    </div>
                                    <div class="bg-white">
                                        <div class="d-flex flex-row fs-12">
                                        <div class="like p-2 cursor">
                                            {!! Form::open(array('url' => 'feedback/' . $feedback->id.'/upvote', 'class' =>'feedback-vote-form', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                               
                                                <i class="fa fa-thumbs-o-up" onclick="submitForm(this)"></i>
                                                <span class="ml-1" onclick="submitForm(this)">Vote({{count($feedback->votes)}})</span>
                                            {!! Form::close() !!}
                                        </div>
                                            <div class="like p-2 cursor"><i class="fa fa-commenting-o"  data-toggle="collapse" data-target="#collapse{{ $feedback->id }}" aria-controls="collapse{{ $feedback->id }}"></i><span class="ml-1">Comment ({{!empty($feedback->comments)? count($feedback->comments??0 ):0}})</span></div>
                                        </div>
                                    </div>
                                    <div  id="collapse{{ $feedback->id }}" class="collapse" aria-labelledby="heading{{ $feedback->id }}" data-parent="#accordion">
                                    @foreach ($feedback->comments as $comment)
                                        <div class="card">
                                        <div >
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                       {{ $comment->comment }}
                                                    </div> 
                                                    <div class="col-md-4 " >
                                                        <span> <i class="fa fa-user"></i> {{$comment->user->name}}</span>
                                                   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div> 
                                        @endforeach 
                                    </div>
                                    <div class="bg-light p-2">
                                        <form action="{{route('comment.store')}}" method="post">
                                        <div class="d-flex flex-row align-items-start"><i class="fa fa-comment mt-1"></i>
                                          @csrf 
                                          <textarea class="form-control ml-1 shadow-none textarea"
                                            name="comment"
                                          ></textarea>
                                          <input type="hidden" name="feedback_id" value="{{ $feedback->id}}">
                                        </div>
                                        <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" type="submit">Post comment</button>
                                        <!-- <button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Cancel</button> -->
                                    </div>
                                        </form>
                                       
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="row">
                        <div class="col-12 text-center">
                        {{ $feedbacks->links() }}

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function submitForm(element) {
        const form = element.closest('.feedback-vote-form');
        if (form) {
            form.submit();
        }
    }
</script>
@endsection