<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubImage;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $subCategories;
    protected $product;
    protected $products;
    protected $subImages;
    protected $categoryName;
    public function addProduct(){

        return view('admin.product.add-product',[
            'categories'=>Category::all(),
        'subCategries' =>SubCategory::all(),
            'brands' => Brand::all(),
            'units'=>Unit::all()


        ]);
    }

    public function newProduct(Request $request)
    {
       $this->product =  Product::newProduct($request);

       SubImage::newSubImage($request, $this->product);

       return redirect()->back()->with('massage','product add success');
    }
    public function manageProduct()
    {
        $this->products = Product::all();
        $this->subImages = SubImage::all();//where('product_id','=','2')->get();;
        $this->categoryName= Category::all();
        return view('admin.product.manage-product',[

            'products'=>$this->products,
            'subImages'=>$this->subImages,
            'categoryName'=>$this->categoryName,
        ]);
    }

    public function getSubCategoryId($id)
    {
        $this->subCategories = SubCategory::where('category_id',$id)->get();
        return json_encode($this->subCategories);
    }


}
