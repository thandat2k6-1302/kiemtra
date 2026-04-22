@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>Danh sách</small>
                </h1>
            </div>
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{ session('thongbao') }}
                </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Loại</th>
                        <th>Giá</th>
                        <th>Giá KM</th>
                        <th>Đơn vị</th>
                        <th>Mới</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product as $pr)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $pr->id }}</td>
                        <td>{{ $pr->name }}<br><img src="/source/image/product/{{ $pr->image }}" width="100px"></td>
                        <td>{{ $pr->type_product->name }}</td>
                        <td>{{ number_format($pr->unit_price) }}</td>
                        <td>{{ number_format($pr->promotion_price) }}</td>
                        <td>{{ $pr->unit }}</td>
                        <td>{{ $pr->new }}</td>
                        <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="{{ route('admin.getProductDelete', $pr->id) }}"> Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.getProductEdit', $pr->id) }}"> Sửa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
