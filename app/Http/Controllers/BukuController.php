<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use PDF;

class BukuController extends Controller
{
	public function index()
	{
		$buku = Buku::all();
		return view('home', compact('buku'));
	}

	public function add()
	{
		return view('add');
	}

	public function push(Request $request)
    {
        // set collection
		$buku = new Buku;

		//process insert
		$buku->judul = $request->post('title');
		$buku->harga = $request->post('price');
		$buku->penerbit = $request->post('publisher');
	
		// save operation
		$buku->save();
	
		//redirect to page...
        return redirect('/home')->with('success', 'Buku berhasil ditambahkan');
	}

	public function edit(Buku $value)
	{
		return view('edit', compact('value'));
	}

	public function update(Request $request)
    {
        //
		$id = $request->post('id');
    	$buku = Buku::find($id);
		$buku->judul = $request->post('title');
		$buku->harga = $request->post('price');
		$buku->penerbit = $request->post('publisher');

        $buku->update();
        return redirect('/home')->with('success', 'Buku berhasil diubah');
    }

	public function destroy(Request $request){
		$id = $request->input('id');
		Buku::find($id)->delete();
		return redirect('/home')->with('success', 'Buku berhasil dihapus');
	}
	
	public function cetak_pdf()
    {
    	$buku = Buku::all();
 
    	$pdf = PDF::loadview('buku_pdf',['buku'=>$buku]);
    	return $pdf->stream();
    }
}
