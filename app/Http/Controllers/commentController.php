<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;


class commentController extends Controller{
    public function destroy($id)
    {
        if (session('isAdmin')) {
            $comment = Comment::findOrFail($id);
            $comment->delete();
            return redirect()->back()->with('success', 'comment deleted successfully.');
        } else {
            abort(403, 'Unauthorized');
        }
    }
}