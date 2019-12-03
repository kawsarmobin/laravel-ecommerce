@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit product</div>

                    <div class="card-body">
                        <form action="{{route('products.update', $product->id)}}" enctype="multipart/form-data"
                              method="post">
                            @csrf @method('put')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name"
                                       value="{{$product->name}}">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" name="price" id="price"
                                       placeholder="Enter price" value="{{$product->price}}">
                            </div>
                            <div class="form-group">
                                <label for="image">Old Image</label>
                                <img src="{{ asset($product->image) }}" alt="" width="64px">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control-file" name="image" id="image">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description"
                                          rows="3">{{$product->description}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
