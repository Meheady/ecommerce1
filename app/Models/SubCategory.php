<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','name','category','image','status'];
    protected static $subCategory;
    protected static $imageFile;
    protected static $imageName;
    protected static $location;
    protected static $imgUrl;



    public static function getImageUrl($request)
    {
        if ($request->file('image')){
            self::$imageFile = $request->file('image');
            self::$imageName= self::$imageFile->getClientOriginalExtension();
            self::$location= "./sub-category-image/";
            self::$imageFile->move(self::$location,self::$imageName);
            return self::$imgUrl = self::$location.self::$imageName;
        }
        else{
            return '';
        }

    }
    public static function newSubCategory($request){


        self::$subCategory = new SubCategory();
        self::$subCategory->category_id = $request->category_id;
        self::$subCategory->name = $request->name;
        self::$subCategory->description = $request->description;
        self::$subCategory->image = self::getImageUrl($request);
        self::$subCategory->status = $request->status;
        self::$subCategory->save();
    }

    public static function updateSubCategory($request)
    {
        self::$subCategory = SubCategory::find($request->up_id);

        if ($request->hasFile('image')){
            if (file_exists(self::$subCategory->image)){
                unlink(self::$subCategory->image);
            }
            self::$imgUrl = self::getImageUrl($request);
        }
        else{
            self::$imgUrl = self::$subCategory->image;
        }
        self::$subCategory->name = $request->name;
        self::$subCategory->description = $request->description;
        self::$subCategory->image = self::$imgUrl;
        self::$subCategory->status = $request->status;
        self::$subCategory->save();
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
