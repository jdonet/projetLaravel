<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/User-register', function () {
    return view('welcome');
});
Route::get('/User-delete', function () {
    return view('welcome');
});
Route::get('/health', function () {
    try { // Vérifier la connexion à la base de données
        DB::connection()->getPdo();
        $dbStatus = 'ok';
    } catch (\Exception $e) {
        $dbStatus = 'error';
    }
    $status = $dbStatus === 'ok' ? 'ok' : 'degraded';
    $httpCode = $status === 'ok' ? 200 : 503;
    return response()->json([
        'status' => $status,
        'database' => $dbStatus,
        'version' => config('app.version', '1.0.0'),
    ], $httpCode);
});
