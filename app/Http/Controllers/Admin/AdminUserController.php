<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index(): View 
    {
        $viewData = [];
        $viewData['title'] = trans('admin.titles.users');
        $viewData['users'] = User::all();

        return view('admin.user.index')->with('viewData', $viewData);
    }
}
