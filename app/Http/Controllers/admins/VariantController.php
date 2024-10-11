<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    //Variant cha
    public function index()
    {
        return view('admins.variants.list-variant');
    }

    public function create()
    {
        return view('admins.variants.add-variant');
    }

    public function show($id)
    {
        return view('admins.variants.edit-variant');
    }
    // Variant con
    public function addChildVariant()
    {
        return view('admins.variants.add-variant-child');
    }

    public function listChildVariant()
    {
        return view('admins.variants.list-variant-child');
    }
    public function editChildVariant()
    {
        return view('admins.variants.edit-variant-child');
    }
}
