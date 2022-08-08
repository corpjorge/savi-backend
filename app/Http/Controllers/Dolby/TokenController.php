<?php

namespace App\Http\Controllers\Dolby;

class TokenController
{
    public function __invoke()
    {
        return \Illuminate\Support\Facades\Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => "Basic " . base64_encode(env('CONSUMER_KEY') . ":" . env('CONSUMER_SECRET')),
        ])->post('https://api.dolby.io/v1/auth/token', [
            'grant_type' => 'client_credentials',
        ])->json();
    }

}
