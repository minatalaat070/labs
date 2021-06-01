<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Lab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function now;
use function redirect;
use function view;

class DeviceController extends Controller {

	function store(Request $req) {
		$req->validate([
			'name' => 'required|string|max:255',
			'name_ar' => 'required|string|max:255',
			'description' => 'required|string|max:65535',
			'description_ar' => 'required|string|max:65535',
			'image' => 'dimensions:min_width=100,min_height=200'
		]);
		$device = new Device();
		$image_name = "";
		if ($req->hasFile('image')) {
			$image_name = $this->getImageNameForStorage($req->file('image'));
			$device->image = $image_name;
		}
		$device->name = $req->name;
		$slug = ((string) now()->timestamp) . str_replace(' ', '-', strtolower($device->name));
		$device->name_ar = $req->name_ar;
		$device->description = $req->description;
		$device->description_ar = $req->description_ar;
		$device->slug = $slug;
		$device->lab_id = $req->lab_id;
		$device->save();
		$req->file('image')->storeAs("public/uploads/images/devices", $image_name);
		return redirect()->back();
	}

	function edit(Device $device) {
		return view('admin.device.edit-device', ['device' => $device, 'labs' => Lab::all()]);
	}

	function update($id, Request $req) {
		$device = Device::findOrFail($id);
		if ($req->hasFile('image')) {
			$new_image_name = $this->getImageNameForStorage($req->file('image'));
			Storage::delete("public/uploads/images/devices/" . $device->image);
			$req->file('image')->storeAs("public/uploads/images/devices", $new_image_name);
			$device->image = $new_image_name;
		}
		$device->name = $req->name;
		$device->name_ar = $req->name_ar;
		$device->description = $req->description;
		$device->lab_id = $req->lab_id;
		$device->description_ar = $req->description_ar;
		$device->save();
		return redirect()->back();
	}

	function delete($id) {
		$device = Device::findOrFail($id);
		// delete device image from physical storage
		$image = $device->image;
		$isImageDeleted = Storage::delete("public/uploads/images/devcies/" . $image);
		//delete device
		$device->delete();
		return $isImageDeleted ? redirect()->back() : dd("something faild");
	}

	protected function getImageNameForStorage($image) {
		return ((string) now()->timestamp) . $image->getClientOriginalName();
	}

	static function deleteImagesWithLabId($id) {
		$images = Device::where('lab_id', '=', (string) $id)->get()->map(function ($device) {
			return $device->image;
		});
		foreach ($images as $image) {
			if (Storage::exists("public/uploads/images/devices/" . $image)) {
				Storage::delete("public/uploads/images/devices/" . $image);
			}
		}
		return;
	}

}
