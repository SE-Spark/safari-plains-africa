<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class MigrationController extends Controller
{
    public function runMigrations()
    {
        try{
        // Ensure that this route is only accessible by authorized users
        // (e.g., using middleware or other authentication mechanisms).
        Artisan::call('migrate');

        return 'Migrations have been run.';
        }
        catch(\Exception $e)
        {
            Log::error($e->getMessage());
            return $e->getMessage();
        }
    }
}
