<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Database\Query\Expression;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public $data =[];
    public function index(){
        $this->data['title'] = 'Trang chủ';
        $all_product = DB::table('products')
            ->orderby('id', 'asc')
            ->get();
        return view('clients.home', $this->data)->with('all_product', $all_product);
    }
    
    public function contact(){
        $this->data['title'] = 'Liên hệ';
        return view ('clients.contact', $this->data);
    }

    // public function contact_admin(){
    //     $this->data['title'] = 'Liên hệ';
    //     return view ('clients.contact_admin', $this->data);
    // }
    

}
