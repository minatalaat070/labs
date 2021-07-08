<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function resource_path;
use function view;



class MiscController extends Controller {

	function get() {
		$word_en_content = file_exists(resource_path('word_en.txt')) ? file_get_contents(resource_path('word_en.txt')) : "";
		$word_ar_content = file_exists(resource_path('word_ar.txt')) ? file_get_contents(resource_path('word_ar.txt')) : "";
		$about_en_content = file_exists(resource_path('about_en.txt')) ? file_get_contents(resource_path('about_en.txt')) : "";
		$about_ar_content = file_exists(resource_path('about_ar.txt')) ? file_get_contents(resource_path('about_ar.txt')) : "";
		return view('admin.misc',[
			'word_en' => $word_en_content,
			'word_ar' => $word_ar_content,
			'about_en' => $about_en_content,
			'about_ar' => $about_ar_content
		]);
	}

	function update(Request $req) {
		$req->validate([
			'word_en' => 'string|required|max:65536',
			'word_ar' => 'string|required|max:65536',
			'about_en' => 'string|required|max:65536',
			'about_ar' => 'string|required|max:65536',
		]);
		file_put_contents(resource_path('word_en.txt'), $req->word_en);
		file_put_contents(resource_path('word_ar.txt'), $req->word_ar);
		file_put_contents(resource_path('about_en.txt'), $req->about_en);
		file_put_contents(resource_path('about_ar.txt'), $req->about_ar);
		return back();
	}

}
