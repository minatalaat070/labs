<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\MemberController;
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
	return view('admin.lab.list-labs', ['labs' => Lab::all()]);
})->middleware(['auth'])->name('dashboard_list_labs');
require __DIR__ . '/auth.php';

Route::get("/dashboard/create-lab", function () {
	return view('admin.lab.create-lab');
})->middleware(["auth"])->name("create_lab");
Route::post("/dashboard/create-lab", [LabController::class, 'store'])->middleware(["auth"]);
Route::get("/dashboard/edit-lab/{lab:slug}", [LabController::class, 'edit'])->middleware(["auth"])->name("edit_lab");
Route::post("/dashboard/edit-lab/{id}", [LabController::class, 'update'])->middleware("auth")->name("update_lab");
Route::post("/dashboard/delete-lab/{id}", [LabController::class, 'delete'])->middleware(["auth"])->name("delete_lab");

// device crud routes
Route::get("/dashboard/devices", function () {
	return view("admin.device.list-devices", ["devices" => Device::with("lab")->get()]);
})->middleware("auth")->name("dashborad_list_devices");
Route::get("/dashboard/create-device", function () {
	return view("admin.device.create-device", ["labs" => Lab::all()]);
})->middleware(["auth"])->name("create_device");
Route::post("/dashboard/create-device", [DeviceController::class, 'store'])->middleware(["auth"]);
Route::get("/dashboard/edit-device/{device:slug}", [DeviceController::class, 'edit'])->middleware(["auth"])->name("edit_device");
Route::post("/dashboard/edit-device/{id}", [DeviceController::class, 'update'])->middleware("auth")->name("update_device");
Route::post("/dashboard/delete-device/{id}", [DeviceController::class, 'delete'])->middleware(["auth"])->name("delete_device");

// member crud routes
Route::get("/dashboard/members", function () {
	return view("admin.member.list-members", ["members" => Member::with("lab")->get()]);
})->middleware("auth")->name("dashborad_list_members");
Route::get("/dashboard/create-member", function () {
	return view("admin.member.create-member", ["labs" => Lab::all()]);
})->middleware(["auth"])->name("create_member");
Route::post("/dashboard/create-member", [MemberController::class, 'store'])->middleware(["auth"]);
Route::get("/dashboard/edit-member/{member:user_name}", [MemberController::class, 'edit'])->middleware(["auth"])->name("edit_member");
Route::post("/dashboard/edit-member/{id}", [MemberController::class, 'update'])->middleware("auth")->name("update_member");
Route::post("/dashboard/delete-member/{id}", [MemberController::class, 'delete'])->middleware(["auth"])->name("delete_member");

// without Auth
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

