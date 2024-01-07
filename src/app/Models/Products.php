<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';


    public function getAllProduct(){
        $product = DB::table($this->table)
        ->select('products.*', 'loaisach.name as maloai')
        ->join('loaisach', 'products.maloai', '=', 'loaisach.id')
        ->orderBy('ngaythem', 'DESC');
        // if (!empty($filters)) {
        //     $users = $product->where($filters);
        // }
        return $product;

    }
    public function addProduct($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function getDetail($id)
    {
        return DB::select('SELECT * FROM ' . $this->table . ' WHERE id=? ', [$id]);
        
    }
    public function updateProduct($data, $id)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }

    public function deleteProduct($id)
    {
        return DB::table($this->table)->where('id', $id)->delete();
    }
}
