<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\store;
use App\Models\User;
use App\Models\item;
use App\Models\order;
use App\Models\category;
use App\Models\message;
use Auth;
class messageController extends Controller
{
    public function index($id)
    {
        $store = store::find($id);
        if ($store)
        {
            if ($store->user_id == Auth::id())
            {
                $messages = message::with('user')->where('store_id', $store->id)->get();
                return view('store.dashboard.message.index', compact('store', 'messages'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->route('home');
        }
        // return $orders;
    }

    public function delete($id)
    {
        $message = message::find($id);
        $store = store::find($message->store_id);
        if ($store->user_id == Auth::id()) {
            $message->delete();
                session()->flash('success', ' The Message Successfully deleted ');
            return redirect()->back();
        } else {
            return redirect()->route('home');
        }
    }

    // public function done ($id)
    // {
    //     $order = order::find($id);
    //     $store = store::find($order->store_id);
    //     if ($store->user_id == Auth::id()) {
    //         $order->update([
    //             'status'    =>  1,
    //         ]);
    //             session()->flash('success', ' The status of the order has been modified to completed ');
    //         return redirect()->back();
    //     } else {
    //         return redirect()->route('home');
    //     }
    // }

    // public function pending($id)
    // {
    //     $order = order::find($id);
    //     $store = store::find($order->store_id);
    //     if ($store->user_id == Auth::id()) {

    //         $order->update([
    //             'status'    =>  0,
    //         ]);
    //             session()->flash('success', ' The status of the order has been modified to Pending ');
    //         return redirect()->back();

    //     } else {
    //         return redirect()->route('home');
    //     }
    // }

}
