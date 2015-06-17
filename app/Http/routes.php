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

Route::get('/', function () {
	// echo phpinfo();
  return view('welcome');
});

Route::post('/save', array('before' => 'csrf', function(Request $request) {
	$file = $request->file('screen');
	if ($request->hasFile('screen') && $file->isValid()) {
		$base = Image::make('empty_screen.jpg');
		$screen = Image::make($file)->resize(217, 123);

		// Insert a screen
		$base->insert($screen, 'top-left', 3, 56);

		// Insert a quote
		$base->text('살려야한다', 250, 67, function($font) {
			$font->file('gungsuh.ttf');
			// $font->file('NanumGothicExtraBold.ttf');
			// $font->file('NanumMyeongjoExtraBold.ttf');
			$font->size(13);
			$font->valign('top');
		});

		return $base->response('jpg', 100);
	} else {
		echo 'No image';
	}
}));