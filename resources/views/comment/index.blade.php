@extends('layouts.app') @section('content') <div class="container">
  <div class="row">
    <!-- Display comments -->
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header"> All Comments </div>
        <div class="card-body">
          <div id="accordion">
             @foreach ($comments as $comment)
              <div class="card">
              <div class="card-header" id="heading{{ $comment->id }}">
                <h5 class="mb-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $comment->id }}" aria-expanded="true" aria-controls="collapse{{ $comment->id }}"> @if ($comment->user) Comment by {{ $comment->user->name }} 
                    @else
                        User not available 
                    @endif
                 </button>
                </h5>
              </div>
              <div id="collapse{{ $comment->id }}" class="collapse" aria-labelledby="heading{{ $comment->id }}" data-parent="#accordion">
                <div class="card-body">
                  {{ $comment->comment }}
                </div>
              </div>
            </div> 
            @endforeach </div>
        </div>
      </div>
    </div>
  </div>
</div> 
@endsection