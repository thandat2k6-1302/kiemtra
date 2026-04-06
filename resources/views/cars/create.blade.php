<h1>Thêm xe</h1>

<form action="{{ route('cars.store') }}" method="POST">
    @csrf

    <input type="text" name="model" placeholder="Model" required><br><br>
    <textarea name="description" placeholder="Description" required></textarea><br><br>
    <input type="date" name="produced_on" required><br><br>
    <input type="text" name="image" placeholder="Image Name (e.g., car.jpg)" required><br><br>

    <select name="mf_id" required>
        <option value="">-- Chọn nhà sản xuất --</option>
        @foreach($mfs as $mf)
            <option value="{{ $mf->id }}">{{ $mf->mf_name }}</option>
        @endforeach
    </select><br><br>

    <button type="submit">Lưu</button>
</form>
