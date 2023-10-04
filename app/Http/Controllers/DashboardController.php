<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function productsHome()
    {
        return Inertia::render('Inventory');
    }
}
