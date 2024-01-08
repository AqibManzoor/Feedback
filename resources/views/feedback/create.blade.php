@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        Create New Feedback
                        <div class="pull-right">
                            <a href="{{route('feedback.index')}}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="Back to feedback">
                                <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                <span class="hidden-sm hidden-xs">Back to </span><span class="hidden-xs">feedback</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('feedback.store') }}" accept-charset="UTF-8" role="form" class="needs-validation">
                        @csrf

                        <input type="hidden" name="_token" value="{{ csrf_token() }}" autocomplete="off">

                        <div class="form-group has-feedback row">
                            <label for="username" class="col-md-3 control-label">Title</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input id="title" class="form-control" placeholder="Title" name="title" type="text">
                                    
                                </div>
                            </div>
                        </div>

                        <div class="form-group has-feedback row">
                            <label for="description" class="col-md-3 control-label">Description</label>
                            <div class="col-md-9">
                                <textarea id="description" class="form-control" placeholder="Description" name="description"></textarea>
                            </div>
                        </div>

                        <div class="form-group has-feedback row">
                            <label for="category" class="col-md-3 control-label">Category</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <select class="custom-select form-control" name="category" id="category">
                                        <option value="">Select User Category</option>
                                        <option value="Bug report">Bug report</option>
                                        <option value="Feature request">Feature request</option>
                                        <option value="Improvement">Improvement</option>
                                    </select>
                                   
                                </div>
                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col-md-9 offset-md-3">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection