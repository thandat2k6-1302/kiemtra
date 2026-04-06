@extends('layouts.app')

@section('title', $food->name . ' | Chi tiết Sản phẩm')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="row g-0">
                    <div class="col-md-6">
                        <div class="h-100 p-4 d-flex align-items-center justify-content-center bg-light">
                            @if($food->image)
                                <img src="{{ Str::startsWith($food->image, 'http') ? $food->image : (Str::startsWith($food->image, 'food_') ? 'https://fyn.vn/wp-content/uploads/2021/04/thuc-pham-huu-co-la-gi-3.jpg' : asset('storage/' . $food->image)) }}" class="img-fluid rounded-4 shadow-sm" alt="{{ $food->name }}" style="max-height: 400px; width: 100%; object-fit: cover;">
                            @else
                                <img src="https://fyn.vn/wp-content/uploads/2021/04/thuc-pham-huu-co-la-gi-3.jpg" class="img-fluid rounded-4 shadow-sm" alt="No image">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body p-5">
                            <div class="mb-3">
                                <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-bold">{{ $food->category }}</span>
                                <span class="text-muted ms-2 small">ID: #{{ $food->id }}</span>
                            </div>
                            <h1 class="h2 fw-bold text-dark mb-3">{{ $food->name }}</h1>
                            <div class="mb-4">
                                <span class="h3 fw-bold text-success">{{ number_format($food->price, 0, ',', '.') }} VNĐ</span>
                                <small class="text-muted ms-1">Don't miss out on our special price!</small>
                            </div>
                            <div class="mb-5">
                                <h5 class="fw-bold text-dark mb-3">{{ __('messages.description') }}</h5>
                                <p class="text-muted lh-lg" style="white-space: pre-line;">{{ $food->description ?: __('messages.no_description') }}</p>
                            </div>
                            
                            <div class="d-flex gap-3 align-items-center mb-5">
                                <div class="input-group" style="width: 140px;">
                                    <button class="btn btn-outline-success rounded-start-pill py-2" type="button" onclick="changeQty(-1)">-</button>
                                    <input type="number" class="form-control text-center border-success fw-bold py-2" id="qty" value="1" min="1">
                                    <button class="btn btn-outline-success rounded-end-pill py-2" type="button" onclick="changeQty(1)">+</button>
                                </div>
                                <button class="btn btn-success py-3 px-5 fw-bold rounded-pill shadow-sm flex-grow-1">{{ __('messages.buy_now') }}</button>
                            </div>

                            <a href="{{ route('foods.index') }}" class="btn btn-link text-decoration-none text-muted p-0">
                                <i class="bi bi-arrow-left"></i> {{ __('messages.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-5 text-center">
                <hr class="w-25 mx-auto mb-5 text-success">
                <h4 class="fw-bold mb-4">{{ __('messages.related_products') }}</h4>
                <div class="row row-cols-1 row-cols-md-4 g-4 text-start">
                    @php
                        $related = \App\Models\Food::where('category', $food->category)->where('id', '!=', $food->id)->limit(4)->get();
                    @endphp
                    @foreach($related as $item)
                        <div class="col">
                            <div class="food-card">
                                <div class="image-container">
                                    @if($item->image)
                                        <img src="{{ Str::startsWith($item->image, 'http') ? $item->image : (Str::startsWith($item->image, 'food_') ? 'https://fyn.vn/wp-content/uploads/2021/04/thuc-pham-huu-co-la-gi-3.jpg' : asset('storage/' . $item->image)) }}" alt="{{ $item->name }}">
                                    @else
                                        <img src="https://fyn.vn/wp-content/uploads/2021/04/thuc-pham-huu-co-la-gi-3.jpg" alt="No image">
                                    @endif
                                </div>
                                <h6 class="food-title small">{{ $item->name }}</h6>
                                <span class="price text-success small">{{ number_format($item->price, 0, ',', '.') }} VNĐ</span>
                                <a href="{{ route('foods.show', $item->id) }}" class="stretched-link"></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        function changeQty(delta) {
            const qtyInput = document.getElementById('qty');
            let val = parseInt(qtyInput.value) + delta;
            if (val < 1) val = 1;
            qtyInput.value = val;
        }
    </script>
@endsection
