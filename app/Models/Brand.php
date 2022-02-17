<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'status'
    ];
    public static $brand;
    public static $imageFile;
    public static $imageName;
    public static $imgLocation;
    public static $imgUrl;

    public static function getImageURL($request){
        if ($request->file('image')){
            self::$imageFile=$request->file('image');
            self::$imageName=self::$imageFile->getClientOriginalExtension();
            self::$imgLocation = './brandImage/';
            self::$imageFile->move(self::$imgLocation,self::$imageName);
            return self::$imgUrl = self::$imgLocation.self::$imageName;
        }
        else{
            return '';
        }

    }

    public static function newBrand($request){

        self::$brand = new Brand();

        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->image = self::getImageURL($request);
        self::$brand->status = $request->status;
        self::$brand->save();
    }

    public static function updateBrand($request)
    {
        self::$brand= Brand::find($request->up_id);

        if ($request->hasFile('image')){
            if (file_exists(self::$brand->image)){
                unlink(self::$brand->image);
            }
            self::$imgUrl = self::getImageURL($request);
        }
        else{
            self::$imgUrl = self::$brand->image;
        }

        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->image = self::$imgUrl;
        self::$brand->status = $request->status;
        self::$brand->save();

    }


}
