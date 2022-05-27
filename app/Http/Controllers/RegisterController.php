<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register');
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
        // $this->validate($request, [
        //     'name' => 'required|string'
        //     'name' => 'required|string'
        //     'name' => 'required|string'
        //     'name' => 'required|string'
        //     'name' => 'required|string'
        // ]);

        $Register = Register::create([
            'noreg' => substr(str_shuffle("0123456789"), 0, 5),
            'name' => $request->name,
            'lokasi' => $request->lokasi,
            'waktu' => $request->waktu,
            'whatsapp' => $request->whatsapp,
            'kecamatan' => $request->kecamatan,
            'desa' => $request->desa,
            'rw' => $request->rw,
            'rt' => $request->rt,
            'jenis_kelamin' => $request->jenis_kelamin,
            'layanan' => $request->layanan,
            'riwayat_penyakit' => $request->riwayat_penyakit,
            'isActive' => 0,
           

        ]);
        // $Register = Register::create($request->except('_token'));
        // return view('setting.index');
        

        return redirect(route('voucher',$Register->id))->with(['success' => 'Data Baru Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function getVoucher($id)
    {
        //AMBIL DATA PESANAN BERDASARKAN INVOICE
        $Register = Register::where('id', $id)->first();
        //LOAD VIEW checkout_finish.blade.php DAN PASSING DATA ORDER
        return view('voucher', compact('Register'));
    }
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
