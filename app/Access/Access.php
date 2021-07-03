<?php
namespace App\Access;
use Yajra\DataTables\DataTables;
use DB;

class Access
{
    private $tableName;

	public function __construct($tableName)
	{
		$this->tableName = $tableName;
    }

    public function getList(){
        return DB::table($this->tableName)->get();
    }

    public function getListDatatable(){
        return Datatables::of( $this->getList() )
        ->addColumn('Actions', function($data) {
            return '<button type="button" data-id="'.$data->id.'" class="btn base-bg-primary text-white btn-sm btn-edit" id="getEditData">Edit</button>
                    <button type="button" data-id="'.$data->id.'" class="btn base-bg-yellow text-white btn-sm btn-delete" data-toggle="modal" data-target="#DeleteModal">Delete</button>';
        })
        ->rawColumns(['Actions'])
        ->make(true);
    }

    public function getById($id){
        return DB::table($this->tableName)->where('id', $id)->first();
    }

    public function store($array_value){
        return DB::table($this->tableName)->insert($array_value);
    }

    public function update($array_value, $id){
        return DB::table($this->tableName)->where('id', $id)->update($array_value);
    }

    public function delete($id){
        return DB::table($this->tableName)->where('id', $id)->delete();
    }
}
