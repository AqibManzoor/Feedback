<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create()
    {
        return view('comment.create');
    }

    public function comment()
{
    $comments = Comment::orderBy('created_at', 'desc')->paginate(10);
    return view('comment.index', compact('comments'));
}

    public function store(Request $request){
      $validated = $request->validate([
        'feedback_id' => 'required',
        'comment' => 'required',

        ]);
        $user_id = auth()->id();
        $comment =  new Comment();
        $comment->feedback_id = $request->feedback_id;
        $comment->comment = $request->comment;
        $comment->user_id = $user_id;
        if($comment->save()){
          return back()->with('Submitted successfully');
        }
        else{
           return redirect('comment')->with('something went wrong');
        }

      }
      public function edit(Request $request){

        $comment =  Comment::where('id',$request->id)->first();
        return view('comment.edit',compact('comment'));
  
      }
      public function update(Request $request){

        $validated = $request->validate([
            'id' => 'required',
            'comment' => 'required',
        ]);
        $Comment = Comment::where('id',$request->id)->first();
        $Comment->comment = $request->comment;
        if($Comment->save()){
          return redirect('feedback')->with('Updated successfully');
        }
        else{
           return redirect('feedback')->with('something went wrong');
        }
        
  
      }
      public function destory(Request $request){

        $Comment =  Comment::where('id',$request->id)->delete();
        return redirect()->back()->with('Deleted successfully');

      }
}
