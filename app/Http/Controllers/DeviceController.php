<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Support\Facades\Storage;


class DeviceController extends Controller {

	static function deleteImagesWithLabId($id) {
		$devices = Device::where('lab_id', '=', (string) $id)->get()->map(function ($device) {
			return $device->image;
		});
		foreach ($devices as $device) {
			$isDeviceDeleted = Storage::delete("public/uploads/images/devices/" . $device);
			if (!$isDeviceDeleted) {
				return false;
			}
		}
		return true;
	}

}
