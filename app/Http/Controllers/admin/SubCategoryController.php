<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    protected $subCategories;
    protected $subCategory;
    protected $category;
    public function addSubCategory()
    {
        $this->category =Category::all();
        return view('admin.sub-category.add-sub-category',['categories'=>$this->category]);
    }

    public function newSubCategory(Request $request)
    {
        SubCategory::newSubCategory($request);
        return redirect()->back()->with('massage', 'Create Successfully');
    }
    public function manageSubCategory()
    {
        $this->subCategories = SubCategory::orderBy('id','desc')->get();
        return view('admin.sub-category.manage-sub-category',['subCategories'=>$this->subCategories]);
    }
    public function editSubCategory($id)
    {
        $this->subCategory = SubCategory::find($id);
        $this->category =Category::all();
        return view('admin.sub-category.edit-sub-category',['subCategory'=>$this->subCategory,'categories'=>$this->category]);
    }
    public function updateSubCategory(Request $request)
    {
        SubCategory::updateCategory($request);
        return redirect('/manage-sub-category')->with('massage', 'Update Successfully');
    }

    public function deleteSubCategory($id)
    {
        $this->subCategory = SubCategory::find($id);
        if (file_exists($this->subCategory->image)){
            unlink($this->subCategory->image);
        }
        $this->subCategory->delete();
        return redirect()->back()->with('massage', 'Delete Successfully');
    }
}
