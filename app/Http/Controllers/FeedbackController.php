<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Theme;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FeedbackController extends Controller
{

  public function create()
  {
    return view('feedback.create');
  }
  public function index()
  {
    $feedbacks = Feedback::with('comments', 'votes')->orderBy('id', 'desc')->paginate();
    if (auth()->user()->hasRole('admin'))
      return view('feedback.adminfeedback', compact('feedbacks'));
    else
      return view('feedback.index', compact('feedbacks'));
  }
  public function adminfeedback()
  {
    $feedbacks = Feedback::with('comments')->orderBy('id', 'desc')->paginate();
    return view('feedback.adminfeedback', compact('feedbacks'));
  }
  public function my_feedback()
  {
    $user_id = auth()->id();
    $feedbacks = Feedback::with('comments')->where('user_id', $user_id)->orderBy('id', 'desc')->paginate();
    return view('feedback.my-feedback', compact('feedbacks'));
  }
  public function getUserByuserid($id)
  {
    return User::with('profile')->whereid($id)->firstOrFail();
  }
  public function store(Request $request)
  {
    $validated = $request->validate([
      'title' => 'required',
      'description' => 'required',
      'category' => 'required',
    ]);
    $user_id = auth()->id();
    $feedback =  new Feedback;
    $feedback->title = $request->title;
    $feedback->description = $request->description;
    $feedback->category = $request->category;
    $feedback->user_id = $user_id;
    if ($feedback->save()) {
      return redirect('feedback');
    } else {
      return redirect('feedback/create');
    }
  }
  public function edit(Request $request)
  {

    $feedback =  Feedback::where('id', $request->id)->first();
    return view('feedback.update', compact('feedback'));
  }
  public function detail($id)
  {
    // Fetch the feedback with the given ID from the database
    $feedback = Feedback::find($id);

    // Pass the feedback data to the detail view
    return view('feedback.detail', ['feedback' => $feedback]);
  }
  public function feedbackdetail($id)
  {
    // Fetch the feedback with the given ID from the database
    $feedback = Feedback::find($id);

    // Pass the feedback data to the detail view
    return view('feedback.feedbackdetail', ['feedback' => $feedback]);
  }



  public function show(Request $request, $id)
  {

    $feedback =  Feedback::with('comments')->where('id', $id)->first();
    return view('feedback.show', compact('feedback'));
  }
  public function update(Request $request, $id)
  {
    //dd('$feedback');
    $feedback = Feedback::findOrFail($id); // Using findOrFail to handle missing IDs

    // Update the feedback attributes
    $feedback->title = $request->input('title');
    $feedback->description = $request->input('description');
    $feedback->category = $request->input('category');

    if ($feedback->save()) {
      return redirect()->route('feedback.index')->with('success', 'Feedback updated successfully.');
    } else {
      return back()->with('error', 'Failed to update feedback.');
    }
  }

  public function destroy(Request $request)
  {
    $feedback = Feedback::where('id', $request->id)->delete();
    return back();
  }
}
