<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Aset;
use App\User;
use Excel;


class AsetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth',['except'=>['show']]);        
    }     

    public function index(Request $request)
    {
        if(Auth::user()->id=='1'){
        
        $s = $request->input('s');
        $asets = Aset::latest()->search($s)->paginate(10);
        return view('asets.index', compact('asets','s'));
        }
        return redirect('/home')->with('success','di Home');
    }

        
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'merk' => 'required',
            'tipe_barang' => 'required',
            'kode_barang' => 'required',
            'tahun_perolehan' => 'required',
            'nup' => 'required',
            'bast' => 'required',
            'kondisi' => 'required'
        ]);
        
            
       //Create  Post
       $aset = new Aset;
       $aset->merk = $request->input('merk');
       $aset->tipe_barang = $request->input('tipe_barang');
       $aset->kode_barang = $request->input('kode_barang');
       $aset->tahun_perolehan = $request->input('tahun_perolehan');
       $aset->nup = $request->input('nup');
       $aset->bast = $request->input('bast','Tidak');
       $aset->kondisi = $request->input('kondisi','Baik');
       $aset->user_id = auth()->user()->id;
       $aset->save();
       
       

       return redirect('/asets')->with('success','Aset telah disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aset = Aset::find($id);
        return view('asets.show')->with('aset',$aset);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aset = Aset::find($id);

        //Check for correct user
        if(Auth::user()->id=='1'){
            return view('asets.edit')->with('aset',$aset);     
        
            if(auth()->user()->id !==$aset->user_id){
            return redirect('/home')->with('error','Halaman tidak bisa diakses');
          }
            return view('asets.edit')->with('aset',$aset);
        }
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
        
        $this->validate($request, [
            'merk' => 'required',
            'tipe_barang' => 'required',
            'kode_barang' => 'required',
            'tahun_perolehan' => 'required',
            'nup' => 'required',
            'bast' => 'required',
            'kondisi' => 'required'
        ]);
        if(Auth::user()->id=='1'){
            $aset = Aset::find($id);
            $aset->merk = $request->input('merk');
            $aset->tipe_barang = $request->input('tipe_barang');
            $aset->kode_barang = $request->input('kode_barang');
            $aset->tahun_perolehan = $request->input('tahun_perolehan');
            $aset->nup = $request->input('nup');
            $aset->bast = $request->input('bast','Tidak');
            $aset->kondisi = $request->input('kondisi','Baik');
            $aset->save();
            return redirect('/asets')->with('success','Aset telah disimpan');   
        }
            if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error','Halaman tidak bisa diakses');
            }
            $aset = Aset::find($id);

            $aset->merk = $request->input('merk');
            $aset->tipe_barang = $request->input('tipe_barang');
            $aset->kode_barang = $request->input('kode_barang');
            $aset->tahun_perolehan = $request->input('tahun_perolehan');
            $aset->nup = $request->input('nup');
            $aset->bast = $request->input('bast','Tidak');
            $aset->kondisi = $request->input('kondisi','Baik');
            $aset->save();
            //$aset->user_id = auth()->user()->id;
        

        return redirect('/asets')->with('success','Aset telah disimpan');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aset = Aset::find($id);

        //Check for correct user
        //if(auth()->user()->id !==$post->user_id){
        //    return redirect('/posts')->with('error','Halaman tidak bisa diakses');
        //}
        if(Auth::user()->id=='1'){
            $aset->delete();
            return redirect('/asets')->with('success','Aset Terhapus');
        }

        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error','Halaman tidak bisa diakses');
        }
        $aset->delete();
        return redirect('/asets')->with('success','Aset Terhapus');
    }
    
	public function downloadExcel($type)
	{
		/*$data = DB::table('asets')
        ->join('users', 'asets.user_id', '=', 'users.id')
        ->select('asets.merk', 'asets.tipe_barang', 'asets.kode_barang', 'asets.tahun_perolehan', 'asets.nup', 'asets.bast', 'asets.kondisi', 'users.name')
        ->get()->toArray();*/
        
        
        $data = Aset::all();

       
       
        
         return
        Excel::create('data_aset', function($excel) use ($data) {
            $excel->sheet('Aset', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
            });
            /*$asets = Aset::all();
            return 
            (string) $asets;
            Excel::create('data_aset', function($excel) {
                $excel->sheet('Aset', function($sheet)
                {
                    $sheet->loadView('asets.index')->withKey($asets);
                });  */   

		})->download($type);
    }



}
