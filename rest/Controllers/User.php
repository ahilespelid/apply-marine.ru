<?php

class myControllerUser extends modRestController {
    public $classKey = 'modUser';
    public $defaultSortField = 'id';
    public $defaultSortDirection = 'ASC';
    
    // авторизация пользователя
    public function post(){
        
        $_POST = $_REQUEST;
        
        $logindata = array(
          'username' => $_POST['login'],
          'password' => $_POST['password'],
          'rememberme' => true
        );
        $response = $this->modx->runProcessor('/security/login', $logindata);
        if(!$return_data){
            if($response->isError()) {
                return $this->success('',["request" => ["test" => 1,"test2" => "text"]]);
            }
            // токен пользователя test tpnp569jind6itrl3opv242660 (ip6k0lvjok87t0tkdbnnrpiqn0)
            $profile = $this->modx->getObject("modUserProfile",["email" => $_POST['login']]);
            
            return $this->success('',["request" => $_REQUEST]);
        } else {
            return $this->success('',["request" => array("data" => "Ошибка авторизации")]);
        }

        
    }
    
    public function put(){
        return $this->failure("Метод не разрешон");
    }
    
    public function delete(){
        return $this->failure("Метод не разрешон");
    }
    
    public function get(){
        
        $this->modx->log(1,print_r($this->getHeaders(),1));
        
        /*
        (
            [Cookie] => PHPSESSID=i90jn3fjnlt185hmv4snclpgio
            [Connection] => keep-alive
            [Accept-Encoding] => gzip, deflate, br
            [Host] => test.apply-marine.ru
            [Postman-Token] => 0e55c831-8e50-4cdf-b0b7-83e15b3509c4
            [Cache-Control] => no-cache
            [User-Agent] => PostmanRuntime/7.29.0
            [Authorisation] => Bearer i90jn3fjnlt185hmv4snclpgio
            [Referer] => 
        )
        
        */
        
        return $this->success('',["array" => 123]);
    }
    
    
}