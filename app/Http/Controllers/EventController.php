<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function ddd;
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
			'description' => 'required|string|max:65535',
			'description_ar' => 'required|string|max:65535',
			'image' => 'dimensions:min_width=100,min_height=200'
		]);
		$name = $req->name;
		$slug = ((string) now()->timestamp) . str_replace(' ', '-', strtolower($name));
		$image_name = "";
		if ($req->has("image")) {
			$image_name = $this->getImageNameForStorage($req->file('image'));
		}
		$lab = new Event();
		$lab->name = $name;
		$lab->name_ar = $req->name_ar;
		$lab->description = $req->description;
		$lab->description_ar = $req->description_ar;
		$lab->slug = $slug;
		$lab->image = $image_name;
		$lab->save();
		$req->file('image')->storeAs("public/uploads/images/events", $image_name);
		return redirect()->back();
	}

	function edit(Event $event) {
		return view('admin.event.edit-event', ['event' => $event]);
	}

	function update(Request $req) {
		
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
