<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use Illuminate\Http\Request;
use function ddd;
use function now;
use function public_path;
use function redirect;

class LabController extends Controller {

	function store(Request $req) {

		$req->validate([
			'name' => 'required|string|max:255',
			'name_ar' => 'required|string|max:255',
			'about' => 'required|string|max:65535',
			'about_ar' => 'required|string|max:65535',
			'image' => 'dimensions:min_width=100,min_height=200'
		]);
		$name = $req->name;
		$slug =  ((string) now()->timestamp) . str_replace(' ', '-', strtolower($name));
		$image_name = "";
		if ($req->has("image")) {
			$image_name = ((string) now()->timestamp) . $req->file('image')->getClientOriginalName();
		}
		$lab = new Lab;
		$lab->name = $name;
		$lab->name_ar = $req->name_ar;
		$lab->about = $req->about;
		$lab->about_ar = $req->about_ar;
		$lab->slug = $slug;
		$lab->image = $image_name;
		$lab->save();
//		dd(public_path("storage/uploads/images/labs"));
		
		$res = $req->file('image')->storeAs("public/uploads/images/labs", $image_name);
		dd($res);
		return redirect()->back();
	}

}
