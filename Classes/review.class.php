<?php

class Review {

public $reviewer;
public $liked;
public $content;

}

function __construct($reviewer,$liked,$content) {

$this->reviewer = $reviewer;
$this->liked = $liked;
$this->content = $content;

}

function getName() {

return $this->reviewer;

}

function likedFilm(){

return $this->liked;

}

function getContent() {

return $this->content;

}