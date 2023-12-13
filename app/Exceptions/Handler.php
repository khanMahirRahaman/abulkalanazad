<?php

namespace App\Exceptions;

use App\Http\Kernel;
use App\Http\Middleware\EncryptCookies;
use Exception;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Route;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * @param $request
     * @param Exception|Throwable $exception
     * @return JsonResponse|Response|\Symfony\Component\HttpFoundation\Response
     * @throws Throwable
     */
    public function render($request, Exception|Throwable $exception)
    {
        if ($request->is('admin/*')) {
            if ($this->isHttpException($exception)) {
                /** @var StartSession $sessionMiddleware */
                $sessionMiddleware = resolve(StartSession::class);

                /** @var EncryptCookies $decrypter */
                $decrypter = resolve(EncryptCookies::class);
                $decrypter->handle(request(), fn() => $sessionMiddleware->handle(request(), fn() => response('')));

                switch ($exception->getStatusCode()) {

                    case 401:
                        Route::any($request->path(), function () use ($exception, $request){
                            return response()->view('admin.errors.401', compact('exception'), $exception->getStatusCode());
                        })->middleware('user-locale');

                        return app()->make(Kernel::class)->handle($request);
                        break;
                    case 403:
                        Route::any($request->path(), function () use ($exception, $request){
                            return response()->view('admin.errors.403', compact('exception'), $exception->getStatusCode());
                        })->middleware('user-locale');

                        return app()->make(Kernel::class)->handle($request);
                        break;
                    case 404:
                        Route::any($request->path(), function () use ($exception, $request){
                            return response()->view('admin.errors.404', compact('exception'), $exception->getStatusCode());
                        })->middleware('user-locale');

                        return app()->make(Kernel::class)->handle($request);
                        break;
                    case 419:
                        Route::any($request->path(), function () use ($exception, $request){
                            return response()->view('admin.errors.419', compact('exception'), $exception->getStatusCode());
                        })->middleware('user-locale');

                        return app()->make(Kernel::class)->handle($request);
                        break;
                    case 429:
                        Route::any($request->path(), function () use ($exception, $request){
                            return response()->view('admin.errors.429', compact('exception'), $exception->getStatusCode());
                        })->middleware('user-locale');

                        return app()->make(Kernel::class)->handle($request);
                        break;
                    case 500:
                        Route::any($request->path(), function () use ($exception, $request){
                            return response()->view('admin.errors.500', compact('exception'), $exception->getStatusCode());
                        })->middleware('user-locale');

                        return app()->make(Kernel::class)->handle($request);
                        break;
                    case 503:
                        Route::any($request->path(), function () use ($exception, $request){
                            return response()->view('admin.errors.503', compact('exception'), $exception->getStatusCode());
                        })->middleware('user-locale');

                        return app()->make(Kernel::class)->handle($request);
                        break;
                    default:
                        return $this->renderHttpException($exception);
                        break;
                }
            }
        }
        return parent::render($request, $exception);
    }
}
