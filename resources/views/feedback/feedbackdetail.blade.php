@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    <h3>Feedback Detail</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group>
                                        <label for="title"><strong>Title:</strong> </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="title" value="{{ $feedback->title }}" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="category"> <strong>Category:</strong></label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="category" value="{{ $feedback->category }}" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="status"> <strong>Status:</strong></label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="status" value="{{ $feedback->status }}" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="description"> <strong>Description:</strong></label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <textarea class="form-control" id="description" rows="4" readonly>{{ $feedback->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="created_by"> <strong>Created By:</strong></label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="created_by" value="{{ $feedback->created_by->name ?? '' }}" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="created_at"> <strong> Created At:</strong></label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="created_at" value="{{ $feedback->created_at }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="{{ route('feedback.index') }}" class="btn btn-secondary mr-2"><i class="fa fa-fw fa-reply-all"></i>Back</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
