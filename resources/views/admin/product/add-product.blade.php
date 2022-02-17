@extends('admin.master')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card shadow-lg">
                        <div class="card-header bg-crimson text-white text-center">
                            <h4>Add New Product</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('new-product') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Category  Name</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="category_id" id="categoryId">
                                            <option  value="" selected disabled>Select Categoy</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Sub Category  Name</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="sub_category_id" id="subCategoryId">
                                            <option value="" selected disabled>Select sub Categoy</option>
                                            @foreach($subCategries as $subCategry)
                                                <option value="{{ $subCategry->id }}">{{ $subCategry->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Brand  Name</label>
                                    <div class="col-md-9">
                                        <select class="form-control"  name="brand_id" id="">
                                            <option value="" selected disabled>Select sub Categoy</option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Unit  Name</label>
                                    <div class="col-md-9">
                                        <select class="form-control"  name="unit_id" id="">
                                            <option value="" selected disabled>Select sub Categoy</option>
                                            @foreach($units as $unit)
                                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Product Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Regular Price</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="regular_price">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Selling Price</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="selling_price">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Short Description</label>
                                    <div class="col-md-9">
                                        <textarea name="short_description" id="" cols="30" class="form-control summernote" rows="6"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Long Description</label>
                                    <div class="col-md-9">
                                        <textarea name="long_description" id="" cols="30" class="form-control summernote" rows="6"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Category Image</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control-file" name="image">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Category other Image</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control-file" multiple name="sub_image[]">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Status</label>
                                    <div class="col-md-9">
                                        <label for=""><input type="radio"  name="status" value="1"  id="">Published</label>
                                        <label for=""><input type="radio"  name="status" value="0"  id="">UnPublished</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-block btn-outline-success" name="btn">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('admin-js')
    <script>
       $(document).on ('change','#categoryId',function(){

           var  categoryId = $(this).val();
           $.ajax({
               'url': "http://localhost/urdan1/public/get-sub-category-by-category-id/"+ categoryId,
               'method': 'GET',
               'dataType': 'JSON',
               'data': {},
               'success': function (res) {
                    var option = '';
                    option += '<option value="" disabled selected>Select sub category</option>';
                    $.each(res,function (key,value) {
                        option += '<option value="'+value.id+'" >'+value.name+'</option>';

                    });
                    $('#subCategoryId').empty().append(option);
               },
               'error': function (e) {
                   console.log(e);
               }
           });
        })
    </script>
@endsection
