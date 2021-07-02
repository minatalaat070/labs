<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller {

	function contactus() {
		return view('contactus');
	}

	function sendEmail(Request $request) {
		$mail = [
			'name' => $request->name,
			'email' => $request->email,
			'msg' => $request->msg
		];
		Mail::to('c.ronaldothebest77@gmail.com')->send(new ContactMail($mail));
		return back()->with(['email-sent', 'Thank you, your email has been sent and we will respond soon']);
	}

}
