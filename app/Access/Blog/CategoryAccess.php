<?php

namespace App\Access\Blog;
use App\Access\Access;
use Yajra\DataTables\DataTables;
use DB;

class CategoryAccess extends Access
{
    private $tableName = 'blog_category';

	public function __construct()
	{
		parent::__construct($this->tableName);
    }
}
