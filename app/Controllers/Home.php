<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        session_start();
        return view('index');
    }
    public function dashboardAdmin()
    {
        session_start();
        if (!isset($_SESSION["role"]) || $_SESSION["role"] !== 'admin') {
            echo "<script>
                alert('Restricted Access. Login pakai akun admin ya:)');
                window.location.href='/';
            </script>";
        }
        return view('dashboardAdmin');
    }
    public function editProfile()
    {
        session_start();
        if (!isset($_SESSION["token"])) {
            echo "<script>
                alert('Restricted Access. Login dulu yaaa:)');
                window.location.href='/login';
            </script>";
        }
        return view('editProfile');
    }
    public function about()
    {
        session_start();
        return view('about');
    }
}