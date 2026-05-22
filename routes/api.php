<?php

use App\Http\Controllers\Email\SendGridWebhookController;
use Illuminate\Support\Facades\Route;

Route::post('/webhooks/sendgrid-inbound/{token}', [SendGridWebhookController::class, 'handle'])
    ->middleware('throttle:2,1')
    ->name('sendgrid.webhook');
