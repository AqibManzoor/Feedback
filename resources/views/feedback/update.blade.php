@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('feedback.update', ['id' => $feedback->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input id="title" class="form-control" placeholder="Title" name="title" type="text" value="{{ $feedback->title }}">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" class="form-control" placeholder="Description" name="description">{{ $feedback->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="custom-select form-control" name="category" id="category">
                                <option value="">Select User Category</option>
                                <option value="Bug report" {{ $feedback->category == 'Bug report' ? 'selected' : '' }}>Bug report</option>
                                <option value="Feature request" {{ $feedback->category == 'Feature request' ? 'selected' : '' }}>Feature request</option>
                                <option value="Improvement" {{ $feedback->category == 'Improvement' ? 'selected' : '' }}>Improvement</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection