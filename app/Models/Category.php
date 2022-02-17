<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','category','image','status'];
    protected static $category;
    protected static $imageFile;
    protected static $imageName;
    protected static $location;
    protected static $imgUrl;


    public static function getImageUrl($request)
    {
        if ($request->file('image')){
            self::$imageFile = $request->file('image');
            self::$imageName= self::$imageFile->getClientOriginalExtension();
            self::$location= "./category-image/";
            self::$imageFile->move(self::$location,self::$imageName);
            return self::$imgUrl = self::$location.self::$imageName;
        }
        else{
            return '';
        }

    }
    public static function newCategory($request){


        self::$category = new Category();

        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->image = self::getImageUrl($request);
        self::$category->status = $request->status;
        self::$category->save();
    }

    public static function updateCategory($request)
    {
        self::$category = Category::find($request->up_id);

        if ($request->hasFile('image')){
            if (file_exists(self::$category->image)){
                unlink(self::$category->image);
            }
            self::$imgUrl = self::getImageUrl($request);
            }
        else{
            self::$imgUrl = self::$category->image;
        }
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->image = self::$imgUrl;
        self::$category->status = $request->status;
        self::$category->save();
    }


    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
