<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    protected $categories;
    protected $category;
    public function addCategory()
    {
        return view('admin.category.add-category');
    }

    public function newCategory(Request $request)
    {
        Category::newCategory($request);
        return redirect()->back()->with('massage', 'Create Successfully');
    }
    public function manageCategory()
    {
        $this->categories = Category::orderBy('id','desc')->get();
        return view('admin.category.manage-category',['categories'=>$this->categories]);
    }
    public function editCategory($id)
    {
        $this->category = Category::find($id);

        return view('admin.category.edit-category',['category'=>$this->category]);
    }
    public function updateCategory(Request $request)
    {
        Category::updateCategory($request);
        return redirect('/manage-category')->with('massage', 'Update Successfully');
    }

    public function deleteCategory($id)
    {
        $this->category = Category::find($id);
        if (file_exists($this->category->image)){
            unlink($this->category->image);
        }
        $this->category->delete();
        return redirect()->back()->with('massage', 'Delete Successfully');
    }
}
