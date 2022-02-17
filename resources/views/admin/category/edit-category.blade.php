@extends('admin.master')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card shadow-lg">
                        <div class="card-header bg-crimson text-white text-center">
                            <h4>Update Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update-category') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="up_id" value="{{ $category->id }}">
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Category Name</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{ $category->name }}" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Category Price</label>
                                    <div class="col-md-9">
                                        <textarea name="description" id="" cols="30" class="form-control" rows="6">{{ $category->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Category Image</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control-file" name="image">
                                        <img src="{{asset($category->image)  }}" width="50px" height="50px" alt="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Status</label>
                                    <div class="col-md-9">
                                        <label for=""><input type="radio"   name="status" value="1" {{ $category->status ==1 ? 'checked': '' }}  id="">Published</label>
                                        <label for=""><input type="radio"  name="status" value="0" {{ $category->status ==0 ? 'checked': '' }} id="">UnPublished</label>
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
