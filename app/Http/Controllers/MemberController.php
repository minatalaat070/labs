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
			'image' => 'required|dimensions:min_width=100,min_height=200',
			'cv_file' => 'required|mimes:pdf,docx,doc',
			'staff_url' => 'required|url|max:2038'
		]);
		$member = new Member();
		$user_name = ((string) now()->timestamp) . str_replace(' ', '-', strtolower($member->name));
		$image_name = "";
		$cv_file_name = "";
		if ($req->hasFile('image')) {
			$image_name = $this->getFileNameForStorage($req->file('image'));
			$member->image = $image_name;
		}
		if ($req->hasFile('cv_file')) {
			$cv_file_name = $this->getFileNameForStorage($req->file('cv_file'));
			$member->cv_file = $cv_file_name;
		}
		$member->name = $req->name;
		$member->name_ar = $req->name_ar;
		$member->about = $req->about;
		$member->about_ar = $req->about_ar;
		$member->user_name = $user_name;
		$member->lab_id = $req->lab_id;
		$member->staff_url = $req->staff_url;
		$member->save();
		$req->file('image')->storeAs("public/uploads/images/members", $image_name);
		$req->file('cv_file')->storeAs("public/uploads/cvs", $cv_file_name);
		return redirect()->back();
	}

	function edit(Member $member) {
		return view("admin.member.edit-member", ["member" => $member, "labs" => Lab::all()]);
	}

	function update($id, Request $req) {
		$member = Member::findOrFail($id);
		if ($req->hasFile('image')) {
			$new_image_name = $this->getFileNameForStorage($req->file('image'));
			Storage::delete("public/uploads/images/members/" . $member->image);
			$req->file('image')->storeAs("public/uploads/images/members", $new_image_name);
			$member->image = $new_image_name;
		}
		if ($req->hasFile('cv_file')) {
			$new_file_name = $this->getFileNameForStorage($req->file('cv_file'));
			Storage::delete("public/uploads/cvs" . $member->cv_file);
			$req->file('image')->storeAs("public/uploads/cvs", $new_file_name);
			$member->cv_file = $new_file_name;
		}
		$member->name = $req->name;
		$member->name_ar = $req->name_ar;
		$member->about = $req->about;
		$member->lab_id = $req->lab_id;
		$member->about_ar = $req->about_ar;
		$member->staff_url = $req->staff_url;
		$member->save();
		return redirect()->back();
	}

	function delete($id) {
		$member = Member::findOrFail($id);
		// delete member image from physical storage
		$image = $member->image;
		$isImageDeleted = Storage::delete("public/uploads/images/members" . $image);
		// delete member cv from physical storage
		$cv_file = $member->cv_file;
		$isCvFileDeleted = Storage::delete("public/uploads/cvs" . $cv_file);
		//delete member
		$member->delete();
		return ($isCvFileDeleted and $isImageDeleted) ? redirect()->back() : dd("something faild");
	}

	protected function getFileNameForStorage($file) {
		return ((string) now()->timestamp) . $file->getClientOriginalName();
	}

	static function deleteImagesAndCVsWithLabId($id) {
		$members = Member::where('lab_id', '=', (string) $id)->get();
		foreach ($members as $member) {
			if (Storage::exists("public/uploads/images/members" . $member->cv_file)) {
				Storage::delete("public/uploads/images/members" . $member->image);
			}
			if (Storage::exists("public/uploads/cvs" . $member->cv_file)) {
				Storage::delete("public/uploads/cvs" . $member->cv_file);
			}
		}
		return;
	}

}
