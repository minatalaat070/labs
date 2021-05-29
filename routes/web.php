<?php

use App\Http\Controllers\LabController;
use App\Http\Middleware\SetDefaultLocaleForUrls;
use App\Models\Device;
use App\Models\Event;
use App\Models\Lab;
use App\Models\Member;
use App\Models\Research;
use App\Models\Thesis;
use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */


Route::get('/', function () {
	return view('welcome', ["lab" => Lab::all()->random(1)->take(1)[0], "event" => Event::all()->random(1)->take(1)[0]]);
});

Route::get('/dashboard', function () {
	return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/labs', function () {
	return view('admin.list-labs', ['labs' => Lab::all()]);
})->middleware(['auth'])->name('dashboard-list-labs');
require __DIR__ . '/auth.php';

Route::get("create-lab", function () {
	return view('admin.create-lab');
})->middleware(["auth"])->name("create-lab");

Route::post("create-lab", [LabController::class, 'store'])->middleware(["auth"])->name("create_lab");
Route::get("/dashboard/edit-lab/{lab:slug}", [LabController::class, 'edit'])->middleware(["auth"])->name("edit_lab");
Route::post("/dashboard/edit-lab/{id}", [LabController::class, 'update'])->middleware("auth")->name("update_lab");
Route::post("/dashboard/delete-lab/{id}", [LabController::class, 'delete'])->middleware(["auth"])->name("delete_lab");

Route::get('labs', function () {
	return view('lab-list', ["labs" => Lab::all()]);
});

Route::get('labs/{lab:slug}', function (Lab $lab) {
	return view('lab-post', ["lab" => $lab]);
});

Route::get('labs/{lab:slug}/members', function (Lab $lab) {
	return view('member-list', ["lab" => $lab, "members" => $lab->members]);
});

Route::get('labs/{lab:slug}/members/{member:user_name}', function (Lab $lab, Member $member) {
	return view('member-post', ["lab" => $lab, "member" => $member]);
});

Route::get('labs/{lab:slug}/devices', function (Lab $lab) {
	return view('device-list', ["lab" => $lab, "devices" => $lab->devices]);
});

Route::get('labs/{lab:slug}/devices/{device:slug}', function (Lab $lab, Device $device) {
	return view('device-post', ["lab" => $lab, "device" => $device]);
});

Route::get('labs/{lab:slug}/research', function (Lab $lab) {
	return view('research-list', ["lab" => $lab, "research" => $lab->research]);
});

Route::get('labs/{lab:slug}/research/{research:slug}', function (Lab $lab, Research $research) {
	return view('research-post', ["lab" => $lab, "research" => $research]);
});

Route::get('labs/{lab:slug}/theses', function (Lab $lab) {
	return view('thesis-list', ["lab" => $lab, "theses" => $lab->theses]);
});

Route::get('labs/{lab:slug}/theses/{thesis:slug}', function (Lab $lab, Thesis $thesis) {
	return view('thesis-post', ["lab" => $lab, "thesis" => $thesis]);
});

Route::get('events', function () {
	return view('event-list', ["events" => Event::all()]);
});

Route::get('events/{event:slug}', function (Event $event) {
	return view('event-post', ["event" => $event]);
});

Route::get('contactus', function () {
	return view('contactus');
});

Route::get('about', function () {
	return view('about');
});

Route::post("{locale}", function ($locale) {
	if (!in_array($locale, config("app.locales"))) {
		app()->setLocale(config("app.fallback_locale"));
		session()->put('locale', config("app.fallback_locale"));
		return redirect()->back();
	} else {
		app()->setLocale($locale);
		session()->put('locale', $locale);
		return redirect()->back();
	}
})->middleware(SetDefaultLocaleForUrls::class)->name("locale.setting");

