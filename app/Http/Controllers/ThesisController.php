<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\Thesis;
use Illuminate\Http\Request;
use function now;
use function redirect;
use function view;

class ThesisController extends Controller {

	function store(Request $req) {
		$req->validate([
			'title' => 'required|string|max:255',
			'title_ar' => 'required|string|max:255',
			'lab_id' => 'required',
			'author' => 'required|string|max:255',
			'author_ar' => 'required|string|max:255',
			'supervisors' => 'required|string|max:65535',
			'supervisors_ar' => 'required|string|max:65535',
			"year" => "required|string|max:4",
			'about' => 'required|string|max:65535',
			'about_ar' => 'required|string|max:65535',
			'pdf_url' => 'nullable|url'
		]);
		$thesis = new Thesis();
		$thesis->title = $req->title;
		$slug = ((string) now()->timestamp) . str_replace(' ', '-', strtolower($thesis->title));
		$thesis->title_ar = $req->title_ar;
		$thesis->about = $req->about;
		$thesis->about_ar = $req->about_ar;
		$thesis->author = $req->author;
		$thesis->author_ar = $req->author_ar;
		$thesis->supervisors = $req->supervisors;
		$thesis->supervisors_ar = $req->supervisors_ar;
		$thesis->awarded_at = $req->year;
		$thesis->slug = $slug;
		if (!($req->pdf === null)) {
			$thesis->pdf_url = $req->pdf_url;
		} else {
			$thesis->pdf_url = "http://www.example.com";
		}
		$thesis->lab_id = $req->lab_id;
		$thesis->save();
		return redirect()->back();
	}

	function edit(Thesis $thesis) {
		return view("admin.thesis.edit-thesis", [
			'thesis' => $thesis,
			'labs' => Lab::all()
		]);
	}

	function update($id, Request $req) {
		$thesis = Thesis::findOrFail($id);
		$thesis->title = $req->title;
		$thesis->title_ar = $req->title_ar;
		$thesis->author = $req->author;
		$thesis->author_ar = $req->author_ar;
		$thesis->supervisors = $req->supervisors;
		$thesis->supervisors_ar = $req->supervisors_ar;
		$thesis->awarded_at = $req->year;
		$thesis->about = $req->about;
		$thesis->about_ar = $req->about_ar;
		$thesis->lab_id = $req->lab_id;
		$thesis->save();
		return redirect()->back();
	}

	function delete($id) {
		$thesis = Thesis::findOrFail($id);
		$thesis->delete();
		return redirect()->back();
	}

}
