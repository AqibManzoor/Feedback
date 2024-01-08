<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Comment;
use App\Models\Feedback;

class VoteController extends Controller
{
    public function upvote(Request $request, $feedbackid)
    {
      
        $user = auth()->user();
        $comment = Feedback::findOrFail($feedbackid);

        // Check if the user has already voted for this comment
        if ($user->votes()->where('feedback_id', $feedbackid)->exists()) {
            return back();
        }

        // Store the upvote
        $vote = new Vote();
        $vote->user_id = $user->id;
        $vote->feedback_id = $feedbackid;
        $vote->vote_type = 'upvote';
        $vote->save();

        return redirect('feedback');
    }

    public function downvote(Request $request, $commentId)
    {
        // Similar logic for downvoting
    }
}