<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\Research;
use Illuminate\Http\Request;
use function now;
use function redirect;
use function view;

class ResearchController extends Controller {

	function store(Request $req) {
		$req->validate([
			'title' => 'required|string|max:255',
			'title_ar' => 'required|string|max:255',
			'lab_id' => 'required',
			'author' => 'required|string|max:255',
			'author_ar' => 'required|string|max:255',
			"year" => "required|string|max:4",
			'journal' => 'required|string|max:255',
			'about' => 'required|string|max:65535',
			'about_ar' => 'required|string|max:65535',
			'pdf_url' => 'nullable|url'
		]);
		$research = new Research();
		$research->title = $req->title;
		$slug = ((string) now()->timestamp) . str_replace(' ', '-', strtolower($research->title));
		$research->title_ar = $req->title_ar;
		$research->about = $req->about;
		$research->about_ar = $req->about_ar;
		$research->author_name = $req->author;
		$research->author_name_ar = $req->author_ar;
		$research->journal = $req->journal;
		$research->published_at = $req->year;
		$research->slug = $slug;
		$research->lab_id = $req->lab_id;
		if (!($req->pdf === null)) {
			$research->pdf_url = $req->pdf_url;
		} else {
			$research->pdf_url = "http://www.example.com";
		}
		$research->save();
		return redirect()->back();
	}

	function edit(Research $research) {
		return view("admin.research.edit-research", [
			'research' => $research,
			'labs' => Lab::all()
		]);
	}

	function update($id, Request $req) {
		$research = Research::findOrFail($id);
		$research->title = $req->title;
		$research->title_ar = $req->title_ar;
		$research->author_name = $req->author;
		$research->author_name_ar = $req->author_ar;
		$research->published_at = $req->year;
		$research->about = $req->about;
		$research->about_ar = $req->about_ar;
		$research->lab_id = $req->lab_id;
		$research->save();
		return redirect()->back();
	}

	function delete($id) {
		$research = Research::findOrFail($id);
		$research->delete();
		return redirect()->back();
	}

}
