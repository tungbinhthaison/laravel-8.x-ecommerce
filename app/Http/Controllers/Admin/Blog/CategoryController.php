<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Access\Blog\CategoryAccess;

class CategoryController extends Controller
{
	private $categoryAccess;

	public function __construct(CategoryAccess $categoryAccess)
	{
		$this->categoryAccess = $categoryAccess;
    }
    
    public function index(){
        return view('admin.blog.category.index');
    }
    
    public function add(){
        $compact['listCategory'] = $this->categoryAccess->getList();
        return view('admin.blog.category.add', $compact);
    }

    public function store(Request $request){
        $array_value = [
            'parent_id' => $request->select_category,
            'title'     => $request->input_title,
            'slug'      => $request->input_slug,
            'content'   => $request->txta_content
        ];

        $this->categoryAccess->store($array_value);
        return redirect('/admin/blog/category/index');
    }

    public function edit($id){
        $compact['listCategory'] = $this->categoryAccess->getList();
        $compact['category'] = $this->categoryAccess->getById($id);
        return view('admin.blog.category.edit', $compact);
    }

    public function update(Request $request, $id){
        $array_value = [
            'parent_id' => $request->select_category,
            'title'     => $request->input_title,
            'slug'      => $request->input_slug,
            'content'   => $request->txta_content
        ];

        $this->categoryAccess->update($array_value, $id);
        return redirect('/admin/blog/category/index');
        
    }

    public function delete($id){
        return $this->categoryAccess->delete($id);
    }
}
