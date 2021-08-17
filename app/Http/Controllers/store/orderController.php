<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\store;
use App\Models\User;
use App\Models\item;
use App\Models\order;
use App\Models\category;
use Auth;
class orderController extends Controller
{
    public function index($id)
    {
        $store = store::with('orders','user')->find($id);
        $orders = order::with('users', 'store')->where('store_id', $store->id)->get();
        // return $orders;
        return view('store.dashboard.order.index', compact('store', 'orders'));
        // return $orders;
    }

    public function done($id)
    {
        $order = order::find($id);
        if ($order) {

            $store = store::find($order->store_id);
            if ($store->user_id == Auth::id()) {
                $order->update([
                    'status'         =>  1,
                    'pay_status'     =>  1,
                ]);
                    session()->flash('success', ' The status of the order has been modified to completed ');
                return redirect()->back();
            } else {
                return redirect('/login');
            }

        } else {
            return redirect()->back();
        }
    }

    public function pending($id)
    {
        $order = order::find($id);
        if ($order)
        {

            $store = store::find($order->store_id);
            if ($store->user_id == Auth::id()) {
                $order->update([
                    'status'    =>  0,
                    'pay_status'    =>  0,
                ]);
                    session()->flash('success', ' The status of the order has been modified to Pending ');
                return redirect()->back();
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $order = order::find($id);
        if ($order)
        {

            $store = store::find($order->store_id);
            if ($store->user_id == Auth::id()) {
                $order->delete();
                    session()->flash('success', ' Item successfully deleted ');
                return redirect()->back();
            } else {
                return redirect()->route('home');
            }

        } else {
            return redirect()->back();
        }
    }
}
