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
			'name' => 'required|string|max:255',
			'name_ar' => 'required|string|max:255',
			'publisher' => 'required|string|max:255',
			'publisher_ar' => 'required|string|max:255',
			"day" => "required",
			"hour" => "required",
			'about' => 'required|string|max:65535',
			'about_ar' => 'required|string|max:65535',
			'pdf_url' => 'nullable|url'
		]);
		$research = new Research();
		$research->name = $req->name;
		$slug = ((string) now()->timestamp) .  str_replace(' ', '-', strtolower($research->name));
		$research->name_ar = $req->name_ar;
		$research->about = $req->about;
		$research->about_ar = $req->about_ar;
		$research->publisher_name = $req->publisher;
		$research->publisher_name_ar = $req->publisher_ar;
		$research->published_at = $req->day . " " . $req->hour;
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
	}function update($id, Request $req) {
		$research = Research::findOrFail($id);
		$research->name = $req->name;
		$research->name_ar = $req->name_ar;
		$research->publisher_name = $req->publisher;
		$research->publisher_name_ar = $req->publisher_ar;
		$research->published_at = $req->day . " " . $req->hour;
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
