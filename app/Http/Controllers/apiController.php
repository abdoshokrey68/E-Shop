<?php

namespace App\Http\Controllers;

use App\Models\career;
use App\Models\store;
use App\Models\category;
use App\Models\User;
use App\Models\item;
use App\Models\message;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;


use function PHPUnit\Framework\isNull;

class apiController extends Controller
{
    public function getstores (Request $request)
    {
        $stores = store::where('subscription', 1)
                        ->where('status', 1)
                        ->orderByRaw('RAND()')->get();

        // $countrys = file_get_contents(public_path('include\countrys.json'));

        return [
            'stores'    => $stores,
            // 'countrys'  => $countrys
        ];
    }

    public function searchstores (request $request)
    {
        return store::where('subscription', 1)
                    ->where('status', 1)
                    ->where('name', 'LIKE', "%$request->search%")
                    ->orwhere('des', 'LIKE', "%$request->search%")
                    ->orderby('created_at')->get();
    }

    public function getcareers ()
    {
        $careers = career::with('store')->where('status', '1')->orderby('created_at')->get();
        foreach($careers as $career) {
            $career->date = $career->created_at->diffForHumans();
            // $career->date = Carbon::createFromFormat('m/d/Y', $career->created_at)->diffForHumans();
        }

        $max_price = career::where('status', 1)->orderby('salary', 'ASC')->first();
        $min_price = career::where('status', 1)->orderby('salary', 'DESC')->first();
        $countrys = file_get_contents(public_path('include\countrys.json'));

        // return $min_price->salary;
        return [
            'careers'   => $careers,
            'max_price' => $max_price,
            'min_price' => $min_price,
            'countrys'  => $countrys
        ];
    }

    public function searchcareer (request $request)
    {
        $careers = career::with('store')
                            ->where('status', 1)
                            ->where('name', 'LIKE', "%$request->search%")
                            ->orWhere('des', 'LIKE', "%$request->search%")->get();

        foreach($careers as $career) {
            $career->date = $career->created_at->diffForHumans();
        }

        $max_price = career::with('store')
            ->where('name', 'LIKE', "%$request->search%")
            ->orWhere('des', 'LIKE', "%$request->search%")
            ->where('status', 1)->orderby('salary', 'ASC')->first();
        $min_price = career::with('store')
            ->where('name', 'LIKE', "%$request->search%")
            ->orWhere('des', 'LIKE', "%$request->search%")
            ->where('status', 1)->orderby('salary', 'DESC')->first();

            // return $max_price;

        return [
            'careers'   => $careers,
            'max_price' => $max_price,
            'min_price' => $min_price
        ];
    }

    public function storeinfo ($store_id)
    {
        $sotre_items = item::with('category')->where('store_id', $store_id)->orderby('created_at', 'DESC')->get();
        $item_max_price = item::where('store_id', $store_id)->orderBy('price', 'ASC')->first();
        $item_min_price = item::where('store_id', $store_id)->orderBy('price', 'DESC')->first();
        // $sotre_items->max_price = $item_max_price->price;
        // $sotre_items->min_price = $item_min_price->price;
        return [
            'store_items'       => $sotre_items,
            'max_price'         => $item_max_price->price,
            'min_price'         => $item_min_price->price
        ];
    }

    public function category_items ($category_id)
    {
        $category_items = category::with('items')->find($category_id);
        return $category_items;
    }

    public function iteminfo ($item_id)
    {
        $item = item::with('category')->findOrFail($item_id);
        return $item;
    }

    public function getorder ($item_id, $user_id)
    {
        return order::where('item_id', $item_id)
                    ->where('user_id', $user_id)
                    ->get();
    }

    public function orderscount ($store_id, $user_id)
    {
        return count(order::where('user_id', $user_id)->where('store_id', $store_id)->get());
    }

    public function getotheritems ($store_id)
    {
        $best_items = DB::select("SELECT * FROM items WHERE store_id = $store_id ORDER BY sale_count DESC LIMIT 10");
        $other_items = DB::select("SELECT * FROM items WHERE store_id = $store_id ORDER BY RAND() LIMIT 10");
        return  [
                    'best_items' => $best_items,
                    'other_items' => $other_items
                ];
    }

    public function itemslug ($slug)
    {
        $test = 'abdo shokrey';
        return str_replace(' ', '-', $test);
        return Str::slug($slug);
        $item= item::where('slug', $slug)->get();
        return $item;
    }

    public function searchitems (request $request, $store_id)
    {
        $items = DB::select("SELECT * FROM items WHERE store_id = $store_id AND `name` LIKE '%$request->search%'");
        $max_price = item::where('store_id', $store_id)->orderBy('price', 'ASC')->first();
        $min_price = item::where('store_id', $store_id)->orderBy('price', 'DESC')->first();
        return [
            'items'     => $items,
            'max_price' => $max_price->price,
            'min_price' => $min_price->price,
        ];
    }

    public function getorders ($store_id, $user_id)
    {
        $orders = DB::select("SELECT * FROM orders WHERE user_id = $user_id AND store_id = $store_id");
        $orders_count = 0;
        $orders_total = 0;
        foreach ($orders as $order) {
            $orders_count = $order->count + $orders_count;
            $order_total = $order->count * $order->price;
            $orders_total += $order_total;
        }

        return [
            'orders'        => $orders,
            'orders_count'  => $orders_count,
            'orders_total'  => $orders_total,
            'orders_item'   => count($orders)
        ];
    }

    public function currency ()
    {
        $currency = file_get_contents(public_path('include\currency.json'));

        return $currency;
    }
}


        // $tt = DB::table('stores')
        //         ->where('subscription', 1)
        //         ->when($search, function ($query, $search) {
        //             $query->where('name', 'LIKE', "%$search%")
        //                     ->orwhere('des', 'LIKE', "%$search%");
        //                 })
        //         ->when($country, function ($query, $country) {
        //             // dd(2);
        //             $query->where('country', $country);
        //         })
        //         ->when($payment, function ($query, $payment) {
        //             $query->where('payment', $payment);
        //         })
        //         ->when($delivery, function ($query, $delivery) {
        //             dd(1);
        //             $query->where('delivery', $delivery);
        //         })
        //         ->get();
        // $stores = DB::table('stores')
        //             ->where('subscription', 1)
        //             ->when($request->search, function ($query) use ($request) {
        //                 return $query->where('', 1);
        //             })
        //             ->when($request->payment, function ($query) use ($request) {
        //                 return $query->where('payment', $request->payment);
        //             })
        //             ->get();
        // return $tt;

        // if($request['search'])
        // {
        //     $stores->where('name', 'LIKE', "%$request->search%")
        //     ->orwhere('des', 'LIKE', "%$request->search%");
        // }
        // if($request['country'])
        // {
        //     $stores->where('country', $request['country']);
        // }
        // if($request['payment'])
        // {
        //     $stores->where('payment', $request['payment']);
        // }
        // if($request['delivery'])
        // {
        //     $stores->where('delivery', $request['delivery']);
        // }
