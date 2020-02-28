<?php

namespace App\Http\Controllers;

use App\Hobi;
use Illuminate\Http\Request;

class HobiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $hobi = Hobi::all();
        return view('hobi.index',compact('hobi'));
    }

    public function create()
    {
        return view('hobi.create');
    }

    public function store(Request $request)
    {
        $hobi = new Hobi();
        $hobi->hobi = $request->hobi;
        $hobi->save();
        return redirect()->route('hobi.index')
                ->with(['message'=>'Data Hobi Berhasil Dibuat']);
    }

    public function show($id)
    {
        $hobi = Hobi::findOrFail($id);
        return view('hobi.show',compact('hobi'));
    }

    public function edit($id)
    {
        $hobi = Hobi::findOrFail($id);
        return view('hobi.edit',compact('hobi'));
    }

    public function update(Request $request, $id)
    {
        $hobi = Hobi::findOrFail($id);
        $hobi->hobi = $request->hobi;
        $hobi->save();
        return redirect()->route('hobi.index')
                ->with(['message'=>'Data Hobi Berhasil Di Edit']);
    }

    public function destroy($id)
    {
        $dosen = Hobi::findOrFail($id)->delete();
        return redirect()->route('hobi.index')
                ->with(['message'=>'Data Hobi Berhasil Di Hapus']);
    }
}
