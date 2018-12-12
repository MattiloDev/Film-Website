<?
/**
 * review.class.php 
 * 
 * Class to handle review objects
 * 
 */





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
