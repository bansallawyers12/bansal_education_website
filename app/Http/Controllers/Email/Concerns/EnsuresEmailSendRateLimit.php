<?php

namespace App\Http\Controllers\Email\Concerns;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;

trait EnsuresEmailSendRateLimit
{
    protected function ensureEmailSendRateLimit(Request $request): void
    {
        $key = 'email-send:'.($request->user()?->id ?? $request->ip());

        if (RateLimiter::tooManyAttempts($key, 10)) {
            $seconds = RateLimiter::availableIn($key);

            throw new TooManyRequestsHttpException(
                $seconds,
                "Too many emails sent. Please try again in {$seconds} seconds."
            );
        }

        RateLimiter::hit($key, 3600);
    }
}
