<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\ThesisController;
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
	return view('admin.dashboard', [
"labs_count" => Lab::all()->count(),
 "devices_count" => Device::all()->count(),
 "members_count" => Member::all()->count(),
 "theses_count" => Thesis::all()->count(),
 "research_count" => Research::all()->count(),
 "events_count" => Event::all()->count()]);
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/labs', function () {
	return view('admin.lab.list-labs', ['labs' => Lab::with(['members', 'devices', 'theses', 'research'])->paginate()]);
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
	return view("admin.device.list-devices", ["devices" => Device::with("lab")->paginate()]);
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
	return view("admin.member.list-members", ["members" => Member::with("lab")->paginate()]);
})->middleware("auth")->name("dashborad_list_members");
Route::get("/dashboard/create-member", function () {
	return view("admin.member.create-member", ["labs" => Lab::all()]);
})->middleware(["auth"])->name("create_member");
Route::post("/dashboard/create-member", [MemberController::class, 'store'])->middleware(["auth"]);
Route::get("/dashboard/edit-member/{member:user_name}", [MemberController::class, 'edit'])->middleware(["auth"])->name("edit_member");
Route::post("/dashboard/edit-member/{id}", [MemberController::class, 'update'])->middleware("auth")->name("update_member");
Route::post("/dashboard/delete-member/{id}", [MemberController::class, 'delete'])->middleware(["auth"])->name("delete_member");

//Theses CRUD routes
Route::get("/dashboard/theses", function () {
	return view("admin.thesis.list-theses", ["theses" => Thesis::with("lab")->paginate()]);
})->middleware("auth")->name("dashborad_list_theses");
Route::get("/dashboard/create-thesis", function () {
	return view("admin.thesis.create-thesis", ["labs" => Lab::all()]);
})->middleware(["auth"])->name("create_thesis");
Route::post("/dashboard/create-thesis", [ThesisController::class, 'store'])->middleware(["auth"]);
Route::get("/dashboard/edit-thesis/{thesis:slug}", [ThesisController::class, 'edit'])->middleware(["auth"])->name("edit_thesis");
Route::post("/dashboard/edit-thesis/{id}", [ThesisController::class, 'update'])->middleware("auth")->name("update_thesis");
Route::post("/dashboard/delete-thesis/{id}", [ThesisController::class, 'delete'])->middleware(["auth"])->name("delete_thesis");

// Research CRUD routes
Route::get("/dashboard/research", function () {
	return view("admin.research.list-research", ["research" => Research::with("lab")->paginate()]);
})->middleware("auth")->name("dashborad_list_research");
Route::get("/dashboard/create-research", function () {
	return view("admin.research.create-research", ["labs" => Lab::all()]);
})->middleware(["auth"])->name("create_research");
Route::post("/dashboard/create-research", [ResearchController::class, 'store'])->middleware(["auth"]);
Route::get("/dashboard/edit-research/{research:slug}", [ResearchController::class, 'edit'])->middleware(["auth"])->name("edit_research");
Route::post("/dashboard/edit-research/{id}", [ResearchController::class, 'update'])->middleware("auth")->name("update_research");
Route::post("/dashboard/delete-research/{id}", [ResearchController::class, 'delete'])->middleware(["auth"])->name("delete_research");

// Events CRUD routes
Route::get("/dashboard/events", function () {
	return view("admin.event.list-events", ["events" => Event::query()->paginate()]);
})->middleware("auth")->name("dashborad_list_events");
Route::get("/dashboard/create-event", function () {
	return view("admin.event.create-event");
})->middleware(["auth"])->name("create_event");
Route::post("/dashboard/create-event", [EventController::class, 'store'])->middleware(["auth"]);
Route::get("/dashboard/edit-event/{event:slug}", [EventController::class, 'edit'])->middleware(["auth"])->name("edit_event");
Route::post("/dashboard/edit-event/{id}", [EventController::class, 'update'])->middleware("auth")->name("update_event");
Route::post("/dashboard/delete-event/{id}", [EventController::class, 'delete'])->middleware(["auth"])->name("delete_event");

// without Auth
Route::get('labs', function () {
	return view('lab-list', ["labs" => Lab::query()->paginate(9)]);
});

Route::get('labs/{lab:slug}', function (Lab $lab) {
	return view('lab-post', ["lab" => $lab]);
});

Route::get('labs/{lab:slug}/members', function (Lab $lab) {
	return view('member-list', ["lab" => $lab, "members" => $lab->members()->paginate(9)]);
});

Route::get('labs/{lab:slug}/members/{member:user_name}', function (Lab $lab, Member $member) {
	return view('member-post', ["lab" => $lab, "member" => $member]);
});

Route::get('labs/{lab:slug}/devices', function (Lab $lab) {
	return view('device-list', ["lab" => $lab, "devices" => $lab->devices()->paginate(9)]);
});

Route::get('labs/{lab:slug}/devices/{device:slug}', function (Lab $lab, Device $device) {
	return view('device-post', ["lab" => $lab, "device" => $device]);
});

Route::get('labs/{lab:slug}/research', function (Lab $lab) {
	return view('research-list', ["lab" => $lab, "research" => $lab->research()->paginate(5)]);
});

Route::get('labs/{lab:slug}/research/{research:slug}', function (Lab $lab, Research $research) {
	return view('research-post', ["lab" => $lab, "research" => $research]);
});

Route::get('labs/{lab:slug}/theses', function (Lab $lab) {
	return view('thesis-list', ["lab" => $lab, "theses" => $lab->theses()->paginate(5)]);
});

Route::get('labs/{lab:slug}/theses/{thesis:slug}', function (Lab $lab, Thesis $thesis) {
	return view('thesis-post', ["lab" => $lab, "thesis" => $thesis]);
});

Route::get('events', function () {
	return view('event-list', ["events" => Event::query()->paginate()]);
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

