<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\medis;
use App\Models\User;
use App\Models\sale;
use App\Models\sales;

class medicController extends Controller
{
    public function create()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view('medic.create', compact('data'));
    }


    public function store(Request $request)
    {
        $name = $request->name;
        $price = $request->price;
        $image = $request->file('file');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('image'), $imageName);

        $medic = new medis();
        $medic->name = $name;
        $medic->price = $price;
        $medic->profileimage = $imageName;
        $medic->save();
        return back()->with('medic_add', 'medic has saved successfully.');
    }

    public function index()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }

        $medics = medis::all();
        return view('medic.index', compact('medics','data'));
    }

    public function show($id)
    {
        $medic = medis::find($id);
        return view('medic.show', compact('medic'));
    }

    public function edit($id)
    {
        $medic = medis::find($id);
        return view('medic.edit', compact('medic'));
    }
    public function update(Request $request)
    {
        $name = $request->name;
        $price = $request->price;


        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('image'), $imageName);
        } else {

            $imageName = 'default.jpg';
        }

        $medic = medis::find($request->id);

        $medic->name = $name;
        $medic->price = $price;
        $medic->profileimage = $imageName;
        $medic->save();

        return back()->with('medic_update', 'medic has updated successfully.');
    }

    public function destroycart($id){
        $medicdd = sales::find($id);
        $medicdd->delete();
        return back();
        // return $medicdd;
     }
    public function destroy($id)
    {  $medic = medis::find($id);




        if (!$medic) {
            return back()->with('error', 'medic not found');
        }


        $imagePath = public_path('image') . '/' . $medic->profileimage;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $medic->delete();
        return back()->with('success', 'medic has been deleted successfully.');
        // return $medic;
    }

//     public function sale(Request $request){
//         $iduser = $request->iduser;
//         $idmedis = $request->idmedis;

// echo "ddfdfd";
//         // $medicsale = new sale();
//         // $medicsale->name = $iduser;
//         // $medicsale->price = $idmedis;

//         // $medicsale->save();
//         // return back()->with('medic_add', 'medic has saved successfully.');
// echo $idmedis;
//     }

    public function carts()
    {

        return view("cart");
    }

    public function allMedic()
    {
        $medics = medis::all();
        return view('medic.all', compact('medics'));
    }
}


