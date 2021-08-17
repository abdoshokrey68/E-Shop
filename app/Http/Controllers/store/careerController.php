<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Http\Requests\careerRequest;
use App\Models\career;
use App\Models\store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class careerController extends Controller
{
    public function index ($store_id)
    {
        $store = store::with('careers')->find($store_id);
        foreach ($store->careers as $career)
        {
            $career->date = $career->created_at->diffForHumans();
        }
        return view('store.dashboard.career.index', compact('store'));
    }

    public function new ($store_id)
    {
        $store = store::find($store_id);
        $user_id = Auth::id();
        if ($store->user_id == $user_id)
        {
            // $currency = file_get_contents(public_path('include\currency.json'));
            return view('store.dashboard.career.new', compact('store'));
        } else {
            return redirect()->route('home');
        }
    }

    public function create (careerRequest $request ,$store_id)
    {
        $store = store::find($store_id);
        if ($store->phone) {

            if ($store->user_id == Auth::id())
            {
                career::create([
                    'name'          => $request->name ,
                    'des'           => $request->des ,
                    'salary'        => $request->salary ,
                    'career_system' => $request->career_system,
                    'store_id'      => $store->id
                ]);
                return redirect()->route('dashboard',$store->id)->with('success', 'A new profession has been added to your store');

            } else {
                return redirect()->route('home');
            }

        } else {
            return redirect()->route('dashboard.info',$store->id);
        }
    }

    public function edit ($career_id)
    {
        $career = career::find($career_id);
        $store = store::find($career->store_id);
        if ($career->store_id == Auth::id())
        {
            // $currency = file_get_contents(public_path('include\currency.json'));
            return view('store.dashboard.career.edit',compact('career', 'store'));
        } else
        {
            return redirect()->route('home');
        }
    }

    public function update (request $request ,$career_id)
    {
        // dd($request->all());
        $career = career::find($career_id);
        $store = store::find($career->store_id);
        if ($store->user_id== Auth::id())
        {
                $career->name           = $request->name;
                $career->des            = $request->des;
                $career->salary         = $request->salary;
                $career->career_system  = $request->career_system;
                $career->save();
            // return $career;
            return redirect()->route('dashboard', $store->id)->with('success', 'Career information has been updated');
        } else
        {
            return redirect()->route('home');
        }
    }

    public function delete ($career_id)
    {
        $career = career::find($career_id);

        if($career) {
            $store = store::find($career->store_id);
            if ($store->user_id== Auth::id())
            {
                $career->delete();
                return redirect()->route('dashboard', $store->id)->with('success', 'Profession removed successfully');
            } else
            {
                return redirect()->route('home');
            }
        } else {
            return redirect()->back();
        }
    }

    // public function status_av ($career_id)
    // {
    //     $career = career::find($career_id);
    //     $store = store::find($career->store_id);
    //     if ($store->user_id == Auth::id())
    //     {
    //         $career->career_system = 1;
    //         $career->save();
    //         return redirect()->back()->with('success', '');
    //     } else
    //     {
    //         return redirect()->back();
    //     }
    // }

}
