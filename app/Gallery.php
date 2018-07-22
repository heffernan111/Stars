<?php
class Gallery extends Eloquent {

  protected $table = 'gallerys';

  protected $fillable = array('name','description','cover_image');

  public function Photos(){

    return $this->has_many('images');
  }
}