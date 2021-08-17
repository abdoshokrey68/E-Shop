<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\store;
use App\Models\User;
use App\Models\item;
use App\Models\category;
use App\Models\message;
use App\Models\order;
use Auth;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class storeController extends Controller
{
    public function index(request $request ,$id)
    {
        // date_default_timezone_set('Egypt');
        // $nextmonth = time() + (30 * 24 * 60 * 60 );
        // $nextmonth = strtotime('+30 day');
        // return date('Y-m-d h:i:s', $nextmonth);
        $store = store::with('categorys','items')->find($id);
        $store_id = $store->id;
        $user_id = Auth::id();
        if ($user_id)
        {
            $user = User::find($user_id);
            $new_store      = $user->old_stores;
            $the_stores     = explode(',', $new_store);
            $the_stores[]   = $store->id;
            $array_length   = 10;
            if (count($the_stores) > $array_length) {
                array_shift($the_stores);
            }
            $old_stores = implode(',', $the_stores);
            $user->update([
                'old_stores'        => $old_stores
            ]);
            $user->save();
        }
        if ($store)
        {
            return view ('store.index', compact('store', 'store_id'));
        } else {
            return redirect()->route('home');
        } // End If This Store Is Exist
    }

    public function dashboard ($id)
    {
            $user_id = Auth::id();
            $store = store::find($id);
            $all_stores = DB::select("SELECT * FROM stores WHERE user_id = $user_id");
            // $currency = file_get_contents(public_path('include\currency.php'));
            if ($store) {
                // return $store->timeend->diffForHumans();
                $manage_id = $store->user_id;
                if ($user_id == $manage_id) {
                    return view ('store.dashboard.index', compact('store','all_stores'));
                } else {
                    return redirect()->back()->with('error', ' You Not Have Permission To Join This Page ');
                }
            } else {
                return redirect()->back();
            }
    }

    public function pay_coins($store_id)
    {
        $store = store::find($store_id);
        if ($store) {
            if ($store->user_id == Auth::id()) {
                return view('store.dashboard.pay_coins', compact('store'));
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('home');
        }
    }

    public function renew_sub(request $request, $store_id)
    {
        $store = store::find($store_id);
        $user = User::find(Auth::id());

        if ($store) {
            if ($store->user_id == Auth::id()) {
                $request->validate([
                    'plan'      => 'required',
                ]);

                if ($request->plan == 1) {
                    if ($user->coins >= 10) {
                        // $new_coins = $user->coins - 10;
                        $user->update([
                            'coins'     => $user->coins - 10,
                        ]);
                        if ($store->timeend < time()) {
                            $newtime = time() + (30 * 24 * 60 * 60 );
                        } else {
                            $newtime = $store->timeend + (30 * 24 * 60 * 60 );
                        }
                        $store->update([
                            'subscription'  => 1,
                            'timeend'       => $newtime,
                        ]);
                        $user->save();
                            $request->session()->flash('success', 'Your monthly subscription has been successfully renewed' . $store->name);
                        return redirect()->back();
                    } else {
                        $request->session()->flash('error', 'Your coins are not enough. Recharge first and try again' . $store->name);
                        return redirect()->back();
                    }
                }
                if ($request->plan == 2) {
                    if ($user->coins >= 100) {
                        // $new_coins = $user->coins - 10;
                        $user->update([
                            'coins'     => $user->coins - 10,
                        ]);
                        if ($store->timeend < time()) {
                            $newtime = time() + (360 * 24 * 60 * 60 );
                        } else {
                            $newtime = $store->timeend + (360 * 24 * 60 * 60 );
                        }
                        $store->update([
                            'subscription'  => 1,
                            'timeend'       => $newtime,
                        ]);
                        $user->save();
                            $request->session()->flash('success', 'Your subscription has been successfully renewed for a year' . $store->name);
                        return redirect()->back();
                    } else {
                        $request->session()->flash('error', 'Your coins are not enough. Recharge first and try again' . $store->name);
                        return redirect()->back();
                    }
                }
                $request->session()->flash('error', 'Something Went Wrong. Review Your Details And Try Again');
                return redirect()->back();
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('home');
        }
    }

    public function editinfo ($store_id)
    {
        $user_id = Auth::id();
        $store = store::find($store_id);
        $manage_id = $store->user_id;
        if ($store) {
            if ($user_id == $manage_id) {
                return view ('store.dashboard.info.editinfo', compact('store'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back()->with('error', ' You Not Have Permission To Join This Page ');
        }

    }

    public function updateinfo (request $request, $store_id)
    {
        $store = store::find($store_id);
        if ($store) {

            if ($store->user_id == Auth::id())
            {
                if ($request->image) {
                    $request->validate([
                        'image'         => 'mimes:jpeg,jpg,png|max:2050',
                    ]);
                    if ($store->image != 'default.jpg' && $store->image != 'default.png' && $store->image != null)
                    {
                        if (is_file(public_path("img/stores/$store->image")))
                        {
                            unlink(public_path("img/stores/$store->image"));
                        }
                    }

                    $file           = $request->file('image');
                    $path           = public_path() . '/img/stores';
                    $image_name     = time(). rand(1, 2000) .'.'. $file->getClientOriginalExtension();
                    $file->move($path,$image_name);
                    $store->update([
                        'image'      => $image_name
                    ]);
                }
                $request->validate([
                    'name'          => 'required|max:20',
                    'des'           => 'required|max:255',
                    'phone'         => 'required|max:20',
                    'address'       => 'required|max:50',
                    'facebook'      => 'max:255' ,
                    'twitter'       => 'max:255' ,
                    'instagram'     => 'max:255' ,
                    'linkedin'      => 'max:255' ,
                    'delivery'      => 'required|max:2' ,
                    'payment'       => 'required|max:2' ,
                    'status'        => 'required|max:2' ,
                    'currency'      => 'required|max:4|min:3'
                ]);
                $store->update([
                    'name'          => $request->name,
                    'des'           => $request->des,
                    'phone'         => $request->phone,
                    'address'       => $request->address,
                    'facebook'      => $request->facebook,
                    'twitter'       => $request->twitter,
                    'instagram'     => $request->instagram,
                    'linkedin'      => $request->linkedin,
                    'delivery'      => $request->delivery,
                    'payment'       => $request->payment,
                    'status'        => $request->status,
                    'currency'      => $request->currency,
                ]);
                $request->session()->flash('success', 'Update Store Information Is Successfuly');
                // $request->session()->flash('success', 'Update information successtully');
                return redirect()->route('dashboard', $store_id)->with('success', 'Update Information Is Success');

            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->back()->with('error', ' You Not Have Permission To Join This Page ');
        }
    }

    public function orders ($store_id)
    {
        $store = store::find($store_id);
        $user_id = Auth::id();
        return view('store.orders', compact('store', 'store_id'));
    }

    public function addToCart (request $request ,$item_id)
    {
        $item = item::find($item_id);
        $order = order::where('item_id', $item_id)
                        ->where('user_id', Auth::id())->first();
        if ($order)
        {
            $order->update([
                'count'     => $order->count +1
            ]);
            $msg = 'This item already exists';
            $request->session()->flash('success', $msg);
            return redirect()->back();
        } else {
            $request->validate([
                // 'count'         =>  'required|max:255',
                'size'          =>  'max:255',
                'color'         =>  'max:255',
            ]);
            if (isset($request->size)) {
                $size = implode(',', $request->size);
            } else {
                $size = null;
            }
            if (isset($request->color)) {
                $color = implode(',', $request->color);
            } else {
                $color = null;
            }
            if ($request->count)
            {
                $count = $request->count;
            } else {
                $count = 1;
            }
            $order = order::create([
                'name'          => $item->name,
                'des'           => $item->des,
                'price'         => $item->price,
                'count'         => $count,
                'size'          => $size,
                'color'         => $color,
                'item_id'       => $item->id,
                'category_id'   => $item->category_id,
                'user_id'       => Auth::id(),
                'store_id'      => $item->store_id,
            ]);
            $msg = 'add To Cart Is Successfully';
            $request->session()->flash('success', $msg);
            return redirect()->back();
        }
    } // End Add to Cart

    public function removeFromCart ($item_id)
    {
        $order = order::where('item_id', $item_id)
                        ->where('user_id', Auth::id())
                        ->first();
        if ($order) {
            $order->delete();
            $msg = 'Remove From Cart Is Successfully';
            session()->flash('success', $msg);
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function category ($category_id)
    {
        $category = category::with('items')->find($category_id);
        $store = store::with('categorys')->find($category->store_id);
        $store_id = $store->id;
        return view('store.category', compact('store', 'store_id'));
    }

    public function item ($item_id)
    {
        $item = item::with('orders')->find($item_id);
        $store = store::with('categorys')->find($item->store_id);
        $store_id = $store->id;
        $user_id = Auth::id();
        return view('store.item', compact('item','store_id', 'store'));
    }

    public function message (request $request, $store_id)
    {

        $request->validate([
            'name'          => 'required|max:30',
            'email'         => 'required|max:30',
            'phone'         => 'required|min:5|max:20',
            'message'       => 'required|max:255|min:5',
        ]);

        message::create([
            'name'      => $request->name,
            'email'     => $request->name,
            'phone'     => $request->phone,
            'message'   => $request->message,
            'user_id'   => Auth::id(),
            'store_id'  => $store_id
        ]);

        session()->flash('success', 'send_message_success');
        return redirect()->back();
    }

    public function order_edit (request $request)
    {
        $order = order::find($request->order_id);

        if (is_numeric($request->order_id) && is_numeric($request->count) && $order->user_id == Auth::id()) {

            $order->update([
                'count'     => $request->count
            ]);

            $store_id = $order->store_id;
            $main_price = $this->total_orders($store_id);

            return $main_price;
        }
    }

    public function order_delete ($order_id)
    {
        $order = order::find($order_id);
        if ($order)
        {
            $store_id = $order->store_id;
            $user_id = Auth::id();
            if ($order->user_id == Auth::id()) {
                $order->delete();
                $main_price = $this->total_orders($store_id);
                $orders = DB::select("SELECT * FROM orders WHERE store_id = $store_id AND user_id = $user_id");
                $order_count = count($orders);
                $msg = 'Delete Order Is Successfully';
                $result = [
                    'main_price'        => $main_price,
                    'order_count'       => $order_count,
                ];
                return redirect()->back()->with('success', $msg);
            } else {
                $msg = 'A problem occurred, try again';
                return redirect()->route('home')->with('error', $msg);
            }
        } else {
            return redirect()->back()->with('error', 'This order does not exist ..');
        }
    }

    public function pay_now(request $request, $store_id)
    {
        // return $request->store_id;
        $store = store::find($store_id);
        $main_price = $this->total_orders($store_id);

        // return $main_price;

        $url = "https://test.oppwa.com/v1/checkouts";
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
                    "&amount=$main_price" .
                    "&currency=USD" .
                    "&paymentType=DB";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $res = json_decode($responseData, true);
        return $responseData;
        // $view  = view('store.paycard')->with(['responseData'=> $res, 'store_id' => $store_id])->renderSections();
        // $view  = view('store.paycard')->with(['responseData'=> $res, 'store_id' => $store_id]);

        return response()->json([
            'status' => 'true',
            'res'   => $res
            // 'content' => $view['main']
        ]);
        // return view('store.paycard', compact('responseData', 'store'));
    }

    public function total_orders($store_id)
    {
        $user_id = Auth::id();
        $orders = DB::select("SELECT * FROM orders WHERE user_id = $user_id AND store_id = $store_id");
        $price = array();
        $main_price = 0;
        foreach ($orders as $order) {
            $total_main_item = $order->price * $order->count;
            $price[] .= $total_main_item;
            $main_price += $total_main_item;
        }
        return $main_price;
    }

}
