<?php

class myControllerServices extends modRestService {
    
    public function checkPermissions() {
        $this->modx->log(1,"wer");
        return false;
    }
    
}