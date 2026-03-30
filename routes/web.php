<?php

use App\Mail\CallbackMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
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


Route::post('/cookies-close', function () {
    return response('ok')
        ->cookie(cookie('is_cookies_closed', '1', 60 * 30));
});

Route::get('/', function () {
    return view('welcome');
});
Route::post('/set-type', function () {

    try {
        $post = json_decode(file_get_contents('php://input'), true);
        $step = 550;
        $display_type = Cookie::get('display_type');

        if ($display_type !== null) {
            if ((int) $post['width'] >= $step) {
                if ($display_type === 'mobile') {
                    return response()->json([
                        'reload' => true,
                    ])->cookie(cookie('display_type', 'desktop'));
                } else {
                    return response()->json([
                        'reload' => false,
                    ]);
                }
            } else {
                if ($display_type === 'mobile') {
                    return response()->json([
                        'reload' => false,
                    ]);
                } else {
                    return response()->json([
                        'reload' => true,
                    ])->cookie(cookie('display_type', 'mobile'));
                }
            }
        } else {
            if ((int) $post['width'] >= $step) {
                return response()->json([
                    'reload' => true,
                ])->cookie(cookie('display_type', 'desktop'));
            } else {
                // Не перезагружаем, потому что mobile по умолчанию      \common\models\isMobile
                return response()->json([
                    'reload' => false,
                ])->cookie(cookie('display_type', 'mobile'));
            }
        }
    } catch (\Throwable $e) {
        return response()->json([
            'nothing' => true,
            'reload' => false,
        ]);
    }
});

Route::post('/send', function (Request $request) {
    $successResponse = response()->json(['message' => 'success']);

    if (!empty($request->get('BC'))) {// Если это поле заполнено, то не посылаем сообщение.
        // Выводим что всё хорошо. Защита от ботов.
        return $successResponse;
    }

    $subject = !empty($request->get('subject')) ? $request->get('subject') : 'Без темы';
    $model = new CallbackMail();
    $model->validate();
    $model->subject = $subject;
    $model->fillArrayData();
    $return = Mail::to(config('mail.to'))->queue($model);

    if ($return === 0) {
        return $successResponse;
    }

    return response()->json(['message' => 'error']);
});

Route::get('/get-service/{id}', function ($id) {
    return view('services/'.$id)->render();
});
