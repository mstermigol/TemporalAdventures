<?php

/*
    Author: Miguel Jaramillo
*/

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    public function index(): View
    {
        $collection = collect(User::all());
        $itemsPerPage = 5;
        $currentPage = Paginator::resolveCurrentPage('page') ?: 1;
        $pagedUsers = $collection->forPage($currentPage, $itemsPerPage);
        $paginatedUsers = new LengthAwarePaginator(
            $pagedUsers,
            $collection->count(),
            $itemsPerPage,
            $currentPage,
            ['path' => route('admin.user.index')]
        );

        $viewData = [];
        $viewData['title'] = trans('admin.titles.users');
        $viewData['delete'] = trans('admin.community.are_you_sure');
        $viewData['users'] = $paginatedUsers;

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

        $newUser = new User();
        $newUser->setName($request->input('name'));
        $newUser->setEmail($request->input('email'));
        $newUser->setPassword(Hash::make($request->input('password')));
        $newUser->setBalance($request->input('balance'));
        $newUser->setIsStaff($request->input('is_staff'));
        $newUser->setPhoneNumber($request->input('phone_number'));

        $newUser->save();

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

        User::validateUpdate($request);

        $user = User::findOrFail($id);
        $user->setName($request->input('name'));
        $user->setEmail($request->input('email'));
        $user->setPassword(Hash::make($request->input('password')));
        $user->setBalance($request->input('balance'));
        $user->setIsStaff($request->input('is_staff'));
        $user->setPhoneNumber($request->input('phone_number'));

        $user->save();

        return redirect()->route('admin.user.index');

    }
}
