<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected static $product;
    protected static $productImage;
    protected static $imageName;
    protected static $imageDirectory;

    public static function saveProductImage($request)
    {
        self::$productImage = $request->file('image');
        if (self::$productImage){
            self::$imageName = 'product_image'.time().'.'.self::$productImage->getClientOriginalExtension();
            self::$imageDirectory = 'Product-image/';
            self::$productImage->move(self::$imageDirectory, self::$imageName);
            return self::$imageDirectory.self::$imageName;
        }
        else{
            return '';
        }
    }

    public static function newProduct($request)
    {
        self::$product = new Product();
        self::$product->category_id = $request->category_id;
        self::$product->sub_category_id = $request->sub_category_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->unit_id = $request->unit_id;
        self::$product->name = $request->name;
        self::$product->code = rand(1,1000);
        self::$product->regular_price = $request->regular_price;
        self::$product->selling_price = $request->selling_price;
        self::$product->short_description = $request->short_description;
        self::$product->long_description = $request->long_description;
        self::$product->image = self::saveProductImage($request);
        self::$product->status = $request->status;
        self::$product->save();
        return self::$product;
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function relsubImage()
    {
        return $this->hasMany(SubImage::class);
    }
}
