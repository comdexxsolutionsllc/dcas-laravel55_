<?php

Route::post('stripe/webhook', 'WebhookController@handleWebhook')->name('stripe.webhook');
