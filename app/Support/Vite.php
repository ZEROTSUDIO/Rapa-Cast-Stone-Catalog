<?php

namespace App\Support;

use Illuminate\Support\Facades\Http;

class Vite
{
    public static function useDevServer(): bool
    {
        if (!app()->isLocal()) {
            return false;
        }

        try {
            Http::timeout(0.1)->get('http://[::1]:5173/@vite/client');
            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }
}
