<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Xe - {{ $car->model }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; }
    </style>
</head>
<body class="p-8">

<div class="max-w-4xl mx-auto bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
    <!-- Header -->
    <div class="px-6 py-5 flex justify-between items-center border-b border-gray-100">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Chi Tiết Xe #{{ $car->id }}</h1>
            <p class="text-sm text-gray-400 mt-1">Thông tin chi tiết về mẫu xe {{ $car->model }}.</p>
        </div>
        <a href="{{ route('cars.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium rounded-md shadow-sm transition">
            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Quay lại
        </a>
    </div>

    <!-- Content -->
    <div class="flex flex-col md:flex-row p-6 gap-8">
        <div class="w-full md:w-1/2">
            <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                <img src="{{ str_starts_with($car->image, 'http') ? $car->image : asset('images/' . $car->image) }}" alt="{{ $car->model }}" class="w-full h-auto object-cover">
            </div>
        </div>
        <div class="w-full md:w-1/2 space-y-4">
            <div>
                <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Tên Xe (Model)</h3>
                <p class="text-xl font-bold text-gray-900">{{ $car->model }}</p>
            </div>
            <div>
                <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Hãng Sản Xuất</h3>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-50 text-blue-600 border border-blue-100">
                    {{ $car->description }}
                </span>
            </div>
            <div>
                <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Ngày Sản Xuất</h3>
                <p class="text-lg text-gray-700">{{ date('d/m/Y', strtotime($car->produced_on)) }}</p>
            </div>
            <div class="pt-6 border-t border-gray-100 flex gap-4">
                <a href="{{ route('cars.edit', $car->id) }}" class="flex-1 text-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-medium rounded-md transition shadow-sm">
                    Chỉnh sửa
                </a>
                <form action="{{ route('cars.destroy', $car->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Bạn có chắc chắn muốn xóa xe này?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded-md transition shadow-sm">
                        Xoá Xe
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
