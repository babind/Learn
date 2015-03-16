<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	 protected $fillable=['email','password'];

	protected $table = 'users';

  public static $rules = array('
    email' => 'required',
    'password' => 'required');

	protected $hidden = array('password', 'remember_token');

	public function posts(){

		 return $this->hasMany('Post');
	}

}
