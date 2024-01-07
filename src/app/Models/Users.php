<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function getAllUsers($filters = [], $keywords = null, $perPage = null)
    {
        $users = DB::table($this->table)
            ->select('users.*', 'groups.name as group_name')
            ->join('groups', 'users.group_id', '=', 'groups.id')
            ->orderBy('users.create_at', 'DESC');
        if (!empty($filters)) {
            $users = $users->where($filters);
        }

        //search
        if (!empty($keywords)) {
            $users = $users->where(function ($query) use ($keywords) {
                $query->orWhere('fullname', 'like', '%' . $keywords . '%');
                $query->orWhere('email', 'like', '%' . $keywords . '%');
            });
        }
        if (!empty($perPage)) {
            $users = $users->paginate($perPage)->withQueryString(); //  số bản ghi trên một trang
        } else {
            $users = $users->get();
        }
        return $users;
    }

    public function addUser($data)
    {
        return DB::table($this->table)->insert($data);
    }
//xóa
    public function getDetail($id)
    {
        return DB::select('SELECT * FROM ' . $this->table . ' WHERE id=? ', [$id]);
    }
//cập nhật
    public function updateUser($data, $id)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }

    public function deleteUser($id)
    {
        return DB::table($this->table)->where('id', $id)->delete();
    }
    public function QueryBuilder(){
        
    }
}
