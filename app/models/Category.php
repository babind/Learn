<?php

class Category extends \Eloquent {
	protected $fillable = ['name'];

  public static $rules = array(
                        'name' => 'required'
    );
  public function posts(){
    return $this->belongsToMany('Post');
  }
}