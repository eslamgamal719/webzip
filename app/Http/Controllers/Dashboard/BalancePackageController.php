<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBalancePackageRequest;
use App\Http\Requests\UpdateBalancePackageRequest;
use App\Models\BalancePackage;
use Illuminate\Http\Request;

class BalancePackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balancepackages = BalancePackage::latest()->paginate(20);

        return view('dashboard.balancepackages.index',compact('balancepackages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('dashboard.balancepackages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBalancePackageRequest $request)
    {
        $request = $request->merge(['user_id' => auth()->user()->id]);//test
       BalancePackage::create($request->all());

        return redirect()->route('dashboard.balancepackages.index')
            ->with('status','Balance Package created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $balancepackage = BalancePackage::findOrFail($id);

        return view('dashboard.balancepackages.show',compact('balancepackage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $balancepackage = BalancePackage::findOrFail($id);

        return view('dashboard.balancepackages.edit',compact('balancepackage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBalancePackageRequest $request, $id)
    {
        $balancepackage = BalancePackage::findOrFail($id);
        $balancepackage->update($request->all());
        return redirect()->route('dashboard.balancepackages.index')
            ->with('status', 'created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BalancePackage::findOrFail($id)->delete();
        return redirect()->route('dashboard.balancepackages.index')
            ->with('status', 'deleted successfully');
    }
}
