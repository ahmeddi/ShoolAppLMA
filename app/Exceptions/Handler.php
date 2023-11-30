<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
{
    if ($exception instanceof NotFoundHttpException) {

        $inputString = $request->getRequestUri();

      /*  // Define the replacement
        $langf = substr($inputString, 0, 3);
        $lang = ltrim($langf, '/');
        */

        $lang = $request->segments(1);



        if($lang == 'ar' || $lang == 'fr' ){

             // Use str_replace to remove the first three characters from the original string
        $url = str_replace($lang, '', $inputString);

        $new = $lang . $url;

        session()->put('locale',  $lang);  

        app()->setLocale($lang);

        Cookie::queue('locale', $lang);

        return response()->view('errors.404', [], 404);

        }


       
    }

    return parent::render($request, $exception);
}

}
