<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\store;
use Auth;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $mainstore = User::with('store')->find(Auth::id());
        $stores = store::where('subscription', 1)->get();
        return view('home', compact('stores', 'mainstore'));
    }

    public function contact()
    {
        return view ('home.contact');
    }

    public function career ()
    {
        return view('home.career');
    }

    public function newlogin ()
    {
        $user = User::with('store')->find(Auth::id());
        if ($user->store) {
            return redirect()->route('dashboard', $user->store->id);
        } else {
            return redirect('home');
        }
    }

    public function ajax() {
        return App::getLocale() . '/home';
        return view('ajax');
    }
    public function search(Request $request) {
        $stores = store::where('name', 'like', '%'. $request->search .'%', 'AND', 'des', 'like',  '%'. $request->search .'%')->paginate(12);
        $search = $request->search;
        $stores = DB::select("SELECT * FROM stores WHERE name LIKE '%$search%' OR `des` LIKE '%$search%' ");
        // $stores = DB::table('');
        return $stores;
    }

    public function add_store () {
        return view ('home.create');
    }

    // public function select_plane () {
    //     return view ('home.select-plane');
    // }

    public function create_store(request $request)
    {
            $auth_id = Auth::id();
            $request->validate([
                'name'      => 'required|min:3|unique:stores,name',
                'des'       => 'required|min:15',
                'email'     => 'required|email:rfc,dns',
                'address'   => 'required|min:10',
                'phone'     => 'required',
                'delivery'  => 'required|max:2|integer',
                'payment'   => 'required|max:2|integer',
                // 'plan'      => 'required|integer|max:2',
                // 'image'     => 'mimes:jpeg,jpg,png,gif|max:5000',
            ]);
            if ($request->image) {
                $request->validate([
                    'image'     => 'mimes:jpeg,jpg,png|max:5000',
                ]);
                $file           = $request->file('image');
                $path           = public_path() . '/img/stores';
                $image_name     = time() .'.'. $file->getClientOriginalExtension();
                $file->move($path,$image_name);
            } else {
                $image_name = 'default.png';
            }

            $planEnd = time() + (30 * 24 * 60 * 60) ;

            store::create([
                'name'          => $request->name,
                'des'           => $request->des,
                'email'         => $request->email,
                'phone'         => $request->phone,
                'address'       => $request->address,
                'delivery'      => $request->delivery,
                'payment'       => $request->payment,
                'image'         => $image_name,
                'timeend'       => $planEnd,
                'subscription'  => 1,
                'user_id'       => $auth_id
            ]);
            $request->session()->flash('success', 'The store has been created successfully');
            return redirect('/');

    }

    public function notfound() {
        return view('404');
    }

    public function profile_edit ($user_id)
    {
        $user = User::find($user_id);
        if ($user_id == Auth::id())
        {
            return view('home.profile', compact('user'));
        } else {
            return redirect()->route('home');
        }
    }

    public function profile_update (request $request, $user_id)
    {
        $user = User::find($user_id);
        if ($user_id == Auth::id())
        {
            if ($request->image)
            {
                $request->validate([
                    'image'         => 'mimes:jpeg,jpg,png|max:4050',
                ]);

                if (is_file(public_path("image/users/$user->image")))
                {
                    unlink(public_path("image/users/$user->image"));
                }
                $file           = $request->file('image');
                $path           = public_path() . '/image/users';
                $image_name     = time(). rand(1, 2000) .'.'. $file->getClientOriginalExtension();
                $file->move($path,$image_name);
                $user->update([
                    'image'      => $image_name
                ]);
                $user->save();
            }

            $request->validate([
                'name'      => 'required|max:100|min:5',
                'email'     => 'required|email:rfc,dns|unique:users,email,'.$user_id,
                'phone'     => 'required|max:50',
                'address'   => 'required|min:5|max:100'
            ]);

            if ($request->password)
            {
                $request->validate([
                    'password' => [
                        'required',
                        'string',
                        'min:8',             // must be at least 8 characters in length
                        'regex:/[a-z]/',      // must contain at least one lowercase letter
                        'regex:/[A-Z]/',      // must contain at least one uppercase letter
                        'regex:/[0-9]/',      // must contain at least one digit
                        // 'regex:/[@$!%*#?&]/', // must contain a special character
                    ]
                ]);
                $user->update([
                    'password'      => Hash::make($request->password),
                ]);
            }

            $user->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'phone'     => $request->phone,
                'address'   => $request->address
            ]);
            return redirect()->route('profile.edit', Auth::id())->with('success', 'Your personal data has been successfully updated');
        } else {
            return redirect()->route('home');
        }
    }
}
