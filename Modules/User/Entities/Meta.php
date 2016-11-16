<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'meta_user';

	public $timestamps = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id','key', 'value'];

}