<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class AdminController extends Controller{

    public function index()
    {
        return view('admin.admin_login');

    }

    public function show_dashboard()
    {
        $this->AdminAuthCheck();
        return view('admin.dashboard');
    }

    public function dashboard(Request $re)
    {
        $admin_email = $re->admin_email;
        $admin_password = $re->admin_password;
        $admin = DB::table('tbl_admin')
            ->where('admin_email', $admin_email)
            ->where('admin_password', $admin_password)
            ->first();
        //return response()->json($admin);
        if ($admin) {
            session::put('admin_name', $admin->admin_name);
            session::put('admin_id', $admin->admin_id);
            return Redirect::to('/dashboard');
        } else {
            session::put('message', 'Email or password invalid');
            return Redirect::to('/admin');
        }
    }

    public function admin_logout()
    {
        Session::flush();
        return Redirect::to('/admin');
    }
    public function AdminAuthCheck(){
        $admin_id=Session::get('admin_id');
            if($admin_id){
                return;
            }else{
                return Redirect::to('/admin')->send();
            }

    }

    //add category


    public function add_category()
    { $this->AdminAuthCheck();
        return view('admin.add_category');
    }

    public function all_category()
    { $this->AdminAuthCheck();
        $manage_category = DB::table('tbl_category')->get();

        return view('admin.all_category', compact('manage_category'));
    }

    public function save_category(Request $re)
    {
        $data['category_id'] = $re->category_id;
        $data['category_name'] = $re->category_name;
        $data['category_description'] = $re->category_description;
        $data['publication_status'] = $re->publication_status;
        DB::table('tbl_category')->insert($data);
        Session::put('message', 'category added successfully!!');
        return redirect()->back();
    }

    public function unactive_category($category_id)
    {
        DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->update(['publication_status' => 0]);
        Session::put('message', 'unactive successfully!!');
        return redirect()->back();

    }

    public function active_category($category_id)
    {
        DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->update(['publication_status' => 1]);
        Session::put('message', 'activated successfully!!');
        return redirect()->back();

    }

    public function edit_category($category_id)
    {
        $this->AdminAuthCheck();
        $update_category = DB::table('tbl_category')->where('category_id', $category_id)->first();

        return view('admin.edit_category', compact('update_category'));

    }

    public function update_category(Request $re, $category_id)
    {
        $data = array();
        $data['category_id'] = $category_id;
        $data['category_name'] = $re->category_name;
        $data['category_description'] = $re->category_description;
        DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->update($data);
        Session::get('message', 'updated successfully!!');
        return redirect('all-category');
    }

    public function delete_category($category_id)
    {
        DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->delete();
        Session::get('message', 'deleted successfully!!');
        return redirect('all-category');


    }

//manufacture
    public function add_manufacture()
    {  $this->AdminAuthCheck();
        return view('admin.add_manufacture');
    }
    public function save_manufacture(Request $re)
    {
        $data['manufacture_id'] = $re->manufacture_id;
        $data['manufacture_name'] = $re->manufacture_name;
        $data['manufacture_description'] = $re->manufacture_description;
        $data['publication_status'] = $re->publication_status;
        DB::table('tbl_manufacture')->insert($data);
        Session::put('message', 'manufacture added successfully!!');
        return redirect()->back();
    }

    public function all_manufacture()
    {  $this->AdminAuthCheck();
        $manage_manufacture = DB::table('tbl_manufacture')->get();

        return view('admin.all_manufacture', compact('manage_manufacture'));
    }

    public function unactive_manufacture($manufacture_id)
    {
        DB::table('tbl_manufacture')
            ->where('manufacture_id', $manufacture_id)
            ->update(['publication_status' => 0]);
        Session::put('message', 'unactive successfully!!');
        return redirect()->back();

    }
    public function active_manufacture($manufacture_id)
    {
        DB::table('tbl_manufacture')
            ->where('manufacture_id', $manufacture_id)
            ->update(['publication_status' => 1]);
        Session::put('message', 'activated successfully!!');
        return redirect()->back();

    }
    public function edit_manufacture($manufacture_id)
    {   $this->AdminAuthCheck();

        $update_manufacture = DB::table('tbl_manufacture')->where('manufacture_id', $manufacture_id)->first();

        return view('admin.edit_manufacture', compact('update_manufacture'));

    }
    public function update_manufacture(Request $re, $manufacture_id)
    {
        $data = array();
        $data['manufacture_id'] = $manufacture_id;
        $data['manufacture_name'] = $re->manufacture_name;
        $data['manufacture_description'] = $re->manufacture_description;
        DB::table('tbl_manufacture')
            ->where('manufacture_id', $manufacture_id)
            ->update($data);
        Session::get('message', 'updated successfully!!');
        return redirect('all-manufacture');
    }
    public function delete_manufacture($manufacture_id)
    {
        DB::table('tbl_manufacture')
            ->where('manufacture_id', $manufacture_id)
            ->delete();
        Session::get('message', 'deleted successfully!!');
        return redirect('all-manufacture');


    }
    //add products
    public function add_product()
    {  $this->AdminAuthCheck();
        return view('admin.add_product');
    }
    public function save_product(Request $re){
        $data= array();
        $data['product_name']=$re->product_name;
        $data['category_id']=$re->category_id;
        $data['manufacture_id']=$re->manufacture_id;
        $data['product_short_description']=$re->product_short_description;
        $data['product_long_description']=$re->product_long_description;
        $data['product_price']=$re->product_price;
        $data['product_size']=$re->product_size;
        $data['product_color']=$re->product_color;
        $data['publication_status']=$re->publication_status;
        $image=$re->file('product_image');
            if($image) {
            $image_name = rand();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
            $data['product_image'] = $image_url;
            DB::table('tbl_product')->insert($data);
            Session::put('message', 'added successfully!!');
            return Redirect::to('/add_product');
            }
            }
            $data['product_image']='';
            $dat=DB::table('tbl_product')->insert($data);
            //Session::put('message','added successfully without image!!');
            //return Redirect::to('/add_product');
            return response()->json($dat);

            }

    public function all_product()
    {    $this->AdminAuthCheck();
        $manage_product = DB::table('tbl_product')
                         ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
                         ->join('tbl_manufacture','tbl_product.manufacture_id','=','tbl_manufacture.manufacture_id')
            ->select('tbl_product.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                         ->get();

        return view('admin.all_product', compact('manage_product'));
    }

    public function unactive_product($product_id)
    {
        DB::table('tbl_product')
            ->where('product_id', $product_id)
            ->update(['publication_status' => 0]);
        Session::put('message', 'unactive successfully!!');
        return redirect()->back();

    }

    public function active_product($product_id)
    {
        DB::table('tbl_product')
            ->where('product_id', $product_id)
            ->update(['publication_status' => 1]);
        Session::put('message', 'activated successfully!!');
        return redirect()->back();

;

    }

    public function edit_product($product_id)
    {
        $this->AdminAuthCheck();
        $update_product = DB::table('tbl_product')->where('product_id', $product_id)->first();

        return view('admin.edit_product', compact('update_product'));

    }

    public function update_product(Request $re, $product_id)
    {
        $data = array();
        $data['product_id'] = $product_id;
        $data['product_name'] = $re->product_name;
        $data['category_id'] = $re->category_id;
        $data['manufacture_id'] = $re->manufacture_id;
        $data['product_short_description'] = $re->product_short_description;
        $data['product_price'] = $re->product_price;
        $data['product_size'] = $re->product_size;
        $data['product_color'] = $re->product_color;
        DB::table('tbl_product')
            ->where('product_id', $product_id)
            ->update($data);
        Session::get('message', 'updated successfully!!');
        return redirect('all-product');
    }

    public function delete_product($product_id)
    {
        DB::table('tbl_product')
            ->where('product_id', $product_id)
            ->delete();
        Session::get('message', 'deleted successfully!!');
        return redirect('all_product');


    }


    ///slider
    public function add_slider(){
        return view('admin.add_slider');
    }
    public function save_slider(Request $re){

         $data=array();
        $data['publication_status']=$re->publication_status;
        $image=$re->file('slider_image');
        if($image) {
            $image_name = rand();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'slider/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['slider_image'] = $image_url;
                DB::table('tbl_slider')->insert($data);
                Session::put('message', 'added successfully!!');
                return Redirect::to('/add_slider');
            }
        }
        $data['slider_image']='';
        $dat=DB::table('tbl_slider')->insert($data);
//Session::put('message','added successfully without image!!');
//return Redirect::to('/add_product');
        return response()->json($dat);


    }
    public function all_slider(){

        $manage_slider = DB::table('tbl_slider')->get();

        return view('admin.all_slider', compact('manage_slider'));
        }
    public function unactive_slider($slider_id)
    {
        DB::table('tbl_slider')
            ->where('slider_id', $slider_id)
            ->update(['publication_status' => 0]);
        Session::put('message', 'unactive successfully!!');
        return redirect()->back();

    }

    public function active_slider($slider_id)
    {
        DB::table('tbl_slider')
            ->where('slider_id', $slider_id)
            ->update(['publication_status' => 1]);
        Session::put('message', 'activated successfully!!');
        return redirect()->back();

    }
    public function delete_slider($slider_id)
    {
        DB::table('tbl_slider')
            ->where('slider_id', $slider_id)
            ->delete();
        Session::get('message', 'deleted successfully!!');
        return redirect()->back();


    }
//show product by category
    public function show_product_by_category($category_id){


        $manage_product_by_category = DB::table('tbl_product')
            ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
            ->join('tbl_manufacture','tbl_product.manufacture_id','=','tbl_manufacture.manufacture_id')
            ->where('tbl_product.publication_status',1)
            ->where('tbl_product.category_id',$category_id)
            ->select('tbl_product.*','tbl_category.category_name','tbl_manufacture.manufacture_name')

            ->get();

        return view('pages.category_show_by_product', compact('manage_product_by_category'));

    }
    public function show_product_by_manufacture($manufacture_id){


        $manage_product_by_manufacture = DB::table('tbl_product')
            ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
            ->join('tbl_manufacture','tbl_product.manufacture_id','=','tbl_manufacture.manufacture_id')
            ->where('tbl_product.publication_status',1)
            ->where('tbl_product.manufacture_id',$manufacture_id)
            ->select('tbl_product.*','tbl_category.category_name','tbl_manufacture.manufacture_name')

            ->get();

        return view('pages.manufacture_show_by_product', compact('manage_product_by_manufacture'));

    }public function product_details_by_id($product_id){


    $manage_product_by_details = DB::table('tbl_product')
        ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
        ->join('tbl_manufacture','tbl_product.manufacture_id','=','tbl_manufacture.manufacture_id')
        ->where('tbl_product.publication_status',1)
        ->where('tbl_product.product_id',$product_id)
        ->select('tbl_product.*','tbl_category.category_name','tbl_manufacture.manufacture_name')

        ->first();

    return view('pages.product_details', compact('manage_product_by_details'));

}


}

