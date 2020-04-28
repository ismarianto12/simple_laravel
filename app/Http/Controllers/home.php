<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\informasi;
use DataTables;
use App\Models\admin;


class home extends Controller
{
    // 
    function index($params = 1)
    {
        $informasi = new admin();
        $render = array(
            'berita' => $informasi->informasi(),
            'title' => 'Halaman awal',
            'config' => 'ppdb'
        );
        //$berita = $informasi->informasi();
        // dd($berita);
        return view('home', $render);
    }

    function listdata()
    {
        //$Url = ;
        return DataTables::of(informasi::query())->addColumn('action', function () {
            return '<a href="">edit data</a>';
        })->make(true);
    }
}
