<?php 
namespace evalue\crud;
use Illuminate\Database\Eloquent\Model;
class TestModule extends Model
{
	protected $table = "test_modules";
	const CREATED_AT = 'created_date';
	const UPDATED_AT = 'updated_date';
	protected $primaryKey = 'test_module_id';
}
