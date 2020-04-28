<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\informasi;
use DataTables;
use App\Models\admin;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class Dashboard extends Controller
{


    function index()
    {
        $judul = 'crud data';
        $data = informasi::all();
        return view('admin.crud_cus', compact('judul', 'data'));
    }

    function create()
    {
        $no = 0;
        $judul = '';
        $isi = '';
        $edit = '';
        $gambar = '';
        $title = 'tambah data data';
        $action = route('dashboard.store');
        $data = informasi::all();
        return view('admin.crud_form', compact('judul', 'gambar', 'title', 'isi', 'action', 'edit'));
    }
    function store(request $request)
    {
        $count = informasi::where('judul', $request->input('judul'))->count();
        if ($count > 0) {
            $request->session()->flash('pesan', 'judul ini sudah ada sich');
            return  redirect('dashboard');
        } else {
            $this->validate(
                $request,
                [
                    'judul' => 'required|string',
                    'isi' => 'required|string',
                    'gambar' => 'required',

                ]
            );
            // informasi::create($request::all());
            if ($request->file('gambar')) {
                $file = $request->file('gambar');
                $dt = Carbon::now();
                $acak  = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '-' . $dt->format('Y-m-d-H-i-s') . '.' . $acak;
                $request->file('gambar')->move("image/", $fileName);
                $gambar = $fileName;
            } else {
                $gambar = NULL;
            }
            $arr = [
                'id_admin' => 1,
                'judul' => $request->judul,
                'isi' => $request->isi,
                'tanggal' => date('Y-m-d'),
                'hits' => 0,
                'gambar' => $gambar,
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $params =  DB::table('rn_informasi')->insert($arr);
            if ($params) {
                $request->session()->flash('pesan', 'data berhasil di tambahkan cuk');
                return redirect('dashboard');
            } else {

                $request->session()->flash('pesan', 'data berhasil di tambahkan cuk');
                return redirect('dashboard');
            }
        }
    }
    function show()
    {
    }
    function edit($id)
    {
        $data = informasi::findOrFail($id);
        $edit =  1;
        $titles = 'edit data';
        $judul = $data->judul;
        $id = $data->id;
        $action = route('dashboard.update', $data->id);
        $isi = $data->isi;
        $gambar = Url('image/' . $data->gambar);
        return view('admin.crud_form', compact('judul', 'gambar', 'titles', 'isi', 'action', 'edit'));
    }
    function update(Request $request, $id)
    {
        $fgambar = Informasi::find($id);
        if ($fgambar->gambar != '') {
            @unlink('image/' . $fgambar->gambar);
        }
        if ($request->file('gambar')) {
            $file = $request->file('gambar');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '-' . $dt->format('Y-m-d-H-i-s') . '.' . $acak;
            $request->file('gambar')->move("image/", $fileName);
            $gambar = $fileName;
        } else {
            $gambar = NULL;
        }

        $arr = [
            'id_admin' => 1,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => date('Y-m-d'),
            'hits' => 0,
            'gambar' => $gambar
        ];
        $params = Informasi::find($id)->update($arr);
        if ($params) {
            $request->session()->flash('pesan', 'data berhasil di tambahkan cuk');
            return redirect('dashboard');
        } else {
            $request->session()->flash('pesan', 'data berhasil di tambahkan cuk');
            return redirect('dashboard');
        }
    }
    function destroy($id)
    {
        $gambar = Informasi::find($id);
        if ($gambar->gambar != '') {
            @unlink('image/' . $gambar->gambar);
        } else {
        }
        Informasi::find($id)->delete();
        Session()->flash('pesan', 'data berhasil di hapus');
        return redirect('dashboard');
    }
    //
    function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
