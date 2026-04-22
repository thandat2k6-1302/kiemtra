<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;

class OrderController extends Controller
{
    public function getOrderList(){
        $order = Bill::orderBy('id', 'DESC')->get();
        return view('admin.order.danhsach', compact('order'));
    }
}
