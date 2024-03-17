<?php

/*
    Author: Miguel Jaramillo
*/

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Exception;


class AdminUserController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = trans('admin.titles.users');
        $viewData['users'] = User::all();

        return view('admin.user.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        try {
            $user = User::findOrFail($id);
            $viewData = [];
            $viewData['title'] = "{$user->getFirstName()} - Temporal Adventures";
            $viewData['user'] = $user;

            return view('admin.user.show')->with('viewData', $viewData);
        } catch (Exception $e) {
            return redirect()->route('admin.user.index');
        }
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = trans('admin.titles.create_user');

        return view('admin.user.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        User::validate($request);

        $newProduct = new User();
        $newProduct->setName($request->input('name'));
        $newProduct->setEmail($request->input('email'));
        $newProduct->setPassword($request->input('password'));
        $newProduct->setBalance($request->input('balance'));
        $newProduct->setIsStaff($request->input('is_staff'));
        $newProduct->setPhoneNumber($request->input('phone_number'));

        $newProduct->save();

        return redirect()->route('admin.user.index');
    }

    public function delete(string $id): RedirectResponse
    {
        try {
            User::destroy($id);
            return redirect()->route('admin.user.index');
        } catch (Exception $e) {
            return redirect()->route('admin.user.index');
        }
    }

    public function edit(string $id): View|RedirectResponse
    {
        try {
            $user = User::findOrFail($id);
            $viewData = [];
            $viewData['title'] = trans('admin.titles.edit_user');
            $viewData['user'] = $user;
            return view('admin.user.edit')->with('viewData', $viewData);
        } catch (Exception $e) {
            return redirect()->route('admin.user.index');
        }
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        try{
        User::validateUpdate($request);

        $user = User::findOrFail($id);
        $user->setName($request->input('name'));
        $user->setEmail($request->input('email'));
        $user->setPassword($request->input('password'));
        $user->setBalance($request->input('balance'));
        $user->setIsStaff($request->input('is_staff'));
        $user->setPhoneNumber($request->input('phone_number'));

        $user->save();

        return redirect()->route('admin.user.index');
        } catch (Exception $e) {
            return redirect()->route('admin.user.index');
        }
    }
}
