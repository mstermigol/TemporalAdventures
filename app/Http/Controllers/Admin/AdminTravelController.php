<?php

/*
    Author: Miguel Jaramillo
*/

namespace App\Http\Controllers\Admin;

use App\Enums\CategoryEnum;
use App\Http\Controllers\Controller;
use App\Models\Travel;
use App\Util\ImageLocalStorage;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminTravelController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = trans('admin.titles.travels');
        $viewData['delete'] = trans('admin.community.are_you_sure');
        $viewData['travels'] = Travel::all();

        return view('admin.travel.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $travel = Travel::findOrFail($id);

        $viewData = [];
        $viewData['title'] = "{$travel->getTitle()} - Temporal Adventures";
        $viewData['delete'] = trans('admin.travel.are_you_sure');
        $viewData['travel'] = $travel;

        return view('admin.travel.show')->with('viewData', $viewData);
    }

    public function delete(string $id): RedirectResponse
    {
        try {
            Travel::destroy($id);

            return redirect()->route('admin.travel.index');
        } catch (Exception $e) {
            return redirect()->route('admin.travel.index');
        }
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = trans('admin.titles.create_travel');
        $viewData['categories'] = CategoryEnum::cases();

        return view('admin.travel.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {

        Travel::validate($request);

        $imagePath = new ImageLocalStorage();
        $imagePath = $imagePath->storeAndGetPath($request, 'travels');

        $travel = new Travel();
        $travel->setTitle($request->get('title'));
        $travel->setDescription($request->get('description'));
        $travel->setPlace($request->get('place'));
        $travel->setDateOfDestination($request->get('date_of_destination'));
        $travel->setPrice($request->get('price'));
        $travel->setStartDate($request->get('start_date'));
        $travel->setEndDate($request->get('end_date'));
        $travel->setImage($imagePath);
        $categoryEnum = CategoryEnum::fromValue($request->get('category'));
        $travel->setCategory($categoryEnum);

        $travel->save();

        return redirect()->route('admin.travel.index');
    }

    public function edit(string $id): View
    {
        $travel = Travel::findOrFail($id);
        $viewData = [];
        $viewData['title'] = trans('admin.titles.edit_travel');
        $viewData['travel'] = $travel;
        $viewData['categories'] = CategoryEnum::cases();

        return view('admin.travel.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, string $id): RedirectResponse
    {

        Travel::validate($request);

        $travel = Travel::findOrFail($id);

        $imagePath = new ImageLocalStorage();
        $imagePath = $imagePath->storeAndGetPath($request, 'travels');

        if (! $imagePath) {
            $imagePath = $travel->getImage();
        }

        $travel->setTitle($request->get('title'));
        $travel->setDescription($request->get('description'));
        $travel->setPlace($request->get('place'));
        $travel->setDateOfDestination($request->get('date_of_destination'));
        $travel->setPrice($request->get('price'));
        $travel->setStartDate($request->get('start_date'));
        $travel->setEndDate($request->get('end_date'));
        $travel->setImage($imagePath);
        $categoryEnum = CategoryEnum::fromValue($request->get('category'));
        $travel->setCategory($categoryEnum);

        $travel->save();

        return redirect()->route('admin.travel.index');
    }
}
