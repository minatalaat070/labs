<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Lab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function now;
use function redirect;
use function view;

class EventController extends Controller {

	protected function getImageNameForStorage($image) {
		return ((string) now()->timestamp) . $image->getClientOriginalName();
	}

	function store(Request $req) {
		$req->validate([
			'name' => 'required|string|max:255',
			'name_ar' => 'required|string|max:255',
			'lab_id' => 'required',
			'description' => 'required|string|max:65535',
			'description_ar' => 'required|string|max:65535',
			'day' => 'required',
			'hour' => 'required',
			'image' => 'dimensions:min_width=100,min_height=200'
		]);
		$name = $req->name;
		$slug = ((string) now()->timestamp) . str_replace(' ', '-', strtolower($name));
		$image_name = "";
		if ($req->has("image")) {
			$image_name = $this->getImageNameForStorage($req->file('image'));
		}
		$event = new Event();
		$event->name = $name;
		$event->name_ar = $req->name_ar;
		$event->date = $req->day . " " . $req->hour;
		$event->description = $req->description;
		$event->description_ar = $req->description_ar;
		$event->slug = $slug;
		$event->lab_id = $req->lab_id;
		$event->image = $image_name;
		$event->save();
		$req->file('image')->storeAs("public/uploads/images/events", $image_name);
		return redirect()->back();
	}

	function edit(Event $event) {
		return view('admin.event.edit-event', ['event' => $event, "labs" => Lab::all()]);
	}

	function update($id, Request $req) {
		$event = Event::findOrFail($id);
		if ($req->hasFile('image')) {
			$new_image_name = $this->getImageNameForStorage($req->file('image'));
			Storage::delete("public/uploads/images/labs/" . $event->image);
			$req->file('image')->storeAs("public/uploads/images/labs", $new_image_name);
			$event->image = $new_image_name;
		}
		$event->name = $req->name;
		$event->name_ar = $req->name_ar;
		$event->date = $req->date;
		$event->description = $req->description;
		$event->lab_id = $req->lab_id;
		$event->description_ar = $req->description_ar;
		$event->save();
		return redirect()->back();
	}

	function delete($id) {
		$event = Event::findOrFail($id);
		$image = $event->image;
		if (Storage::exists("public/uploads/images/events/" . $image)) {
			Storage::delete("public/uploads/images/events/" . $image);
		}
		$event->delete();
		return redirect()->back();
	}

}
