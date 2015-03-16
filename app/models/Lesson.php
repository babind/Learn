<?php

class Lesson extends \Eloquent{
	protected $fillable=['title','body'];
	protected $hidden=['title'];
}
