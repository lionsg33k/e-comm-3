<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::wherenot("id", 1)->get();
        $roles = Role::wherenot("name", "admin")->get();
        $products = Product::all();

        return view("dashboard.admin_dashboard", compact("users", "roles" , "products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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


    public function moderator(Request $request, User $user)
    {

        $request->validate([
            "user_id" => "required",
        ]);
        $user = User::where("id", $request->user_id)->first();

        if ($user && $user->hasRole(["moderator"])) {
            $user->roles()->detach();
        } else {
            $moderateor = Role::where("name", "moderator")->first();
            $user->roles()->attach([$moderateor->id]);
        }

        return back();
    }


    public function block(Request $request, User $user)
    {

        if ($user->deleted) {
            $user->deleted = false;
        } else {
            $user->deleted = true;
        }

        $user->save();
        return back();
    }
}
