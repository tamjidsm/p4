<?php

class Blog extends Eloquent {
 public function blogger() {
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('Blogger');
    }

     public function catelogs() {
        # Books belong to many Tags     
        return $this->belongsToMany('Catelog');
    }

    public static function search() {
            # Eager load tags and author
        $blogs = Blog::with('blogger')->get();        
        return $blogs;
    }

}