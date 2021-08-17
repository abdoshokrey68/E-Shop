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

class categoryController extends Controller
{
    public function add($store_id)
    {

        $store = store::with('categorys')->find($store_id);
        if ($store->user_id == Auth::id()) {

        if (count($store->categorys) >= 5)
            return redirect()->back()->with('error', 'The number of categories in your store is enough');
        else
            return view ('store.dashboard.categorys.add', compact('store'));
        } else {
            return redirect()->route('home');
        }
    }

    public function create(request $request, $categoryid)
    {
        $store = store::with('categorys')->find($categoryid);
        if ($store->user_id == Auth::id()) {
            if (count($store->categorys) >= 5) {
                return redirect()->back()->with('error', 'The number of categories in your store is enough');
            } else {
                $request->validate([
                    'name'  => 'required|min:2|max:12',
                    'des'   => 'required|min:2|max:255'
                ]);
                category::create($request->all());
                $request->session()->flash('success', 'Category Created Successfully');
                return redirect()->route('dashboard.items', $store->id);
            }
        } else {
            return redirect()->route('home');
        }
    }

    public function edit($id)
    {
        $category   = category::find($id);
        $store      = store::find($category->store_id);
        if ($store->user_id == Auth::id()) {
            return view('store.dashboard.categorys.edit', compact('store', 'category'));
        } else {
            return redirect()->route('home');
        }
    }

    public function update(Request $request, $id)
    {
        $store      = store::find($request->store_id);
        $category   = category::find($id);
        if ($category->store_id == $request->store_id) {
            if ($store->user_id == Auth::id()) {

                $request->validate([
                    'name'  => 'required|min:2|max:15',
                    'des'   => 'required|min:2|max:255'
                ]);

                $category->update([
                    'name'      => $request->name,
                    'des'       => $request->des
                ]);
                $request->session()->flash('success', 'Data Updated Successfully');
                return redirect()->route('dashboard.items', $store->id);

            } else {
                return redirect()->route('home');
            }
        }
    }

    public function delete($id)
    {
        $category   = category::find($id);
        $store      = store::find($category->store_id);
        if ($store->user_id == Auth::id()) {

            $category->delete();

            session()->flash('success', 'Deleted successfully');
            return redirect()->route('dashboard.items', $store->id);

        } else {
            return redirect()->route('home');
        }
    }
}
