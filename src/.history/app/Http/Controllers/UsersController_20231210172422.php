<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Users;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdminRequest;


class UsersController extends Controller
{
    
    private $users;
    const _PER_PAGE = 3;

    public function __construct(){
        $this->users = new Users ();
    }
    public function index(Request $request){
        $title = 'Danh sách người dùng';

        $filters = [];// nhóm, trạng thái

        $keywords = null;//search
        // Xét trạng thái
        if(!empty($request->status)){
            $status = $request->status;
            if($status=='active'){
                $status = 1;
            }else{
                $status = 0;
            }
            $filters[] = ['users.status', '=', $status];
        }
        //nhóm
        if(!empty($request->group_id)){
            $groupID = $request->group_id;

            $filters[] = ['users.group_id', '=', $groupID];
        }

        //search
        if(!empty($request->keywords)){
            $keywords = $request->keywords;

            
        }

        $usersList = $this->users->getAllUsers($filters, $keywords, self::_PER_PAGE);

        $this->users->QueryBuilder();

        return view ('clients.users.list', compact('title', 'usersList'));
    }
    public function add(){
        $title = 'Thêm người dùng';

        $allGroups = getAllGroups();

        return view ('clients.users.add', compact('title', 'allGroups'));
    }

    public function postAdd(AdminRequest $request){

        
        $dataInsert = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'status' => $request->status,
            'create_at' => date('Y-m-d H:i:s')
            // date('Y-m-d H:i:s')


        ];
        $this->users->addUser($dataInsert);

        return redirect()->route('admin.index')->with('msg', 'Thêm người dùng thành công');
    } 
    
    //Sửa thông tin tài khoản
    public function getEdit(Request $request, $id=0){
        $title = 'Cập nhật người dùng';
        
        //Kiểm tra dữ liệu
        if(!empty($id)){
            $userDetail = $this->users->getDetail($id);
                if(!empty($userDetail[0])){
                    $request->session()->put('id', $id);
                    $userDetail = $userDetail[0];
                }else{
                    return redirect()->route('admin.index')->with('msg', 'Người dùng không tồn tại');
                }
        }else{
            return redirect()->route('admin.index')->with('msg', 'Tài khoản không tồn tại');
        }
        $allGroups = getAllGroups();

        return view ('clients.users.edit', compact('title', 'userDetail', 'allGroups'));
    }

    public function postEdit(AdminRequest $request){
        $id = session('id');
        //tăng tính bảo mật
        if (empty($id)){  //1
            return back()->with('msg', 'Liên kết không tồn tại');//1
        }

        $dataUpdate = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'status' => $request->status,
            'update_at' => date('Y-m-d H:i:s')
        ];
        $this->users->updateUser($dataUpdate, $id);

        return back()->with('msg','Cập nhật người dùng thành công');
    }

    public function delete($id=0){
        if(!empty($id)){
            $userDetail = $this->users->getDetail($id);
                if(!empty($userDetail[0])){
                    $deleteStatus =  $this->users->deleteUser($id);
                    if ($deleteStatus){
                        $msg = 'Xóa người dùng thành công';
                    }else{
                        $msg = 'Bạn không thể xóa người dùng lúc này. Vui lòng thử lại sau';
                    }
                }else{
                    $msg = 'Người dùng không tồn tại';
                }
        }else{
            $msg = 'Liên kết không tồn tại';
        } 

        return redirect()->route('admin.index')->with('msg', $msg);
    }
}
