<?php

namespace CustNamespace; 

trait CustTrait {
    private $id;
    private $namacust;
    private $jeniscust;
    private $deskripsicust;
    private $membercust;

    public function __construct($namacust, $jeniscust, $deskripsicust, $membercust) {
        $this->namacust = $namacust;
        $this->jeniscust = $jeniscust;
        $this->deskripsicust = $deskripsicust;
        $this->membercust = $membercust;
    }

    public function getId() {
        return $this->id;
    }

    public function getNamacust() {
        return $this->namacust;
    }

    public function getJeniscust() {
        return $this->jeniscust;
    }

    public function getDeskripsicust() {
        return $this->deskripsicust;
    }

    public function getMembercust() {
        return $this->membercust;
    }
}
