<?php 
class Courrier {
    private $type;
    private $ref;
    public function __construct($type, $ref) {
        $this->type = $type;
        $this->ref = $ref;
    }
}