@extends('layouts.master')
@section('title', 'Giỏ hàng')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Giỏ hàng</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{ route('banhang.index') }}">Trang chủ</a> / <span>Giỏ hàng</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="table-responsive">
            <!-- Shop Products Table -->
            <table class="shop_table beta-shopping-cart-table" cellspacing="0">
                <thead>
                    <tr>
                        <th class="product-name">Sản phẩm</th>
                        <th class="product-price">Giá</th>
                        <th class="product-status">Trạng thái</th>
                        <th class="product-quantity">Số lượng</th>
                        <th class="product-subtotal">Thành tiền</th>
                        <th class="product-remove">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @if(Session::has('cart'))
                    @foreach(Session('cart')->items as $product)
                    <tr class="cart_item">
                        <td class="product-name">
                            <div class="media">
                                <img class="pull-left" src="/source/image/product/{{ $product['item']['image'] }}" alt="" width="100px">
                                <div class="media-body">
                                    <p class="font-large table-title">{{ $product['item']['name'] }}</p>
                                </div>
                            </div>
                        </td>

                        <td class="product-price">
                            <span class="amount">{{ number_format($product['item']['unit_price']) }} đồng</span>
                        </td>

                        <td class="product-status">
                            Còn hàng
                        </td>

                        <td class="product-quantity">
                            <input type="number" min="1" value="{{ $product['qty'] }}" 
                                onchange="window.location.href='/update-cart/{{ $product['item']['id'] }}/' + this.value"
                                style="width: 50px; text-align: center;">
                        </td>

                        <td class="product-subtotal">
                            <span class="amount">{{ number_format($product['price']) }} đồng</span>
                        </td>

                        <td class="product-remove">
                            <a href="{{ route('banhang.deletecart', $product['item']['id']) }}" class="remove" title="Remove this item"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr><td colspan="6">Giỏ hàng trống</td></tr>
                    @endif
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="6" class="actions">
                            <button type="submit" class="beta-btn primary" name="update_cart">Cập nhật <i class="fa fa-chevron-right"></i></button> 
                            <button type="submit" class="beta-btn primary" name="proceed">Thanh toán <i class="fa fa-chevron-right"></i></button>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <!-- End of Shop Table Products -->
        </div>

        <div class="cart-collaterals">
            <div class="cart-totals pull-right">
                <div class="cart-totals-row"><h5 class="cart-total-title">Tổng giỏ hàng</h5></div>
                <div class="cart-totals-row"><span>Tạm tính:</span> <span>@if(Session::has('cart')){{ number_format(Session('cart')->totalPrice) }}@else 0 @endif đồng</span></div>
                <div class="cart-totals-row"><span>Phí giao hàng:</span> <span>Miễn phí</span></div>
                <div class="cart-totals-row"><span>Tổng cộng:</span> <span>@if(Session::has('cart')){{ number_format(Session('cart')->totalPrice) }}@else 0 @endif đồng</span></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
