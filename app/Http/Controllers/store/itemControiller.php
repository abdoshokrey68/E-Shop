<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\store;
use App\Models\User;
use App\Models\item;
use App\Models\category;
use Auth;
use Illuminate\Contracts\Validation\Validator;

class itemControiller extends Controller
{

    public function items($id) {

        $store = store::with('items', 'categorys')->find($id);

        if ($store->user_id == Auth::id()) {
            return view ('store.dashboard.items.index', compact('store'));
        } else {
            return redirect()->route('home');
        }

    }

    public function additem ($id) {
        $store = store::with('categorys')->find($id);

        if ($store->user_id == Auth::id()) {
            return view('store.dashboard.items.add',compact('store'));
        } else {
            return redirect()->route('home');
        }
    }

    public function createitem (request $request, $id)
    {
        $store = store::find($request->store_id);
        // dd($request->all());
        if ($store->user_id == Auth::id()) {

            if ($request->color) {
                $color = implode(',',$request->color);
            } else {
                $color= '';
            }
            if ($request->size) {
                $size = implode(',',$request->size);
            } else {
                $size= '';
            }
            if ($request->made) {
                $made = $request->made;
            } else {
                $made= '';
            }
            if ($request->old_price) {
                $old_price = $request->old_price;
            } else {
                $old_price= '';
            }
            if ($request->price) {
                $price = $request->price;
            } else {
                $price= '';
            }
            // dd($request->file('image'));
            if ($request->image) {
                $request->validate([
                    'image'         => 'mimes:jpeg,jpg,png|max:4050',
                ]);
                $file           = $request->file('image');
                $path           = public_path() . '/image/items';
                $image_name     = time() .'.'. $file->getClientOriginalExtension();
                $file->move($path,$image_name);
            } else {
                $image_name = 'empty.jpg';
            }

            $request->validate([
                'name'              => 'required|max:50',
                'des'               => 'required|max:255',
                'price'             => 'max:255',
                'old_price'         => 'max:20',
                'made'              => 'max:50',
                'status'            => 'required|numeric',
                'category_id'       => 'required|numeric',
            ]);
            item::create([
                'name'              => $request->name,
                'des'               => $request->des,
                'price'             => $price,
                'old_price'         => $old_price,
                'made'              => $made,
                'status'            => $request->status,
                'size'              => $size,
                'color'             => $color,
                'image'             => $image_name,
                'category_id'       => $request->category_id,
                'store_id'          => $request->store_id,
            ]);

            $request->session()->flash('success', 'New Item Has Been Added Successfully');
            return redirect()->route('dashboard.items', $id);
        } else {
            return redirect()->route('home');
        }

    }

    public function edititem ($store_id)
    {
        $user_id    = Auth      ::id();
        $item       = item      ::find($store_id);
        $category   = category  ::find($item->category_id);
        $store      = store     ::with('categorys')->find($category->store_id);
        $item_size = explode(',', $item->size);
        $item_color = explode(',', $item->color);
        if ($user_id == $store->user_id) {
            return view ('store.dashboard.items.edit',compact('store','item','item_size','item_color'));
        } else {
            return redirect()->route('home');
        }
    }

    public function updateitem  (request $request, $id)
    {
        $store = store::find($request->store_id);
        // dd($request->all());

        if ($request->color) {
            $color = implode(',',$request->color);
        } else {
            $color= '';
        }

        if ($request->size) {
            $size = implode(',',$request->size);
        } else {
            $size= '';
        }
        if ($request->made) {
            $made = $request->made;
        } else {
            $made= '';
        }
        if ($request->old_price) {
            $old_price = $request->old_price;
        } else {
            $old_price= '';
        }
        if ($request->price) {
            $price = $request->price;
        } else {
            $price= '';
        }

        if ($store->user_id == Auth::id()) {
            $request->validate([
                'name'              => 'required|max:255',
                'des'               => 'required|max:255',
                'price'             => 'required|max:255',
                'made'              => 'max:50',
                'old_price'         => 'max:20',
                'status'            => 'required|numeric',
                'category_id'       => 'required|numeric',
            ]);

            $item       = item::find($id);
            $item->update([
                'name'              => $request->name,
                'des'               => $request->des,
                'price'             => $request->price,
                'old_price'         => $old_price,
                'made'              => $made,
                'status'            => $request->status,
                'size'              => $size,
                'color'             => $color,
                'category_id'       => $request->category_id,
                'store_id'          => $request->store_id,
            ]);

            if ($request->image) {
                $request->validate([
                    'image'         => 'mimes:jpeg,jpg,png|max:4000',
                ]);
                if ($store->image != 'empty.png' && $store->image != null)
                {
                    if (is_file(public_path("image/items/$item->image")))
                    {
                        unlink(public_path("image/items/$item->image"));
                    }
                }
                $file           = $request->file('image');
                $path           = public_path() . '/image/items';
                $image_name     = time() . rand(1,2000) .'.'. $file->getClientOriginalExtension();
                $file->move($path,$image_name);
                $item->update([
                    'image'             => $image_name,
                ]);
            }

            $request->session()->flash('success', 'Update Item Is Successfully');

            return redirect()->route('dashboard.items', $request->store_id);

        } else {
            return redirect()->route('home');
        }



    }


    public function deleteitem($id)
    {
        $item = item::find($id);
        if ($item) {
            $category   = category::find($item->category_id);
            $store      = store::find($category->store_id);

            if ($store->user_id == Auth::id()) {
                if (is_file(public_path("image/items/$item->image")))
                {
                    unlink(public_path("image/items/$item->image"));
                }
                $item->delete();
                session()->flash('success', 'Item ٍٍٍSuccessfully Deleted');
                return redirect()->back();
            }
            return redirect()->route('dashboard', $store->id);
        } else {
            return redirect()->route('home');
        }
    }

}
