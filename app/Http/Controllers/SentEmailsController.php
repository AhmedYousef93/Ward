<?php

namespace App\Http\Controllers;

use App\Email;
use Illuminate\Http\Request;

class SentEmailsController extends Controller
{
    public function index()
    {
        $emails = Email::all();
        return view('admin.emails.show' , compact('emails'));
    }

    public function destroy($id)
    {
        Email::where('id' , $id)->delete();
        return redirect()->back();
    }

}
