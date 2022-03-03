<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
// use Products;
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
        $data = product::get();
        return view('home',['data' => $data ]);
    }



    public function adminHome()
    {
        $data = product::get();
        return view('adminHome',['data' => $data ]);
    }

    public  function add_product(Request $req)
    {

        $req->validate([
            'name' => 'required',
            'price'=>'required',
            'img'=>'required'
        ]);

        $input = array(
            'name' => $req->name,
            'price' => $req->price,
        );

        $img = "";
        if ($req->hasFile('img')) {
            $img = $req->file("img");
            $temp = time() . "." . $img->getClientOriginalExtension();
            $img->move(public_path("/images"), $temp);
            $input['img'] = $temp;
        }

        // return $input;
        if ($req->action == "add") {
            product::create($input);
            $msg = "Insete Successfully";
        }
        if ($req->action == "edit") {
            product::where("id", $req->id)->update($input);
            $msg = "Update Successfully";
        }
        return redirect("admin/home")->with('success', $msg);
    }

    public function edit_product($id)
    {
        $data = Product::all();
        $edit_data = Product::where("id", $id)->get()->first();
        return view("adminHome", compact("data", "edit_data"));
    }

    public function del_product($id)
    {
        $edit_data = Product::where("id", $id)->delete();
        return redirect("admin/home")->with('success', "Delete Successfully");
    }
}
