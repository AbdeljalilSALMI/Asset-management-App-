<?php

namespace App\Http\Controllers;
use App\Models\Request as req;
use App\Models\Asset;
use Illuminate\Http\Request;

class SupplierRequestHandle extends Controller
{
    public function index(){
        $supplier=auth()->user()->supplier;
        $request = Req::where('supplier_id', $supplier->id)->get();
        return view('supplier_request',compact('request'));

    }
    
    public function accept($id)
    {
        $request = Req::findOrFail($id);
        $request->status = 'accepted';
        $request->save();

        $asset=Asset::create([
            'name' => $request->asset_name,
            'serial_number'=>$request->serial_number,
            'category_id'=>$request->category_id,
            'status'=>'available',
            'purchase_date'=>now()

        ]);
        return redirect()->route('supplierhandle.index')->with('demande accéptée');
    }
    public function refuse($id){
        $request = Req::findOrFail($id);
        $request->status = 'refused';
        $request->save();
        return redirect()->route('supplierhandle.index')->with('demande refusée');
    }
}
