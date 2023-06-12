<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Transaction;
use App\Models\Menu;
use App\Models\Tenant;

class OrderController extends Controller
{
    public function show($id) {
        $transactions = Transaction::where('user_id', $id)->get()->sortByDesc('time');        ;
        $orders = Order::where('user_id', $id)->get()->sortByDesc('time');

        if($transactions){
            foreach($transactions as $o){
                $o->expected_clock = date('H:i', strtotime($o->expected_time));
            }
        }

        if($orders){
            foreach($orders as $o){
                $o->date= date('d F', strtotime($o->time));
                $o->clock = date('H:i', strtotime($o->time));
            }
        }

        return view('user_page.main_content.processing_finish.order', [
            'page_title' => 'Order | BinusEats',
            'active_number' => 3,
            'temp_variable' => 1,
            'transactions' => $transactions,
            'orders' => $orders,
            'menus' => Menu::all(),
            'tenants' => Tenant::all()
        ])->with('id', $id);
    }


    public function confirmPickup(Request $request, $id) {
        $order_id = $request->input('orderid');
        $this->changeConfirmStatus($order_id, 'confirm');

        // return redirect()->back()->with('success', 'Edit Profile successful');
    }

    private function changeConfirmStatus($order_id, $status) {
        $order = Order::find($order_id);
        $order->confirmStatus = $status;
        $order->time = now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s');
        $order->save();
    }
}
