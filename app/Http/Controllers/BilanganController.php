<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BilanganController extends Controller
{
    public function index() {
        $title = 'Bilangan Terkecil';
        return view('bilanganterkecil')->with(compact('title'));
    }

    public function hitung(Request $request) {

        $this->validate($request, [
            'bilangan1' => 'required',
            'bilangan2' => 'required',
            'bilangan3' => 'required',
        ]);

        $angka1 = $request->bilangan1;
        $angka2 = $request->bilangan2;
        $angka3 = $request->bilangan3;
        $output = collect([$angka1, $angka2, $angka3])->max();
        return redirect('/bilanganterkecill')->with('output', $output);
    }
}
