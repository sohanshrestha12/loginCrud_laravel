<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function addview()
    {
        return view('add');
    }
    public function insert(Request $req)
    {
        $req->validate([
            'num' => 'required|unique:cruds,BthNo',
            'name' => 'required',
            'quantity' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);
        Crud::Create([
            'BthNo' => $req->num,
            'Name' => $req->name,
            'Quantity' => $req->quantity,
            'Status' => $req->status,
            'Description' => $req->description
        ]);
        return redirect()->route('dashboard');
    }
    public function delete($id){
        $user = Crud::find($id);
        $user->delete();
        return redirect()->route('dashboard');
    }
    public function edit($id){
        $user=Crud::find($id);
        return view('edit',['data'=>$user]);
    }
    public function editdata(Request $req){
        $req->validate([
            'num'=>'required|unique:cruds,BthNo',
            'name'=>'required',
            'quantity'=>'required',
            'status'=>'required',
            'description'=>'required',
        ]);
        $newdata=Crud::find($req->id);
        $newdata->BthNo=$req->num;
        $newdata->Name=$req->name;
        $newdata->Quantity=$req->quantity;
        $newdata->Status=$req->status;
        $newdata->Description=$req->description;

        $newdata->Save();
        
        return redirect('/');
    }
}
