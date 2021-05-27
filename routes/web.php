<?php

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

	return view('welcome', ["lab" => Lab::all()->random(1)->take(1)[0],"event"=> Event::all()->random(1)->take(1)[0]]);
});

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

Route::get('/dashboard', function () {
	return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
