<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Muon;
use Illuminate\Http\Request;
use App\Models\Users;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdminRequest;
use Illuminate\View\View;
use App\Http\Requests\PhieuMuonRequest;
use Illuminate\Support\Facades\Session;

session_start();

class AdminController extends Controller
{
    private $users;

    const _PER_PAGE = 3;

    public function __construct()
    {
        $this->users = new Users();
        $this->muon = new Muon();
    }

    // public function index(Request $request)
    public function index(Request $request)
    {
        $title = 'Thông tin đọc giả';

        $filters = []; // nhóm, trạng thái

        $keywords = null; //search
        // Xét trạng thái
        if (!empty($request->status)) {
            $status = $request->status;
            if ($status == 'active') {
                $status = 1;
            } else {
                $status = 0;
            }
            $filters[] = ['users.status', '=', $status];
        }
        //nhóm
        if (!empty($request->group_id)) {
            $groupID = $request->group_id;

            $filters[] = ['users.group_id', '=', $groupID];
        }

        //search
        if (!empty($request->keywords)) {
            $keywords = $request->keywords;
        }

        $usersList = $this->users->getAllUsers($filters, $keywords, self::_PER_PAGE);

        $this->users->QueryBuilder();

        return view('clients.users.list', compact('title', 'usersList'));
    }

    

    public function all_user(Request $request)
    {
        $title = 'Thông tin đọc giả';

        $filters = []; // nhóm, trạng thái

        $keywords = null; //search
        // Xét trạng thái
        if (!empty($request->status)) {
            $status = $request->status;
            if ($status == 'active') {
                $status = 1;
            } else {
                $status = 0;
            }
            $filters[] = ['users.status', '=', $status];
        }
        //nhóm
        if (!empty($request->group_id)) {
            $groupID = $request->group_id;

            $filters[] = ['users.group_id', '=', $groupID];
        }

        //search
        if (!empty($request->keywords)) {
            $keywords = $request->keywords;
        }

        $usersList = $this->users->getAllUsers($filters, $keywords, self::_PER_PAGE);

        $this->users->QueryBuilder();

        return view('clients.users.list_admin', compact('title', 'usersList'));
    }



    public function add()
    {
        $title = 'Thêm người dùng';

        $allGroups = getAllGroups();

        return view('clients.users.add_admin', compact('title', 'allGroups'));
    }

    public function postAdd(AdminRequest $request)
    {
        $dataInsert = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'status' => $request->status,
            'create_at' => date('Y-m-d H:i:s')
        ];

        $this->users->addUser($dataInsert);
        return redirect()->route('all_user')->with('msg', 'Thêm người dùng thành công');
    }

    //Sửa thông tin tài khoản
    public function getEdit(Request $request, $id = 0)
    {
        $title = 'Cập nhật người dùng';

        //Kiểm tra dữ liệu
        if (!empty($id)) {
            $userDetail = $this->users->getDetail($id);
            if (!empty($userDetail[0])) {
                $request->session()->put('id', $id);
                $userDetail = $userDetail[0];
            } else {
                return redirect()->route('all_user');
            }
        }
        $allGroups = getAllGroups();

        return view('clients.users.edit_admin', compact('title', 'userDetail', 'allGroups'));
    }

    public function postEdit(AdminRequest $request) // xử lý sửa
    {
        $id = session('id');
        //tăng tính bảo mật
        if (empty($id)) {  //1
            return back()->with('msg', 'Liên kết không tồn tại'); //1
        }

        $dataUpdate = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'status' => $request->status,
            'update_at' => date('Y-m-d H:i:s')
        ];
        $this->users->updateUser($dataUpdate, $id);

        return back()->with('msg', 'Cập nhật người dùng thành công');
    }

    public function delete($id = 0) // xóa
    {
        if (!empty($id)) {
            $userDetail = $this->users->getDetail($id);
            if (!empty($userDetail[0])) {
                $deleteStatus = $this->users->deleteUser($id);
                if ($deleteStatus) {
                    $msg = 'Xóa người dùng thành công';
                } else {
                    $msg = 'Bạn không thể xóa người dùng lúc này. Vui lòng thử lại sau';
                }
            } else {
                $msg = 'Người dùng không tồn tại';
            }
        } else {
            $msg = 'Liên kết không tồn tại';
        }
        return redirect()->route('all_user')->with('msg', $msg);
    }


    // hien thị giao diện đăng nhập admin
    public function admin_index(Request $request)
    {
        $title = 'Đăng nhập';
        return view('clients.login.frmlogin_admin', compact('title'));
    }

    public function admin_dashboard(Request $request)
    {
        $title = 'Dash board - Admin';
        return view('clients.home_admin', compact('title'));
        // return view('clients.home', $this->data)->with('all_product', $all_product);
    }

    public function login_admin(Request $request)
    {
        $name = $request->admin_name;

        $password = $request->admin_password;

        if ($name == null) {
            return redirect('/admin')
                ->with('msg', 'Vui lòng điền tên người quản trị!');
        }

        if ($password == null) {
            return redirect('/admin')
                ->with('msg', 'Vui lòng điền mật khẩu!');
        }

        $result = DB::table('admins')->where('name', $name)->where('password', $password)->first();
        if ($result) {
            Session::put('admin_id', $result->id);
            Session::put('admin_name', $result->name);
            return redirect('/admin-dashboard')
                ->with('msg', 'Đăng nhập thành công');
        } else {
            return redirect('/admin')
                ->with('msg', 'Tên quản trị hoặc mật khẩu sai! Vui lòng kiểm tra lại');
        }
    }


    // Đăng xuất
    public function logout_admin()
    {
        Session::flush();
        return Redirect('/admin');
    }

    public function muon(Request $request)
    {
        $title = 'Danh sách đọc giả mượn sách';
        $this->users->QueryBuilder();

        $ds_muon = DB::table('muon')
            ->select('muon.id as id_phieumuon', 'muon.ngaymuon', 'muon.ngaytra', 'muon.sdt', 'users.*', 'products.id as id_sach', 'products.tensach')
            ->join('users', 'muon.id_muon', '=', 'users.id')
            ->join('products', 'muon.id_product', '=', 'products.id')
            ->orderby('ngaymuon', 'desc')
            ->get();

        return view('clients.users.listmuon_admin', compact('title'))
            ->with('ds_muon', $ds_muon);
    }


    public function getMuon()
    {
        $title = 'Thêm người mượn';
        $allMaloai = getAllMaloai();
        return view('clients.users.addmuon_admin', compact('title'));
    }

    public function postMuon(PhieuMuonRequest $request)
    {
        // $muons = Muon::with(['user', 'product'])->get();
        // $Insert = [
        //     'sdt' => $request->sdt,
        //     'user_name' => $request->user_name,
        //     'user_email' => $request->user_email,
        //     'product_name' => $request->product_name,
        //     'ngaytao' => date('Y-m-d H:i:s')
        // ];
        // $this->muon->addMuon($Insert);
        // return redirect()->route('admin.listmuon')->with('msg', 'Thêm người dùng thành công');

        $data = array();
        $data['sdt'] = $request->input('sdt');
        $data['user_name'] = trim($request->input('user_name'));
        $data['user_email'] = trim($request->input('user_email'));
        // $data['product_name'] = $request->input('product_name');
        $data['product_name'] = trim($request->input('product_name'));
        $data['id_muon'] = null;

        $productId = DB::table('products')
            ->where('tensach', $data['product_name'])
            ->value('id');

        $idUser = DB::table('users')
            ->where('fullname', $data['user_name'])
            ->where('email', $data['user_email'])
            ->value('id');

        $existingProduct = DB::table('products')
            ->where('tensach', $data['product_name'])
            ->first();

        if (!$idUser) {
            return redirect()->route('admin.postmuon')
                ->with('msg', 'Tài khoản người mượn không tồn tại! Vui lòng tạo tài khoản người mượn!');
        } elseif (!$existingProduct) {
            return redirect()->route('admin.postmuon')
                ->with('msg', 'Sách không tồn tại! Vui lòng nhập lại tên sách!');
        } else {
            $muonData = [
                'sdt' => $data['sdt'],
                'id_muon' => $idUser,
                'id_product' => $existingProduct->id,
                'ngaymuon' => now(),
            ];

            DB::table('muon')->insert($muonData);
            return redirect()->route('admin.listmuon')->with('msg', 'Tạo phiếu mượn thành công!');
        }
        // return redirect()->route('admin.listmuon')->with('msg', 'Tạo phiếu mượn thành công!');
    }


    public function cap_nhat_ngay_tra($phieumuon_id)
    {
        DB::table('muon')
            ->where('id', $phieumuon_id)
            ->update(['ngaytra' => now()]);
        return redirect()->route('admin.listmuon')->with('msg', 'Cập nhật ngày trả thành công!');
    }
}
