<?php
class Blogger extends Eloquent {
	/**
	* Identify relation between Author and Book
	*/
	public function blog() {
        # Define a one-to-many relationship.
        return $this->hasMany('Blog');
    }
  
    public static function getIdNamePair() {
		$bloggers = Array();
		$collection = Blogger::all();
		foreach($collection as $blogger) {
			$bloggers[$blogger->id] = $blogger->name;
		}
		return $bloggers;
	}

	 public static function getNameIdPair() {
		$bloggers = Array();
		$collection = Blogger::all();
		foreach($collection as $blogger) {
			$bloggers[$blogger->name] = $blogger->id;
		}
		return $bloggers;
	}

}