<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function sendEmail(Request $request)
    {
        $message = $request->input('message');
        $user = Auth::user();

        try {
            Mail::to('support@example.com')->send(new ContactEmail($message, $user->name, $user->email));
            return view('success');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
