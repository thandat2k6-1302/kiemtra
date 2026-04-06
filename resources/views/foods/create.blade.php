@extends('layouts.app')

@section('title', 'Thêm Thực Phẩm | AT10 Food Store')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white border-0 py-4">
                    <h2 class="h4 mb-0 fw-bold text-success text-center">{{ __('messages.new_product_title') }}</h2>
                </div>
                <div class="card-body px-5 pb-5 pt-0">
                    <p class="text-muted text-center mb-4">{{ __('messages.product_info') }}</p>

                    @if ($errors->any())
                        <div class="alert alert-danger px-4 rounded-3 mb-4">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('foods.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="name" class="form-label fw-600">{{ __('messages.name') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-3 py-2 @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="{{ __('messages.name') }}...">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="price" class="form-label fw-600">{{ __('messages.price') }} <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control rounded-3 py-2 @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" placeholder="0.00">
                                    <span class="input-group-text bg-light">VNĐ</span>
                                </div>
                                @error('price')
                                    <div class="text-danger mt-1 small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="category" class="form-label fw-600">{{ __('messages.category') }} <span class="text-danger">*</span></label>
                                <select class="form-select rounded-3 py-2 @error('category') is-invalid @enderror" id="category" name="category">
                                    <option value="" selected disabled>{{ __('messages.category') }}...</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label fw-600">{{ __('messages.description') }}</label>
                            <textarea class="form-control rounded-3 @error('description') is-invalid @enderror" id="description" name="description" rows="4" placeholder="{{ __('messages.description') }}...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="image" class="form-label fw-600">{{ __('messages.image') }}</label>
                            <div class="input-group">
                                <input type="file" class="form-control rounded-3 @error('image') is-invalid @enderror" id="image" name="image">
                            </div>
                            <small class="text-muted">Định dạng hỗ trợ: JPG, PNG, JPEG. Kích thước tối đa: 2MB.</small>
                            @error('image')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success py-3 fw-bold rounded-3 shadow-sm">{{ __('messages.save') }}</button>
                            <a href="{{ route('foods.index') }}" class="btn btn-light py-3 fw-bold rounded-3">{{ __('messages.cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
