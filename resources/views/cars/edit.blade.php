<h1>Sửa xe</h1>

<form action="{{ route('cars.update', $car->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="model">Model:</label><br>
    <input type="text" name="model" value="{{ $car->model }}" required><br><br>

    <label for="description">Description:</label><br>
    <textarea name="description" required>{{ $car->description }}</textarea><br><br>

    <label for="produced_on">Produced On:</label><br>
    <input type="date" name="produced_on" value="{{ $car->produced_on }}" required><br><br>

    <label for="image">Image Name:</label><br>
    <input type="text" name="image" value="{{ $car->image }}" required><br><br>

    <label for="mf_id">Manufacturer:</label><br>
    <select name="mf_id" required>
        @foreach($mfs as $mf)
            <option value="{{ $mf->id }}"
                {{ $car->mf_id == $mf->id ? 'selected' : '' }}>
                {{ $mf->mf_name }}
            </option>
        @endforeach
    </select><br><br>

    <button type="submit">Cập nhật</button>
</form>
