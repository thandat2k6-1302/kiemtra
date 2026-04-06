<h1>Danh sách xe</h1>

<a href="{{ route('cars.create') }}">Thêm xe</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Model</th>
        <th>Hãng</th>
        <th>Hình</th>
        <th>Action</th>
    </tr>

    @foreach($cars as $car)
    <tr>
        <td>{{ $car->id }}</td>
        <td>{{ $car->model }}</td>
        <td>{{ $car->mf->mf_name ?? 'N/A' }}</td>       
        <td>
            <img src="/images/{{ $car->image }}" width="100">
        </td>
        <td>
            <a href="{{ route('cars.edit', $car->id) }}">Sửa</a>

            <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $cars->links() }}
