<?php

namespace App\Access\Blog;
use App\Access\Access;
use Yajra\DataTables\DataTables;
use DB;

class ArticleAccess extends Access
{
    private $tableName = 'blog_article';

	public function __construct()
	{
		parent::__construct($this->tableName);
    }

}
