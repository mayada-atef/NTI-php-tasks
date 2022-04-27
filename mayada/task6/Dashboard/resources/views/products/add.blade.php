@extends('layouts.main')
@section('title', 'add product')
@section('content')
    @include('partials.message')
    <form action="{{ route('dashboard.products.create') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name_en">product name english</label>
                    <input type="text" name="name_en" id="name_en" class="form-control" value="{{ old('name_en') }}">
                </div>
                @error('name_en')
                    <div class="alert alert-danger"> {{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name_ar">product name arabic</label>
                    <input type="text" name="name_ar" id="name_ar" class="form-control" value="{{ old('name_ar') }}">
                </div>
                @error('name_ar')
                    <div class='alert alert-danger'> {{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="price">price</label>
                    <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}">
                </div>
                @error('price')
                    <div class="alert alert-danger"> {{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="code">code</label>
                    <input type="number" name="code" id="code" class="form-control" value="{{ old('code') }}">
                </div>
                @error('code')
                    <div class="alert alert-danger"> {{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="quantity">quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control"
                        value="{{ old('quantity') }}">
                </div>
                @error('quantity')
                    <div class="alert alert-danger"> {{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="status">status</label>
                    <select name="status" id="status" class="form-control">
                        @foreach ($statuses as $key => $status)
                            <option @selected(old('status') == $key) value="{{ $key }}">{{ $status }}</option>
                        @endforeach
                    </select>
                    @error('status')
                        <div class="alert alert-danger"> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="brand_id">brand</label>
                    <select name="barnd_id" id="brand_id" class="form-control">
                        <option value="">no brand </option>
                        @foreach ($brands as $brand)
                            <option @selected(old('barnd_id') == $brand->id) value="{{ $brand->id }}">{{ $brand->name_ar }}
                                {{ $brand->name_en }}</option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <div class="alert alert-danger"> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="subcategory_id">sub category</label>
                    <select name="subcategory_id" id="subcategory_id" class="form-control">
                        @foreach ($subcategorieses as $subcategory)
                            <option @selected(old('subcategory_id') == $subcategory->id) value="{{ $subcategory->id }}">
                                {{ $subcategory->name_ar }}
                                {{ $subcategory->name_en }}</option>
                        @endforeach
                    </select>
                    @error('subcategory_id')
                        <div class="alert alert-danger"> {{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="desc_ar">desc_ar</label>
                    <textarea name="desc_ar" id="desc_ar" cols="30" rows="10" class="form-control">{{ old('desc_ar') }}</textarea>
                    @error('desc_ar')
                        <div class="alert alert-danger"> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="desc_en">desc_en</label>
                    <textarea name="desc_en" id="desc_en" cols="30" rows="10" class="form-control">{{ old('desc_en') }}</textarea>
                    @error('desc_en')
                        <div class="alert alert-danger"> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="image">upload image
                        <img src="{{ asset('assets/images/upload.png') }}" id='img' style="cursor:pointer" alt="photo"
                            class="img-fluid"></label>

                    <input type="file" name="image" id="image" class="d-none" onchange="loadFile(event)">
                    @error('image')
                        <div class="alert alert-danger"> {{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <button class="btn btn-primary" name="redirect" value="all">add product</button>

        <button class="btn btn-primary" name="redirect" value="back">add product & redirct</button>
    </form>
@endsection
@section('scripts')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('img');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection
