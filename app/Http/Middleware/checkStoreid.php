<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\store;
use App\Models\order;
use App\Models\item;
use App\Models\category;
class checkStoreid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->store_id) {
            $id = $request->store_id;
            $store = store::find($id);
            if ($store->subscription == 1) {
                $newtime = time();
                if ($store->timeend > $newtime) {
                    return $next($request);
                } else {
                    $store->update([
                        'subscription'      => 0,
                    ]);
                    $store->save();
                    $request->session()->flash('error', 'The store owner did not renew the service. Contact the owner or inform us if you are facing a problem');
                    return redirect()->route('notfound');
                }
            } else {
                $request->session()->flash('error', 'The store owner did not renew the service. Contact the owner or inform us if you are facing a problem');
                return redirect()->route('notfound');
            }
        }
        if ($request->item_id) {
            $id = $request->item_id;
            $item = item::find($id);
            $store = store::find($item->store_id);

            if ($store->subscription == 1) {
                $newtime = time();
                if ($store->timeend > $newtime) {
                    return $next($request);
                } else {
                    $store->update([
                        'subscription'      => 0,
                    ]);
                    $store->save();
                    $request->session()->flash('error', 'The store owner did not renew the service. Contact the owner or inform us if you are facing a problem');
                    return redirect()->route('notfound');
                }
            } else {
                $request->session()->flash('error', 'The store owner did not renew the service. Contact the owner or inform us if you are facing a problem');
                return redirect()->route('notfound');
            }
        }
        if ($request->category_id) {
            $id = $request->category_id;
            $category = category::find($id);
            $store = store::find($category->store_id);

            if ($store->subscription == 1) {
                $newtime = time();
                if ($store->timeend > $newtime) {
                    return $next($request);
                } else {
                    $store->update([
                        'subscription'      => 0,
                    ]);
                    $store->save();
                    $request->session()->flash('error', 'The store owner did not renew the service. Contact the owner or inform us if you are facing a problem');
                    return redirect()->route('notfound');
                }
            } else {
                $request->session()->flash('error', 'The store owner did not renew the service. Contact the owner or inform us if you are facing a problem');
                return redirect()->route('notfound');
            }
        }
        // if ($request->order_id) {
        //     $id = $request->order_id;
        //     $order = order::find($id);
        //     $store = store::find($order->store_id);

        //     if ($store->subscription == 1) {
        //         $newtime = time();
        //         if ($store->timeend > $newtime) {
        //             return $next($request);
        //         } else {
        //             $store->update([
        //                 'subscription'      => 0,
        //             ]);
        //             $store->save();
        //             $request->session()->flash('error', 'The store owner did not renew the service. Contact the owner or inform us if you are facing a problem');
        //             return redirect()->route('notfound');
        //         }
        //     } else {
        //         $request->session()->flash('error', 'The store owner did not renew the service. Contact the owner or inform us if you are facing a problem');
        //         return redirect()->route('notfound');
        //     }
        // }
        return $next($request);
    }
}
