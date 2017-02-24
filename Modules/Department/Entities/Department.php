<?php

namespace Modules\Department\Entities;

use Illuminate\Database\Eloquent\Model;


class Department extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'departments';

    protected $fillable = ['name','description', 'is_active'];

    public $timestamps = false;

     /*
        function to get department serach
    */
    public static function getDepartmentSearch($request){

        $per_page = config('app.default_table_limit');

        /*default value*/
        $departments = Department::active()->orderBy('id','DESC')->paginate($per_page);

        /*check if there are serach parameter*/
        if ($request->input('search_param') !== "" && $request->has('search_param') && $request->has('search')) {

            $search['search_param'] = $request->input('search_param');
            $search['search'] = $request->input('search');

            $departments = Department::active()->where($search['search_param'],'LIKE','%'.$search['search'].'%')->paginate($per_page);


        }


        return $departments;
    }


    public function user()
    {
    	return $this->hasMany('Modules\User\Entities\User');
    }


    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

}
