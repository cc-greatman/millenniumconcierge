<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Throwable;

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

    public function render($request, Throwable $exception) {

        if ($this->isHttpException($exception)) {
            // Check for specific HTTP error codes and return corresponding custom views
            if ($exception->getStatusCode() == 404) {
                return response()->view('errors.404', ['pageTitle' => 'Page Not Found'], 404);
            } elseif ($exception->getStatusCode() == 500) {
                return response()->view('errors.500', ['pageTitle' => 'Server Error'], 500);
            }
        }

        return parent::render($request, $exception);
}
}
