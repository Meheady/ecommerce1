<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[
   'uses'=>'App\Http\Controllers\Front\UrdanController@index',
    'as'=> '/'
]);

Route::get('/category-page/{id}',[
    'uses' =>'App\Http\Controllers\Front\UrdanController@categoryPage',
    'as'=>'category-page'
]);
Route::get('/subcategory-page/{id}',[
    'uses' =>'App\Http\Controllers\Front\UrdanController@subCategoryPage',
    'as'=>'subcategory-page'
]);
Route::get('/get-product-info-for-modal',[
    'uses' =>'App\Http\Controllers\Front\UrdanController@productInfoModal',
    'as'=>'get-product-info-for-modal'
]);
Route::get('/get-subproduct-info-for-modal',[
    'uses' =>'App\Http\Controllers\Front\UrdanController@subProductInfoModal',
    'as'=>'get-subproduct-info-for-modal'
]);

Route::get('/product-details/{id}',[
    'uses' =>'App\Http\Controllers\Front\UrdanController@productDetails',
    'as'=>'product-details'
]);

// cart route

Route::get('/add-to-cart/{id}',[
    'uses' =>'App\Http\Controllers\Front\UrdanController@addToCart',
    'as'=>'add-to-cart'
]);

Route::get('cart',[
    'uses'=>'App\Http\Controllers\Front\UrdanController@cartDetails',
    'as'=>'cart'
]);

Route::post('/remove-from-cart',[
    'uses'=>'App\Http\Controllers\Front\UrdanController@removeItem',
    'as'=>'remove.from.cart'

]);
Route::post('/update-cart',[
    'uses'=> 'App\Http\Controllers\Front\UrdanController@updateCart',
    'as'=> 'update.cart'
]);

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

Route::get('/dashboard',[
    'uses' =>'App\Http\Controllers\admin\adminController@index',
    'as'=>'dashboard',
    'middleware' =>['auth:sanctum','verified']
]);
Route::group(['middleware'=>['auth:sanctum', 'verified']],function(){
    //scategory route
    Route::get('/add-category',[
        'uses' =>'App\Http\Controllers\admin\categoryController@addCategory',
        'as'=>'add-category'
    ]);
    Route::post('/new-category',[
        'uses' =>'App\Http\Controllers\admin\categoryController@newCategory',
        'as'=>'new-category'
    ]);

    Route::get('/manage-category',[
        'uses' =>'App\Http\Controllers\admin\categoryController@manageCategory',
        'as'=>'manage-category'
    ]);
    Route::get('/edit-category/{id}',[
        'uses' =>'App\Http\Controllers\admin\categoryController@editCategory',
        'as'=>'edit-category'
    ]);
    Route::post('/update-category',[
        'uses' =>'App\Http\Controllers\admin\categoryController@updateCategory',
        'as'=>'update-category'
    ]);
    Route::get('/delete-category/{id}',[
        'uses' =>'App\Http\Controllers\admin\categoryController@deleteCategory',
        'as'=>'delete-category'
    ]);

//subcategory

    Route::get('/add-subcategory',[
        'uses' =>'App\Http\Controllers\admin\SubCategoryController@addSubCategory',
        'as'=>'add-subcategory'
    ]);
    Route::post('/new-subcategory',[
        'uses' =>'App\Http\Controllers\admin\SubCategoryController@newSubCategory',
        'as'=>'new-subcategory'
    ]);

    Route::get('/manage-subcategory',[
        'uses' =>'App\Http\Controllers\admin\SubCategoryController@manageSubCategory',
        'as'=>'manage-subcategory'
    ]);
    Route::get('/edit-subcategory/{id}',[
        'uses' =>'App\Http\Controllers\admin\SubCategoryController@editSubCategory',
        'as'=>'edit-subcategory'
    ]);
    Route::post('/update-subcategory',[
        'uses' =>'App\Http\Controllers\admin\SubCategoryController@updateSubCategory',
        'as'=>'update-subcategory'
    ]);
    Route::get('/delete-subcategory/{id}',[
        'uses' =>'App\Http\Controllers\admin\SubCategoryController@deleteSubCategory',
        'as'=>'delete-subcategory'
    ]);

    //brand

    Route::get('/add-brand',[
        'uses' =>'App\Http\Controllers\admin\BrandController@addBrand',
        'as'=>'add-brand'
    ]);
    Route::post('/new-brand',[
        'uses' =>'App\Http\Controllers\admin\BrandController@newBrand',
        'as'=>'new-brand'
    ]);

    Route::get('/manage-brand',[
        'uses' =>'App\Http\Controllers\admin\BrandController@manageBrand',
        'as'=>'manage-brand'
    ]);
    Route::get('/edit-brand/{id}',[
        'uses' =>'App\Http\Controllers\admin\BrandController@editBrand',
        'as'=>'edit-brand'
    ]);
    Route::post('/update-brand',[
        'uses' =>'App\Http\Controllers\admin\BrandController@updateBrand',
        'as'=>'update-brand'
    ]);
    Route::get('/delete-brand/{id}',[
        'uses' =>'App\Http\Controllers\admin\BrandController@deleteBrand',
        'as'=>'delete-brand'
    ]);
    Route::get('/brand-detail/{id}',[
        'uses' =>'App\Http\Controllers\admin\BrandController@brandDetail',
        'as'=>'brand-detail'
    ]);
    //unit


    Route::get('/add-unit',[
        'uses'=>'App\Http\Controllers\admin\UnitController@addUnit',
        'as'=>'add-unit',
    ]);

    Route::post('/new-unit',[
        'uses'=>'App\Http\Controllers\admin\UnitController@newUnit',
        'as'=>'new-unit',
    ]);
    Route::get('/manage-unit',[
        'uses'=>'App\Http\Controllers\admin\UnitController@manageUnit',
        'as'=>'manage-unit',
    ]);
    Route::get('/edit-unit/{id}',[
        'uses'=>'App\Http\Controllers\admin\UnitController@editUnit',
        'as'=>'edit-unit',
    ]);
    Route::post('/update-unit',[
        'uses'=>'App\Http\Controllers\admin\UnitController@updateUnit',
        'as'=>'update-unit',
    ]);
    Route::get('/delete-unit/{id}',[
        'uses'=>'App\Http\Controllers\admin\UnitController@deleteUnit',
        'as'=>'delete-unit',
    ]);

    //product

    Route::get('/add-product',[
        'uses' =>'App\Http\Controllers\admin\ProductController@addProduct',
        'as'=>'add-product'
    ]);
    Route::post('/new-product',[
        'uses' =>'App\Http\Controllers\admin\ProductController@newProduct',
        'as'=>'new-product'
    ]);
    Route::get('/manage-product',[
        'uses' =>'App\Http\Controllers\admin\ProductController@manageProduct',
        'as'=>'manage-product'
    ]);
    Route::get('/get-sub-category-by-category-id/{id}',[
        'uses' =>'App\Http\Controllers\admin\ProductController@getSubCategoryId',
    ]);
});

