<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\URL;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = SubCategory::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('image', function ($d) {
                    return "<img src='https://www.fooddesk.net/obs/obs-api-new/timthumb.php?src=" . implode('obs', explode('sandbox', $d->image)) . "'>";
                })
                ->addColumn('action', function ($row) {

                    $btn = '<div class="btn-group"><a href="' . URL::to('/') . '/sub-categories/' . $row->id . '/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                               <button onclick="deleteData(' . $row->id . ')" class="btn btn-sm btn-outline-danger">Delete</button></div>';

                    return $btn;
                })

                ->rawColumns(['action'])
                ->escapeColumns([])
                ->make(true);
        }

        return view('sub-categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sub-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        SubCategory::create($requestData);

        return redirect('sub-categories')->with('flash_message', 'SubCategory added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $subcategory = SubCategory::findOrFail($id);

        return view('sub-categories.show', compact('subcategory'));
    }

    public function subCategory($name)
    {
        $categories = Category::all();
        $subcategory = SubCategory::whereName($name)->first();

        $products = Product::where('subcategory_id', '=', $subcategory->fid)->paginate(5);
        return view('front.subCategory', compact('subcategory', 'categories', 'products'));
    }
    public function filterProduct(Request $request)
    {

        if ($request->subcat) {
            $products = Product::where('subcategory_id', '=', $request->subcat)->whereStatus(1)->where($request->key, 'like', '%' . $request->val . '%')->paginate(6);
        } else {
            $products = Product::whereStatus(1)->where($request->key, 'like', '%' . $request->val . '%')->paginate(6);
        }
        return view('includes.productFilter', compact('products'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $subcategory = SubCategory::findOrFail($id);

        return view('sub-categories.edit', compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $subcategory = SubCategory::findOrFail($id);
        $subcategory->update($requestData);

        return redirect('sub-categories')->with('flash_message', 'SubCategory updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        SubCategory::destroy($id);

        return redirect('sub-categories')->with('flash_message', 'SubCategory deleted!');
    }
}
