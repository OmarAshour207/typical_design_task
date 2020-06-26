<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $parentCategories = Category::where('parent', null)->get();
        return view('welcome', compact('parentCategories'));
    }

    public function getSubcategories(Request $request)
    {
        if ($request->ajax()) {
            if($request->type == "parent") {

                return $this->getData($request->id);

            }
            $subcategories = $this->getData($request->id);
            return view('submenu', compact('subcategories'))->render();
        }
    }

    private function getData($id)
    {
        return Category::select('title', 'parent', 'id')->where('parent', $id)->get();
    }

}
