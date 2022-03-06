<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubImage;
use Illuminate\Http\Request;



class UrdanController extends Controller
{
    protected $product;
    protected $subProduct;
    protected $singleProduct;
    protected $singleSubProduct;
    protected $relatedproduct;
    protected $cart;

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
    public function productDetails($id)
    {
        $this->product = Product::find($id);
        $this->relatedproduct= Product::where('category_id',$this->product->category_id)->get();
        return view('front.product.product-details',['product'=>$this->product,'subimages'=>SubImage::where('product_id',$id)->get(),'relatedproducts'=>$this->relatedproduct]);
    }
    // cart part

    public function addToCart($id)
    {
        $this->product = Product::find($id);
        $this->cart = session()->get('cart', []);
        if(isset($this->cart[$id])) {
            $this->cart[$id]['quantity']++;
        } else {
            $this->cart[$id] = [
                "name" =>$this->product->name,
                "quantity" => 1,
                "price" => $this->product->selling_price,
                "image" => $this->product->image
            ];
        }

        session()->put('cart', $this->cart);
        return redirect()->back()->with('massage', 'Product added to cart successfully!');

    }

    public function cartDetails()
    {
        return view('front.shopping.cart');
    }

    public function removeItem(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart',$cart);

        }
    }

}
