<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\ModelUser;
use App\ModelPeserta;
use App\ModelEvent;
use App\ModelJadwal;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $id = Auth::user()->id;
        $peserta = ModelPeserta::where('id_user', $id)->get();
        // $users = ModelUser::find($id);
    	return view('home', ['peserta' => $peserta]);
    }

    public function showAkun() 
    {
        $id = Auth::user()->id;
        // $users = ModelUser::where('id', $id)->get();
        $users = ModelUser::find($id);
    	return view('showAkun', ['users' => $users]);
    }

    public function showEvent() 
    {
        $id = Auth::user()->id;
        $event = ModelEvent::where('id_user', $id)->get();
    	return view('showEvent', ['event' => $event]);
    }

    public function showJadwal() 
    {
        $id = Auth::user()->id;
        $jadwal = ModelJadwal::where('id_user', $id)->get();
        return view('showJadwal', ['jadwal' => $jadwal]);
    }

    public function daftarPeserta(Request $request){
        $messages = [
            'required' => 'Form tidak boleh ada yang kosong',
            'min' => 'Form harus diisi minimal 8 karakter',
            'max' => 'Form harus diisi maksimal 20 karakter',
        ];

        $this->validate($request, [
            'nama' => 'required|max:20',
            'email' => 'required|max:20',
            'no_hp' => 'required',
            'alamat' => 'required',
        ],$messages);

        $id = Auth::user()->id;

        $data =  new ModelPeserta();
        $data->id_user = $id;
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->no_hp = $request->no_hp;
        $data->alamat = $request->alamat;
        
        $data->save();
        return redirect('home')->with('alert-success','Kamu berhasil Register');
    }

    public function createEvent() 
    {
        return view('create-event');
    }

    public function postEvent(Request $request){
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'foto' => 'required|mimes:jpeg,jpg,png',
            'tanggal' => 'required',
            'isi' => 'required',
        ]);

        $uploadedFile = $request->file('foto');
        $imgName = time() . str_random(22) . '.' . $uploadedFile->getClientOriginalExtension();
        $uploadedFile->move(public_path('./public/images/event/'), $imgName);
        
        $id = Auth::user()->id;

        $data =  new ModelEvent();
        $data->id_user = $id;
        $data->nama = $request->nama;
        $data->kategori = $request->kategori;
        $data->foto = $imgName;
        $data->tanggal = $request->tanggal;
        $data->isi = $request->isi;
        
        $data->save();
        return redirect('showEvent')->with('alert-success','Kamu berhasil Register');
    }

    

    
}
