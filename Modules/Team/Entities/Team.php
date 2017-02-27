<?php

namespace Modules\Team\Entities;

use Illuminate\Database\Eloquent\Model;


class Team extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'teams';

    protected $fillable = ['department_id','name','description','leader_id', 'is_active'];

    public $timestamps = false;

     /*
        function to get team serach
    */
    public static function getTeamSearch($request){

        $per_page = config('app.default_table_limit');

        /*default value*/
        $teams = Team::active()->orderBy('id','DESC')->paginate($per_page);

        /*check if there are serach parameter*/
        if ($request->input('search_param') !== "" && $request->has('search_param') && $request->has('search')) {

            $search['search_param'] = $request->input('search_param');
            $search['search'] = $request->input('search');

            $teams = Team::active()->where($search['search_param'],'LIKE','%'.$search['search'].'%')->paginate($per_page);


        }


        return $teams;
    }

    public function department()
    {
        return $this->belongsTo('Modules\Department\Entities\Department');
    }

    public function leader()
    {
        return $this->hasOne('Modules\User\Entities\User', 'id', 'leader_id');
    }

    public function members()
    {
    	return $this->hasMany('Modules\User\Entities\Meta', 'team_id')->orderBy('job_id','ASC');
    }


    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

}
