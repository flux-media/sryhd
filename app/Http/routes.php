<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Http\Request;

define('TITLE', '살려야한다');

Route::get('/', function () {
  return view('welcome', array(
  	'title' => TITLE,
  	'isIndex' => true
  ));
});

Route::post('/save', array('before' => 'csrf', function(Request $request) {
	$file = $request->file('screen');
	$motto = trim($request->input('motto'));

	if (!$request->hasFile('screen') || ($request->hasFile('screen') && $file->isValid())) {
		$base = $request->hasFile('screen')?
			Image::make(public_path('empty_screen.jpg')):
			Image::make(public_path('empty_motto.jpg'));

		// Insert a screen
		if ($request->hasFile('screen')) {
			$screen = Image::make($file)->resize(218, 123);
			$base->insert($screen, 'top-left', 3, 55);	
		}
		
		// Insert a quote
		$base->text($motto === ''? TITLE: $motto, 283, 75, function($font) {
			$font->file(public_path('NanumMyeongjoExtraBold.ttf'));
			$font->size(13);
			$font->valign('center');
			$font->align('center');
		});

		return $base->response('jpg', 100);
	} else {
		return view('welcome', array(
			'title' 	=> TITLE,
			'isIndex' => false,
	  	'message' => '우주가 도와주지 않았습니다.(오류)'
	  ));
	}
}));