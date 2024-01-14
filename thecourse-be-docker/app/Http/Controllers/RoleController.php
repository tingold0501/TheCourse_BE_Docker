<?php

namespace App\Http\Controllers;

use App\Models\RoleM;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = RoleM::all();
        return $roles;
        dd($roles);
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
    public function show(RoleM $roleM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoleM $roleM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoleM $roleM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoleM $roleM)
    {
        //
    }
}
