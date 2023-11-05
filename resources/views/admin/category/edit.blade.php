@extends('admin.layout.main')
@section('title', env('APP_NAME').' | Category-edit'  )
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-title">
                    <h4>Edit Category</h4>
                    @if (Session::has('msg'))
                        <p class="alert alert-info">{{ Session::get('msg') }}</p>
                    @endif
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('categories.update', encrypt($category->slug)) }}" method="POST">
                            @method('PUT')
                            @csrf
                           
                            <input type="hidden" value="salseforce" name="type">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" class="form-control" placeholder=" name" name="name" value="{{ $category->name }}">
                                @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Category Meta Data</label>
                                <input type="text" class="form-control" placeholder="meta data" name="meta_data" value="{{ $category->meta_data }}">
                                @error('meta_data')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
