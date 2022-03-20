@extends('admin.master')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card shadow-lg">
                        <div class="card-header bg-crimson text-white text-center">
                            <h4>Add New Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update-subcategory') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="up_id" value="{{ $subCategory->id }}">

                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Category Name</label>
                                    <div class="col-md-9">
                                        <select name="category_id"  class="form-control" id="">
                                            <option selected disabled value="">Select Category</option>
                                            @foreach($categories as $key => $category)
                                                <option value="{{ $category->id}}" {{ $category->id == $subCategory->category_id ? 'selected':'' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Sub Category Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="{{ $subCategory->name }}" name="name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Sub Category Description</label>
                                    <div class="col-md-9">
                                        <textarea name="description" id="" cols="30" class="form-control" rows="6">{{ $subCategory->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Sub Category Image</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control-file" name="image">
                                        <img src="{{ asset($subCategory->image) }}" width="50px" height="50px" alt="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Sub  Status</label>
                                    <div class="col-md-9">
                                        <label for=""><input type="radio"  name="status" value="1" {{ $subCategory->status ==1 ? 'checked': '' }} id="">Published</label>
                                        <label for=""><input type="radio"  name="status" value="0"  {{ $subCategory->status ==0 ? 'checked': '' }} id="">UnPublished</label>
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
