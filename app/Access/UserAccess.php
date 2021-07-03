<?php

namespace App\Access;
use App\Access\Access;
use Yajra\DataTables\DataTables;
use DB;

class UserAccess extends Access
{
    private $tableName = 'users';

	public function __construct()
	{
		parent::__construct($this->tableName);
    }

}
