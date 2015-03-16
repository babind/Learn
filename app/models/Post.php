<?php
 use Carbon\Carbon;
class Post extends \Eloquent {
	protected $fillable = ['title','body'];

  public static $rules = array(
    'title' => 'required',
    'body' => 'required');

  public function user(){

    return $this->belongsTo('User');

  }

  public function categories(){

    return $this->belongsToMany('Category');
  }

  public function scopeRecent($query){

    return $query->where('created_at','>=',Carbon\Carbon::now()->subweek())->get();
  }

}