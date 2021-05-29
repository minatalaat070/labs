<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Support\Facades\Storage;
class MemberController extends Controller {

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
