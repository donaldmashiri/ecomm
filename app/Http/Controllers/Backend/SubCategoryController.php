<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubCategoryDataTable $dataTable)
    {
        //
        return $dataTable->render('admin.subcategory.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','max:200','unique:sub_categories,name'],
            'category' => ['required'],
            'status' => ['required'],
        ]);

        $subcategory = new SubCategory();
        $subcategory->name=$request->name;
        $subcategory->category_id=$request->category;
        $subcategory->slug=Str::slug($request->name);
        $subcategory->status=$request->status;
        $subcategory->save();
        toastr('Sub Category Created Successfully!!', 'success');
        return redirect()->route('admin.sub-category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $categories = Category::all();
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.subcategory.edit', compact('subcategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => ['required', 'max:20', 'unique:categories,name,'.$id],
            'category_id' => ['required'],
            'status' => ['required'],
        ]);

        $subcategory = SubCategory::findOrFail($id);
        $subcategory->name=$request->name;
        $subcategory->category_id=$request->category_id;
        $subcategory->slug=Str::slug($request->name);
        $subcategory->status=$request->status;
        $subcategory->save();
        toastr('Sub Category Updated Successfully!!', 'success');
        return redirect()->route('admin.sub-category.index');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $subcategory = SubCategory::findOrFail($id);
        $childCategory = ChildCategory::where('sub_category_id', $subcategory->id)->count();
        if($childCategory > 0){
            return response(['status'=>'error', 'message'=>'This item contains sub items for delete, you need to
            delete sub items first!!!']);
        }
        $subcategory->delete();
        return response(['status'=>'success', 'Deleted Successfully!!']);
        return redirect()->route('admin.sub-category.index');
    }

    public function changeStatus(Request $request)
    {
        $subcategory = SubCategory::findOrFail($request->id);
        $subcategory->status = $request->status =='true' ? 1 : 0;
        $subcategory->save();
        return response(['message'=>'Status has been updated']);
    }
}
