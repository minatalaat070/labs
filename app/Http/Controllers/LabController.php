<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function now;
use function redirect;

class LabController extends Controller {

	protected function getImageNameForStorage($image) {
		return ((string) now()->timestamp) . $image->getClientOriginalName();
	}

	function store(Request $req) {

		$req->validate([
			'name' => 'required|string|max:255',
			'name_ar' => 'required|string|max:255',
			'about' => 'required|string|max:65535',
			'about_ar' => 'required|string|max:65535',
			'image' => 'dimensions:min_width=100,min_height=200'
		]);
		$name = $req->name;
		$slug = ((string) now()->timestamp) . str_replace(' ', '-', strtolower($name));
		$image_name = "";
		if ($req->has("image")) {
			$image_name = $this->getImageNameForStorage($req->file('image'));
		}
		$lab = new Lab;
		$lab->name = $name;
		$lab->name_ar = $req->name_ar;
		$lab->about = $req->about;
		$lab->about_ar = $req->about_ar;
		$lab->slug = $slug;
		$lab->image = $image_name;
		$lab->save();
		$req->file('image')->storeAs("public/uploads/images/labs", $image_name);
		return redirect()->back();
	}

	function edit(Lab $lab) {
		return view('admin.edit-lab', ['lab' => $lab]);
	}

	function update($id, Request $req) {
		$lab = Lab::findOrFail($id);
		if ($req->hasFile('image')) {
			$new_image_name = $this->getImageNameForStorage($req->file('image'));
			Storage::delete("public/uploads/images/labs/" . $lab->image);
			$req->file('image')->storeAs("public/uploads/images/labs", $new_image_name);
			$lab->image = $new_image_name;
		}
		$lab->name = $req->name;
		$lab->name_ar = $req->name_ar;
		$lab->about = $req->about;
		$lab->about_ar = $req->about_ar;
		$lab->save();
		return redirect()->back();
	}

	function delete($id) {
		//delete lab image
		$image = Lab::findOrFail($id)->image;
		//delete relation images
		$allImagesDeleted = MemberController::deleteImagesWithLabId($id);
		//delete relation devices
		$allDevicesDeleted = DeviceController::deleteImagesWithLabId($id);
		//delete lab
		Lab::findOrFail($id)->delete();
		// delete lab image from physical storage
		$isImageDeleted = Storage::delete("public/uploads/images/labs/" . $image);
		return ($isImageDeleted and $allDevicesDeleted and $allImagesDeleted) ? redirect()->back() : dd("something faild");
	}

}
