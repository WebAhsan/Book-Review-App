<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use Intervention\Image\ImageManager;
// use Intervention\Image\Drivers\Gd\Driver;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Register View Blade
        return view('account.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function processregister(Request $request)
    {

        //This method register user 

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:5',
            'password_confirmation' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
        }

        //Insert register information

        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->save();

        return redirect()->route('account.login')->withSuccess('Your account create successfully!');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function login()
    {
        //Login Form
        return view('account.login');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('account.login');
    }


    public function loginauth(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->route('account.userprofile');
        } else {
            return redirect()->back()->withInput()->withError('Your email password is incorrect');
        }
    }

    public function userprofile()
    {
        //Register View Blade

        $user = User::find(Auth::User()->id);

        return view('account.profile', [
            'user' => $user,
        ]);
    }

    public function updateprofile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $user = User::find(Auth::User()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();


        if (!empty($request->image)) {

            File::delete(public_path('uploads/profile/' . $user->image));

            $userimage = $request->image;
            $ext = $userimage->getClientOriginalExtension();
            $imagenum = time() . '.' . $ext;
            $userimage->move(public_path('uploads/profile'), $imagenum);
            $user->image = $imagenum;
            $user->save();

            // $manager = new ImageManager(new Driver());
            // $img = $manager->read(public_path('uploads/profile/' . $imagenum));
            // $img->cover(150, 150);
            // $user->save(public_path('uploads/profile/thumb' . $imagenum));
        }

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
