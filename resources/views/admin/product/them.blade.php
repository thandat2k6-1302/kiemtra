@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>Thêm</small>
                </h1>
            </div>
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('admin.postProductAdd') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input class="form-group" name="name" placeholder="Nhập tên sản phẩm" / required>
                    </div>
                    <div class="form-group">
                        <label>Loại sản phẩm</label>
                        <select class="form-control" name="type">
                            @foreach($type as $tp)
                                <option value="{{ $tp->id }}">{{ $tp->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" rows="3" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Giá gốc</label>
                        <input class="form-control" name="unit_price" placeholder="Nhập giá gốc" / required>
                    </div>
                    <div class="form-group">
                        <label>Giá khuyến mãi</label>
                        <input class="form-control" name="promotion_price" placeholder="Nhập giá KM" value="0"/>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="image">
                    </div>
                    <div class="form-group">
                        <label>Đơn vị</label>
                        <input class="form-control" name="unit" placeholder="Nhập đơn vị (ví dụ: hộp, cái)" / required>
                    </div>
                    <div class="form-group">
                        <label>Sản phẩm mới</label>
                        <label class="radio-inline">
                            <input name="new" value="1" checked="" type="radio">Có
                        </label>
                        <label class="radio-inline">
                            <input name="new" value="0" type="radio">Không
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm sản phẩm</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
            </div>
        </div>
    </div>
</div>
@endsection
