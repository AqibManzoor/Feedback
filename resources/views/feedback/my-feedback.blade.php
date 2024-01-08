@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-11 offset-lg-1">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Showing All Feedbacks
                        </span>

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
                    <div class="table-responsive users-table">
                        <table class="table table-striped table-sm data-table">
                            <!-- <caption id="user_count">
                                    3 user total
                                </caption> -->
                            <thead class="thead">
                                <tr>
                                    <th>Title</th>
                                    <th class="hidden-xs">Catagory</th>
                                    <th class="hidden-xs">Status</th>
                                    <th class="hidden-xs">Description</th>
                                    <th class="hidden-sm hidden-xs hidden-md">Created By</th>
                                    <th class="hidden-sm hidden-xs hidden-md">Created At</th>
                                    <th>Actions</th>
                                    <th class="no-search no-sort"></th>
                                    <th class="no-search no-sort"></th>
                                </tr>
                            </thead>

                            <tbody id="users_table">
                                @foreach($feedbacks as $feedback)
                                <tr>
                                    <td>{{$feedback->title}}</td>
                                    <td>{{$feedback->category}}</td>
                                    <td>{{$feedback->status}}</td>
                                    <td>{{ substr($feedback->description,0,10) }}</td>
                                    <td>{{$feedback->created_by->name??''}}</td>
                                    <td class="hidden-sm hidden-xs hidden-md">{{$feedback->created_at}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="{{ route('feedback.feedbackdetail', ['id' => $feedback->id]) }}" data-toggle="tooltip" title="Show">
                                            <i class="fa fa-eye fa-fw" aria-hidden="true"></i>
                                            <span class="hidden-xs hidden-sm">Detail</span>
                                            <span class="hidden-xs hidden-sm hidden-md"> </span>
                                        </a>

                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                            <tbody id="search_results"></tbody>
                            <tbody id="search_results"></tbody>

                        </table>
                        {{ $feedbacks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection