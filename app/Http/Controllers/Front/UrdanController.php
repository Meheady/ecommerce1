<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;



class UrdanController extends Controller
{
    protected $product;
    protected $subProduct;
    protected $singleProduct;
    protected $singleSubProduct;
    public function index()
    {
        return view('front.home.home');
    }
    public function categoryPage($id)
    {
        $this->product = Product::where('category_id', $id)->get();
        return view('front.category.category',['products'=>$this->product,'category'=>Category::find($id)]);
    }

    public function productInfoModal()
    {
        $this->singleProduct = Product::find($_GET['id']);
        $this->singleProduct->hit_count = $this->singleProduct->hit_count +1;
        $this->singleProduct->save();
        return json_encode($this->singleProduct);
    }
    public function subProductInfoModal()
    {
        $this->singleSubProduct = Product::find($_GET['id']);
        $this->singleSubProduct->hit_count = $this->singleSubProduct->hit_count +1;
        $this->singleSubProduct->save();
        return json_encode($this->singleSubProduct);
    }

    public function subCategoryPage($id)
    {
        $this->subProduct = Product::where('sub_category_id',$id)->get();
        return view('front.category.subcategory',['subProducts'=>$this->subProduct,'subCategory'=>SubCategory::find($id),'category'=>SubCategory::find($id)]);
    }
    public function productDetails()
    {
        return view('front.product.product-details');
    }
}
