<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Products;

class CatagoriesController extends Controller
{
    private $products;
    const _PER_PAGE = 3;

    private function storeImage($file)
    {
        $path = $file->store('public/images');
        return asset(str_replace('public', 'storage', $path));
    }

    public function __construct()
    {
        $this->products = new Products();
    }

    public function products()
    {
        $title = 'Sản phẩm';
        $product = DB::table('SELECT * FROM products ORDER BY ngaythem DESC');


        $all_cate = DB::table('loaisach')
            ->orderby('id', 'asc')
            ->get();

        $all_product = DB::table('products')
            ->orderby('id', 'asc')
            ->get();

        return view('clients.product', compact('title', 'product'))
            ->with('all_product', $all_product)
            ->with('all_cate', $all_cate);
    }


    public function products_admin()
    {
        $title = 'Quản lý Sản phẩm';
        $product = DB::table('SELECT * FROM products ORDER BY ngaythem DESC');

        $all_cate = DB::table('loaisach')
            ->orderby('id', 'asc')
            ->get();

        $all_product = DB::table('products')
            ->orderby('id', 'asc')
            ->get();

        return view('clients.product_admin', compact('title', 'product'))
            ->with('all_product', $all_product)
            ->with('all_cate', $all_cate);
    }

    public function allProducts(Request $request)
    {
        $title = 'Tất cả sản phẩm';
        $filters = [];
        $product = new Products();
        $all_product = DB::table('products')
            ->select('products.id as product_id', 'products.*', 'loaisach.*')
            ->join('loaisach', 'products.maloai', '=', 'loaisach.id')
            ->orderby('products.id', 'asc')
            ->get();

        return view('clients.allProduct_admin', compact('title'))
            ->with('all_product', $all_product);
    }

    //load form
    public function getProduct()
    {
        $title = 'Thêm sản phẩm';
        return view('clients.add_product_admin', compact('title'));
    }

    public function delete($id = 0) // xóa
    {
        if (!empty($id)) {
            $productDetail = $this->products->getDetail($id);
            if (!empty($productDetail[0])) {
                $deleteStatus = $this->products->deleteProduct($id);
                if ($deleteStatus) {
                    $msg = 'Xóa sản phẩm thành công';
                } else {
                    $msg = 'Bạn không thể xóa sản phẩm lúc này. Vui lòng thử lại sau';
                }
            } else {
                $msg = 'Sản phẩm không tồn tại';
            }
        } else {
            $msg = 'Liên kết không tồn tại';
        }

        return redirect()->route('allproduct')->with('msg', $msg);
    }

    public function postProduct(Request $request)
    {

        $data = array();

        $data['tensach'] = $request->input('name');
        $data['tacgia'] = $request->input('tacgia');
        $data['tinhtrang'] = $request->input('status');
        $data['maloai'] = $request->input('maloai');
        $data['ngaythem'] = date('Y-m-d H:i:s');

        // dd($data);
        if (empty($data['tensach'])) {
            return redirect()->route('getproduct')->with('msg', 'Vui lòng nhập tên sách!');
        }

        // Kiểm tra 'tacgia'
        if (empty($data['tacgia'])) {
            return redirect()->route('getproduct')->with('msg', 'Vui lòng nhập tác giả!');
        }

        // Kiểm tra 'maloai'
        if (empty($data['maloai'])) {
            return redirect()->route('getproduct')->with('msg', 'Vui lòng nhập mã loại!');
        }

        $get_image = $request->file('file'); 

        if (empty($get_image)) {
            return redirect()->route('getproduct')->with('msg', 'Vui lòng chọn hình ảnh!');
        }

        // 
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $new_image = current(explode('.', $get_name_image));
            $new_image = $new_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/product', $new_image); 
            $data['hinhsach'] = $new_image;
            DB::table('products')->insert($data);
            return redirect()->route('allproduct')->with('msg', 'Thêm sản phẩm thành công!');
        }

        $data['hinhsach'] = '';
        DB::table('products')->insert($data);
        return redirect()->route('allproduct')->with('msg', 'Thêm sản phẩm thành công!');
    }


    public function edit_product($product_id)
    {
        $title = 'Sửa sản phẩm';
        $edit_product = DB::table('products')
        ->select('products.id as product_id', 'products.*', 'loaisach.*')
        ->join('loaisach', 'products.maloai', '=', 'loaisach.id')
        ->where('products.id', $product_id)->get();
        return view('clients.edit_product_admin', compact('title'))
        ->with('edit_product', $edit_product);
    }

    public function update_product(Request $request, $product_id)
    {
        $data = array();
        $data['tensach'] = $request->input('name');
        $data['tacgia'] = $request->input('tacgia');
        $data['tinhtrang'] = $request->input('status');
        $data['maloai'] = $request->input('maloai');
        // $data['ngaythem'] = date('Y-m-d H:i:s');

        if (empty($data['tensach'])) {
            return redirect()->route('edit_product', ['product_id' => $product_id])->with('msg', 'Vui lòng nhập tên sách!');
        }

        // Kiểm tra 'tacgia'
        if (empty($data['tacgia'])) {
            return redirect()->route('edit_product', ['product_id' => $product_id])->with('msg', 'Vui lòng nhập tác giả!');
        }

        // Kiểm tra 'maloai'
        if (empty($data['maloai'])) {
            return redirect()->route('edit_product', ['product_id' => $product_id])->with('msg', 'Vui lòng nhập mã loại!');
        }

        $get_image = $request->file('file'); 

        $image = '';

        if($request->file('product_image') == null){
            $image = DB::table('products')->where('id', $product_id)->value('hinhsach');
            // dd($image);
        }

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $new_image = current(explode('.', $get_name_image));
            $new_image = $new_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/product', $new_image);
            $data['hinhsach'] = $new_image;
            DB::table('products')->where('id', $product_id)->update($data);
            
            return redirect()->route('allproduct')->with('msg', 'Cập nhật sản phẩm thành công!');
        }
        $data['hinhsach'] = $image;
        DB::table('products')->where('id', $product_id)->update($data);
        return redirect()->route('allproduct')->with('msg', 'Cập nhật sản phẩm thành công!');

    }


    // Trang danh mục sản phẩm 
    public function show_category_home($category_id)
    {
        $title = 'Sản phẩm';
        $product = DB::table('SELECT * FROM products ORDER BY ngaythem DESC');

        $product_by_category_id = DB::table('products')
            ->select('products.id as product_id', 'products.*', 'loaisach.*')
            ->join('loaisach', 'products.maloai', '=', 'loaisach.id')
            ->where('products.maloai', $category_id)
            ->get();

        $all_cate = DB::table('loaisach')
            ->orderby('name', 'asc')
            ->get();

        return view('clients.product_by_category', compact('title', 'product'))
            ->with('product_by_category_id', $product_by_category_id)
            ->with('all_cate', $all_cate);
    }

    // -----------------
    // Chi tiết sản phẩm
    public function details_product($product_id)
    {
        $title = 'Chi tiết Sản phẩm';
        $product = DB::table('SELECT * FROM products ORDER BY ngaythem DESC');

        $all_cate = DB::table('loaisach')
            ->orderby('id', 'asc')
            ->get();

        $details_product = DB::table('products')
            ->join('loaisach', 'products.maloai', '=', 'loaisach.id')
            ->where('products.id', $product_id)->get();

        return view('clients.show_details', compact('title', 'product'))
            ->with('all_cate', $all_cate)
            ->with('details_product', $details_product);
    }
}
