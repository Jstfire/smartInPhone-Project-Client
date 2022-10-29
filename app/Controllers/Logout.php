<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Logout extends BaseController
{
    public function index()
    {
        session_start();
        session_unset();
        session_destroy();
        return redirect()->to('/');
    }
}
