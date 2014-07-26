<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	//Allow for mass assignment
	protected $guarded = array('password', 'remember_token');
	//validate rules here
	
  Public static $rules = array(
   	            'Names' => 'required',
   	            'phone' => 'require|numeric|unique:users',
   	            'Marital status' => 'required',
   	      
   	             'gender' => 'required',
   	);

    Public static $updateRules = array(
   	            'Names' => 'required',
   	            'phone' => 'require|numeric',
   	            'Marital status' => 'required',
   	      
   	             'gender' => 'required',
   	);
}

