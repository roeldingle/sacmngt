<?php

namespace Modules\Role\Entities;

use Illuminate\Database\Eloquent\Model;

use Modules\User\Entities\User;

class Role extends Model
{
    protected $fillable = ['name','description', 'is_active'];

    public $timestamps = false;

     /*
        function to get role serach
    */
    public static function getRoleSearch($request){

        $per_page = config('app.default_table_limit');

        /*default value*/
        $roles = Role::active()->orderBy('id','DESC')->paginate($per_page);

        /*check if there are serach parameter*/
        if ($request->input('search_param') !== "" && $request->has('search_param') && $request->has('search')) {

            $search['search_param'] = $request->input('search_param');
            $search['search'] = $request->input('search');

            $roles = Role::active()->where($search['search_param'],'LIKE','%'.$search['search'].'%')->paginate($per_page);


        }


        return $roles;
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
