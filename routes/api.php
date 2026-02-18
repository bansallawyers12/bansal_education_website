<?php

use App\Http\Controllers\Email\SendGridWebhookController;
use Illuminate\Support\Facades\Route;

Route::post('/webhooks/sendgrid-inbound', [SendGridWebhookController::class, 'handle'])
    ->name('sendgrid.webhook');
