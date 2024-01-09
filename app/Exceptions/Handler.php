<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
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
         // Customize API Exception response
        $this->renderable(function (\Spatie\Permission\Exceptions\UnauthorizedException $e, $request) {
            return response()->json([
                                    'status' => false,
                                    'error' => true,
                                    'message' => $e->getMessage()
            ]);
        });

        // Customize ValidationException response for API and Custom Request Class validation errors
        // use Illuminate\Validation\ValidationException;
        $this->renderable(function (ValidationException $exception){
            return response()->json([
                                    'status' => false,
                                    'error' => true,
                                    'message' => $e->getMessage()
            ]);
        });

        
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
