<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Access\Blog\ArticleAccess;
use App\Access\Blog\CategoryAccess;
use Cookie;

class ArticleController extends Controller
{
    private $articleAccess;
    private $categoryAccess;

	public function __construct(
         ArticleAccess $articleAccess
        ,CategoryAccess $categoryAccess
    )
	{
        $this->articleAccess  = $articleAccess;
        $this->categoryAccess = $categoryAccess;
    }
    
    public function index(){  
        return view('admin.blog.article.index');
    }
    
    public function add(){
        $compact['listCategory'] = $this->categoryAccess->getList();
        return view('admin.blog.article.add', $compact);
    }

    public function store(Request $request){
        $array_value = [
            'author_id'     => $request->session()->get('CurrentUser')->id,
            'author_name'   => $request->session()->get('CurrentUser')->name,
            'title'         => $request->input_title,
            'category_id'   => $request->select_category,
            'short_content' => $request->input_short_content,
            'content'       => $request->txta_content,
            'published'     => $request->cb_publish_password
        ];

        $this->articleAccess->store($array_value);
        return redirect('/admin/blog/article/index');
    }

    public function edit($id){
        $compact['listCategory'] = $this->categoryAccess->getList();
        $compact['article'] = $this->articleAccess->getById($id);


        return view('admin.blog.article.edit', $compact);
    }

    public function update(Request $request, $id){
        $array_value = [
            'author_id'     => $request->session()->get('CurrentUser')->id,
            'author_name'   => $request->session()->get('CurrentUser')->name,
            'title'         => $request->input_title,
            'category_id'   => $request->select_category,
            'short_content' => $request->input_short_content,
            'content'       => $request->txta_content,
            'published'     => $request->cb_publish_password
        ];
        $this->articleAccess->update($array_value, $id);
        return redirect('/admin/blog/article/index');
    }

    public function delete($id){
        return $this->articleAccess->delete($id);
    }
}
