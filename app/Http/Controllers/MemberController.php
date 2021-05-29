<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function view;

class MemberController extends Controller {

	function store(Request $req) {

		$req->validate([
			'name' => 'required|string|max:255',
			'name_ar' => 'required|string|max:255',
			'about' => 'required|string|max:65535',
			'about_ar' => 'required|string|max:65535',
			'image' => 'dimensions:min_width=100,min_height=200'
		]);
		$member = new Member();
		$user_name = ((string) now()->timestamp) . str_replace(' ', '-', strtolower($member->name));
		$image_name = "";
		if ($req->hasFile('image')) {
			$image_name = $this->getImageNameForStorage($req->file('image'));
			$member->image = $image_name;
		}
		$member->name = $req->name;
		$member->name_ar = $req->name_ar;
		$member->about = $req->about;
		$member->about_ar = $req->about_ar;
		$member->user_name = $user_name;
		$member->lab_id = $req->lab_id;
		$member->save();
		$req->file('image')->storeAs("public/uploads/images/members", $image_name);
		return redirect()->back();
	}

	function edit(Member $member) {
		return view("admin.member.edit-member", ["member" => $member, "labs" => Lab::all()]);
	}

	function update($id, Request $req) {
		
	}

	function delete($id) {
		
	}

	protected function getImageNameForStorage($image) {
		return ((string) now()->timestamp) . $image->getClientOriginalName();
	}

	static function deleteImagesWithLabId($id) {
		$images = Member::where('lab_id', '=', (string) $id)->get()->map(function ($member) {
			return $member->image;
		});
		foreach ($images as $image) {
			$isImageDeleted = Storage::delete("public/uploads/images/members/" . $image);
			if (!$isImageDeleted) {
				return false;
			}
		}
		return true;
	}

}
