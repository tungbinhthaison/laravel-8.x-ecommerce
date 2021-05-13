<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.blog.category.index');
    }

    public function getList(){
        $blog_category = DB::table('blog_category')->get();
        return Datatables::of($blog_category)->make(true); 
    }
}
