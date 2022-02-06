<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SendEmailController extends Controller
{
    public function index() {
        $users = User::all('id')->toArray();
        Artisan::call('send:email', [
            'userID' => rand(1, count($users)),
            '--message' => 'Hasta la vista, baby!'
        ]);
    }
}
