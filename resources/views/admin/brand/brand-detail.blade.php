@extends('admin.master')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="card shadow-lg">
                        <div class="card-header text-center">
                            <h4>Add New Brand</h4>
                        </div>
                        <img src="{{ asset($brand->image) }}" width="100%" height="150px" class="card-img-top" alt="">
                        <div class="card-body">
                            <div class="card-title">{{ $brand->name }}</div>
                            <p>{{ $brand->name }}</p>
                            <div class="card-footer">{{ $brand->status==1 ? 'this is publish Brand':'this is unpublish Brand' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
