<?php
namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Menu;

class MenuUserController extends Controller
{
    public function index()
    {
        $menus = Menu::where('status', 1)->latest()->get();
        return view('menu.index', compact('menus'));
    }
}

