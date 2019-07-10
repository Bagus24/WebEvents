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
        $peserta = ModelPeserta::where('id_user', $id)->paginate(1);
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
        $event = ModelEvent::where('id_user', $id)->paginate(1);
    	return view('showEvent', ['event' => $event]);
    }

    public function showJadwal() 
    {
        $id = Auth::user()->id;
        $jadwal = ModelJadwal::where('id_user', $id)->paginate(1);
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

    public function createJadwal() 
    {
        $event = ModelEvent::all();
        // return view('create-jadwal');
        return view('create-jadwal', ['event' => $event]);
    }

    public function postJadwal(Request $request){
        $messages = [
            'required' => 'Form tidak boleh ada yang kosong',
            'min' => 'Form harus diisi minimal 8 karakter',
            'max' => 'Form harus diisi maksimal 20 karakter',
        ];

        $this->validate($request, [
            'nama_event' => 'required|max:50',
            'hari' => 'required|max:20',
            'jam' => 'required',
            'kegiatan' => 'required',
            'isi' => 'required',
        ],$messages);

        $id = Auth::user()->id;

        $data =  new ModelJadwal();
        $data->id_user = $id;
        $data->nama_event = $request->nama_event;
        $data->hari = $request->hari;
        $data->jam = $request->jam;
        $data->kegiatan = $request->kegiatan;
        $data->isi = $request->isi;
        
        $data->save();
        return redirect('showJadwal')->with('alert-success','Kamu berhasil Register');
    }

    public function editEvent($id) 
    {
        $event = ModelEvent::findOrFail($id);
        // return view('edit-event');
        return view('edit-event', ['event' => $event]);
    }

    public function postEditEvent(Request $request, $id) 
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'foto' => 'nullable|mimes:jpeg,jpg,png',
            'tanggal' => 'required',
            'isi' => 'required',
        ]);
        
        $id_user = Auth::user()->id;

        $data =  new ModelEvent();
        $data = ModelEvent::find($id);
        $data->id_user = $id_user;
        $data->nama = $request->nama;
        $data->kategori = $request->kategori;
        if (!empty($request->file('foto'))) {
            $uploadedFile = $request->file('foto');
            $imgName = time() . str_random(22) . '.' . $uploadedFile->getClientOriginalExtension();
            $uploadedFile->move(public_path('./public/images/event/'), $imgName);

            $data->foto = $imgName;
        }

        // $data->foto = $imgName;
        $data->tanggal = $request->tanggal;
        if(!empty($request->isi)){
            $data->isi = $request->isi;
        }
        // $data->isi = $request->isi;
        
        $data->save();
        return redirect('showEvent')->with('alert-success','Kamu berhasil Register');   
    }

    public function editPeserta($id) 
    {
        $peserta = ModelPeserta::findOrFail($id);
        // return view('edit-event');
        return view('edit-peserta', ['peserta' => $peserta]);
    }

    
    public function postEditPeserta(Request $request, $id) 
    {
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

        $id_user = Auth::user()->id;
        

        $data =  new ModelPeserta();
        $data = ModelPeserta::find($id);
        $data->id_user = $id_user;
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->no_hp = $request->no_hp;
        $data->alamat = $request->alamat;
        
        $data->save();
        return redirect('home')->with('alert-success','Kamu berhasil Register');   
    }

    public function editJadwal($id) 
    {
        $jadwal = ModelJadwal::findOrFail($id);
        
        // return view('edit-event');
        return view('edit-jadwal', ['jadwal' => $jadwal]);
    }

    public function postEditJadwal(Request $request, $id){
        $messages = [
            'required' => 'Form tidak boleh ada yang kosong',
            'min' => 'Form harus diisi minimal 8 karakter',
            'max' => 'Form harus diisi maksimal 20 karakter',
        ];

        $this->validate($request, [
            // 'nama_event' => 'required|max:50',
            'hari' => 'required|max:20',
            'jam' => 'required',
            'kegiatan' => 'required',
            'isi' => 'required',
        ],$messages);

        $id_user = Auth::user()->id;

        $data =  new ModelJadwal();
        $data = ModelJadwal::find($id);
        $data->id_user = $id_user;
        // $data->nama_event = $request->nama_event;
        $data->hari = $request->hari;
        $data->jam = $request->jam;
        $data->kegiatan = $request->kegiatan;
        $data->isi = $request->isi;
        
        $data->save();
        return redirect('showJadwal')->with('alert-success','Kamu berhasil Register');
    }

    public function editAkun($id) 
    {
        $users = ModelUser::findOrFail($id);
        // return view('edit-event');
        return view('edit-akun', ['users' => $users]);
    }

    public function postEditAkun(Request $request, $id) 
    {
        // $id = Auth::user()->id;
        $data = ModelUser::find($id);
        $data->name= $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect('showAkun')->with('alert-success','Kamu berhasil Register');
         
    }

    // hapus sementara
    public function hapusPeserta($id)
    {
            $peserta = ModelPeserta::find($id);
            $peserta->delete();
    
            return redirect('home');
    }

    public function hapusEvent($id)
    {
            $event = ModelEvent::find($id);
            $event->delete();
    
            return redirect('showEvent');
    }

    public function hapusJadwal($id)
    {
            $jadwal = ModelJadwal::find($id);
            $jadwal->delete();
    
            return redirect('showJadwal');
    }

    public function search()
    {
        $search = $request->get('search');
        if ($search != '')
            $peserta = ModelPeserta::where('event', 'like', "%{$search}%")->get();
        else
            $peserta = ModelPeserta::all();

        $data['key'] = $search;
        return view('blog.index')->with($data);
    }

}
