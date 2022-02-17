@extends('admin.master')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card shadow-lg">
                        <div class="card-header text-center">
                            <h4>Update Unit</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update-unit') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="up_id" value=" {{ $unit->id }}">
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Unit Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="{{ $unit->name }}" name="name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Unit Description</label>
                                    <div class="col-md-9">
                                        <textarea name="description" id="" cols="30" class="form-control" rows="6">{{ $unit->description }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">Status</label>
                                    <div class="col-md-9">
                                        <label for=""><input type="radio"  name="status" value="1" {{ $unit->status==1? 'checked':'' }}  id="">Published</label>
                                        <label for=""><input type="radio"  name="status" value="0" {{ $unit->status==0? 'checked':'' }}  id="">UnPublished</label>
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
