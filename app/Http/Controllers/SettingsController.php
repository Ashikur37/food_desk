<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Setting;
use App\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        $setting = Setting::firstOrFail();

        return view('settings.edit', compact('setting'));
    }
    public function userList()
    {
        return view('admin.user.list');
    }
    public function userData()
    {
        $data = User::whereType(0)->latest()->get();
        return Datatables::of($data)
            ->addIndexColumn()

            ->addColumn('action', function ($row) {

                $btn = '<div class="btn-group"><a href="' . URL::to('/') . '/sub-categories/' . $row->id . '/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                               <button onclick="deleteData(' . $row->id . ')" class="btn btn-sm btn-outline-danger">Delete</button></div>';

                return $btn;
            })

            ->rawColumns(['action'])
            ->escapeColumns([])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        Setting::create($requestData);

        return redirect('settings')->with('flash_message', 'Setting added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $setting = Setting::findOrFail($id);

        return view('settings.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $setting = Setting::findOrFail($id);

        return view('settings.edit', compact('setting'));
    }
    public function changePassword()
    {
        return view('admin.changePassword');
    }
    public function updatePassword(Request $request)
    {
        $user_id = Auth::User()->id;
        $obj_user = User::find($user_id);
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            return redirect()->back()->withError("Your current password does not matches with the password you provided. Please try again.");
        }
        if (strlen($request->password) < 6) {
            return redirect()->back()->withError("Length of new password must be at least 6");
        }
        if ($request->password != $request->password_confirmation) {
            return redirect()->back()->withError("Password doesn't match");
        }
        $obj_user->password = Hash::make($request['password']);
        $obj_user->save();
        return redirect()->back()->with("success", "Password updated successfully");
    }
    public function adminList()
    {
        $admins = User::whereType(2)->get();
        return view('admin.adminList', compact('admins'));
    }
    public function addAdmin()
    {
        return view('admin.createAdmin');
    }
    public function deleteAdmin(User $user)
    {
        $user->delete();

        return redirect()->route('adminList')->with('success', 'Admin deleted successfully');
    }
    public function insertAdmin(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        User::create([
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'address1' => "",
            'address2' => "",
            'zip' => "",
            'town' => "",
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'type' => 2
        ]);
        return redirect()->route('adminList')->with('success', 'New admin added successfully');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        if ($request->logo_img) {
            $path = time() . '.' . $request->logo_img->getClientOriginalExtension();
            $request->logo_img->move(public_path('images'), $path);
            $request["logo"] = $path;
        }

        if ($request->fav_icon_img) {
            $path = 'f' . time() . '.' . $request->fav_icon_img->getClientOriginalExtension();
            $request->fav_icon_img->move(public_path('images'), $path);
            $request["fav_icon"] = $path;
        }

        if ($request->banner_img) {
            $path = 'b' . time() . '.' . $request->banner_img->getClientOriginalExtension();
            $request->banner_img->move(public_path('images'), $path);
            $request["banner"] = $path;
        }

        if ($request->sticky_logo_img) {
            $path = 's' . time() . '.' . $request->sticky_logo_img->getClientOriginalExtension();
            $request->sticky_logo_img->move(public_path('images'), $path);
            $request["sticky_logo"] = $path;
        }

        if ($request->default_product_img) {
            $path = 'd' . time() . '.' . $request->default_product_img->getClientOriginalExtension();
            $request->default_product_img->move(public_path('images'), $path);
            $request["default_product"] = $path;
        }
        $requestData = $request->all();

        $setting = Setting::findOrFail($id);

        $setting->update($requestData);

        return redirect('settings')->with('flash_message', 'Setting updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Setting::destroy($id);

        return redirect('settings')->with('flash_message', 'Setting deleted!');
    }
}
