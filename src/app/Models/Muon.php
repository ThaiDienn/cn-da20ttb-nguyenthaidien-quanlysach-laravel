<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class Muon extends Model
{
    use HasFactory;

    protected $table = 'muon';
    // Định nghĩa mối quan hệ với bảng "users"
    public function getAllMuon()
    {
        $muon = DB::table($this->table)
        ->select('muon.*', 'products.tensach as product_name', 'users.fullname as user_name', 'users.email as user_email')
        ->join('products', 'muon.id_product', '=', 'products.id')
        ->join('users', 'muon.id_muon', '=', 'users.id')
        ->orderBy('muon.ngaymuon', 'DESC')
        ->get();

        return $muon;
        // return Muon::select('muon.id', 'users.fullname as user_name', 'users.email as user_email',
        // 'products.tensach as product_name', 'muon.ngaymuon', 'muon.ngaytra')
        //     ->join('users', 'muon.id_muon', '=', 'users.id')
        //     ->join('products', 'muon.id_product', '=', 'products.id')
        //     ->orderBy('muon.ngaymuon', 'DESC')
        //     ->get();
    }
    public function addMuon($data)
    {
        return DB::table($this->table)->insert($data);

        // return DB::table($this->table)->insert($data);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_muon');
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'id_product');
    }
    public function QueryBuilder()
    {

    }
}
