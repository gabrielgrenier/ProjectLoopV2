<?php
class Alert{
    private $message, $type;
    
    public function getMessage(){
        return $this->message;
    }
    public function getType(){
        return $this->type;
    }
    
    public function setMessage($value){
        $this->message = $value;
    }
    public function setType($value){
        $this->type = $value;
    }
}

?>