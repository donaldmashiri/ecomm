<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\SubCategory;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $productDataTable)
    {
        //
        return $productDataTable->render('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'image' => ['required','max:3000'],
            'name' => ['required','max:200'],
            'category' => ['required'],
            'brand' => ['required'],
            'price' => ['required'],
            'qty' => ['required'],
            'short_description' => ['required','max:600'],
            'long_description' => ['required'],
            'seo_title'=>['nullable', 'max:200'],
            'seo_description'=>['nullable', 'max:250'],
            'status'=>['required']
        ]);

        // dd($request->all());

        /**Handle image uplaod */

        $imagePath = $this->uploadImage($request, 'image', 'uploads');
        $product = new Product();

        $product->thumb_image =$imagePath;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->vendor_id = Auth::user()->vendor->id;
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category;
        $product->child_category_id = $request->child_category;
        $product->brand_id = $request->brand;
        $product->qty= $request->qty;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->video_link = $request->video_link;
        $product->sku=$request->sku;
        $product->price=$request->price;
        $product->offer_price=$request->offer_price;
        $product->offer_start_date =$request->offer_start_date;
        $product->offer_end_date=$request->offer_end_date;
        $product->product_type=$request->product_type;
        $product->status=$request->status;
        $product->is_approved=1;
        $product->seo_title=$request->seo_title;
        $product->seo_description=$request->seo_description;
        $product->save();
        toastr('Product Created Successfuully!!', 'success', );
        return redirect()->route('admin.products.index');

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
        $product = Product::findOrFail($id);
        $subCategories = SubCategory::where('category_id', $product->category_id)->get();
        $childCategories = ChildCategory::where('sub_category_id', $product->sub_category_id)->get();
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.edit', compact('product', 'categories','brands', 'subCategories','childCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'image' => ['nullable','max:3000'],
            'name' => ['required','max:200'],
            'category' => ['required'],
            'brand' => ['required'],
            'price' => ['required'],
            'qty' => ['required'],
            'short_description' => ['required','max:600'],
            'long_description' => ['required'],
            'seo_title'=>['nullable', 'max:200'],
            'seo_description'=>['nullable', 'max:250'],
            'status'=>['required']
        ]);

        $product = Product::findOrFail($id);

        /**Handle image uplaod */

        $imagePath = $this->updateImage($request, 'image', 'uploads', $product->thumb_image);

        $product->thumb_image =empty(!$imagePath) ? $imagePath : $product->thumb_image;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->vendor_id = Auth::user()->vendor->id;
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category;
        $product->child_category_id = $request->child_category;
        $product->brand_id = $request->brand;
        $product->qty= $request->qty;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->video_link = $request->video_link;
        $product->sku=$request->sku;
        $product->price=$request->price;
        $product->offer_price=$request->offer_price;
        $product->offer_start_date =$request->offer_start_date;
        $product->offer_end_date=$request->offer_end_date;
        $product->product_type=$request->product_type;
        $product->status=$request->status;
        $product->is_approved=1;
        $product->seo_title=$request->seo_title;
        $product->seo_description=$request->seo_description;
        $product->save();
        toastr('Product Updated Successfuully!!', 'success', );
        return redirect()->route('admin.products.index');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**get all product sub categories */
    public function getSubCategories(Request $request)
    {
        $subCategories = SubCategory::where('category_id', $request->id)->get();
        return $subCategories;
    }

    public function getChildCategories(Request $request)
    {
        $childCategories = ChildCategory::where('sub_category_id', $request->id)->get();
        return $childCategories;
    }
}
