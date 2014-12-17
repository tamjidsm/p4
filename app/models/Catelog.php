<?php
class Catelog extends Eloquent { 

    public function blogs() {
        # Tags belong to many Books
        return $this->belongsToMany('Blog');
    }

}