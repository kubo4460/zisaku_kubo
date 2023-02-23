<?php

namespace App\Http\Controllers;

use App\Account;
use App\Admin;
use App\Information;
use App\Order;
use Illuminate\Http\Request;
use App\Product;
use App\User;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_register');
    }

    public function adminuser()
    {
        $accounts = Account::all();
        return view('admin_user_list',compact('accounts'));
    }
    public function adminitem()
    {
        return view('admin_item_list');
    }
    public function adminsales()
    {
        $orders = new Order;
        $sumorders = $orders->selectRaw('SUM(price) AS total')->get();
        $numberorders = $orders->selectRaw('SUM(quantity) AS totals')->get();

        return view ('admin_sales',compact('sumorders','numberorders'));

    }
    public function admininformation()
    {
        $informations = Information::all();


        return view ('admin_information',compact('informations'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
