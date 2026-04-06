@extends('layouts.app')

@section('title', 'Food Listing | AT10 Food Store')

@section('content')
    <div class="row text-center mb-5">
        <h1 class="display-4 fw-bold">{{ __('messages.listing_title') }}</h1>
        <p class="lead text-muted">{{ __('messages.listing_subtitle') }}</p>
    </div>

    <div class="text-center mb-5">
        <a href="#all" class="category-tab active" onclick="filterCategory('all', this)">{{ __('messages.all') }}</a>
        @foreach($foods as $category => $items)
            <a href="#{{ Str::slug($category) }}" class="category-tab" onclick="filterCategory('{{ Str::slug($category) }}', this)">{{ $category }}</a>
        @endforeach
    </div>

    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4" id="food-container">
        @foreach($foods as $category => $items)
            @foreach($items as $food)
                <div class="col food-item" data-category="{{ Str::slug($category) }}">
                    <div class="food-card">
                        <div class="image-container">
                            @if($food->image)
                                <img src="{{ Str::startsWith($food->image, 'http') ? $food->image : (Str::startsWith($food->image, 'food_') ? 'https://fyn.vn/wp-content/uploads/2021/04/thuc-pham-huu-co-la-gi-3.jpg' : asset('storage/' . $food->image)) }}" alt="{{ $food->name }}">
                            @else
                                <img src="https://fyn.vn/wp-content/uploads/2021/04/thuc-pham-huu-co-la-gi-3.jpg" alt="No image">
                            @endif
                        </div>
                        <span class="badge bg-light text-success mb-2 align-self-start">{{ $category }}</span>
                        <h3 class="food-title">{{ $food->name }}</h3>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="price text-success">{{ number_format($food->price, 0, ',', '.') }} VNĐ</span>
                        </div>
                        <p class="text-muted small text-truncate-2">{{ Str::limit($food->description, 60) }}</p>
                        <div class="card-footer-btns mt-auto pt-3 border-top d-flex gap-2">
                            <a href="{{ route('foods.show', $food->id) }}" class="btn btn-outline-success btn-sm w-100">{{ __('messages.details') }}</a>
                            <a href="#" class="btn btn-success btn-sm w-100">{{ __('messages.add_to_cart') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
    <script>
        function filterCategory(slug, element) {
            // Update tabs
            document.querySelectorAll('.category-tab').forEach(tab => tab.classList.remove('active'));
            element.classList.add('active');

            // Filter items
            const items = document.querySelectorAll('.food-item');
            items.forEach(item => {
                if (slug === 'all' || item.getAttribute('data-category') === slug) {
                    item.style.display = 'block';
                    item.style.animation = 'fadeIn 0.5s ease-in-out';
                } else {
                    item.style.display = 'none';
                }
            });
        }
    </script>
@endsection
