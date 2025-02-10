<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;


use App\Mail\NewsLetter;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $users = User::all();
        // $users = User::orderBy('id', 'desc')->get();
        // $users = User::latest()->get();
        // $users = User::latest()->simplePaginate(3);
        // $total_users = User::count();
        // return view('home', compact('users', 'total_users'));


        return view('home', [
            'users' => User::latest()->simplePaginate(3),
            'total_users' => User::count(),
            'contacts' => Contact::all(),
        ]);
    }
    public function sendnewsletter()
    {
        $emails = User::all()->pluck('email');

        foreach ($emails as $email) {
            Mail::to($email)->send(new NewsLetter());
        }
        return back();
    }
    public function contactuploaddownload($contact_id)
    {
        // $contact = Contact::findOrFail($contact_id);
        // return Storage::download($contact, $contact->cantact_name, $headers);

        // return Storage::download("contact_uploads/{$contact}");

        // $contact = Contact::findOrFail($contact_id . "." . $contact_id->file('contact_attachment')->getClientOriginalExtension());
        // // echo $contact;

        // // die();
        // return Storage::download($contact);

        // return response()->download(public_path('contact_uploads/' . $contact->contact_attachment));

        $contact = Contact::findOrFail($contact_id);

        if (!$contact->contact_attachment) {
            abort(404, 'Attachment not found');
        }

        $filePath = Storage::disk('public')->path($contact->contact_attachment);
        $fileName = basename($contact->contact_attachment);

        return response()->download($filePath, $fileName, [
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ]);
    }
}
