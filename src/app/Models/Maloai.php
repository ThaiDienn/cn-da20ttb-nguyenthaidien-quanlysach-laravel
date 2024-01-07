<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
class Maloai extends Model
{
    use HasFactory;

    protected $table = 'loaisach';
    public function allMaloai(){
       $loaisach = DB::table($this->table)
        ->orderBy('name', 'ASC')
        ->get();
        return $loaisach;
    }
}
