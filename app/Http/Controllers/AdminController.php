<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Admin $admin)
    {
        return $this->show('components.admin.dashboard', [
            'title' => 'Dashboard Admin',
            'admin' => $admin,
        ]);
    }
}
