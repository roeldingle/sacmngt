<?php

namespace Modules\Job\Entities;

use Illuminate\Database\Eloquent\Model;


class Job extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'jobs';

    protected $fillable = ['department_id','name','description', 'is_active'];

    public $timestamps = false;

     /*
        function to get team serach
    */
    public static function getJobSearch($request){

        $per_page = config('app.default_table_limit');

        /*default value*/
        $jobs = Job::active()->orderBy('id','DESC')->paginate($per_page);

        /*check if there are serach parameter*/
        if ($request->input('search_param') !== "" && $request->has('search_param') && $request->has('search')) {

            $search['search_param'] = $request->input('search_param');
            $search['search'] = $request->input('search');

            $jobs = Job::active()->where($search['search_param'],'LIKE','%'.$search['search'].'%')->paginate($per_page);


        }


        return $jobs;
    }

    public function department()
    {
        return $this->belongsTo('Modules\Department\Entities\Department');
    }



    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

}
