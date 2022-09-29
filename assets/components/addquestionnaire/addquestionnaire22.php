<?php

define('MODX_API_MODE', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/index.php');

$modx = new modX();
$modx->initialize('web');

// Подключаем
/*define('MODX_API_MODE', true);
require $_SERVER['DOCUMENT_ROOT'].'/index.php';

// Включаем обработку ошибок
$modx->getService('error','error.modError');
$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'HTML');*/

$data = $_REQUEST;

$modx->log(1,print_r($data,1));

if(array_key_exists("id",$_GET) && $_GET["id"] > 0)
{
    $sql = "SELECT * FROM user_questionnaire WHERE user_id = " . $_GET["id"];
    $result = $modx->query($sql);
    
    if (is_object($result)) {
        $user_data = $result->fetch(PDO::FETCH_ASSOC);
        
        echo json_encode(array(
            "action" => "get",
            "message" => "Данные получены",
            "data" => $user_data,
            "error" => 0
        ));
    }
    else {
        echo json_encode(array(
            "action" => "get",
            "message" => "Данные для анкеты пользователя отсутствуют",
            "error" => 1
        ));
    }
    
    
}
else if(!array_key_exists("id",$_GET))
{
    $user_id = $data["user_id"];
    $createon = time();
    $editedon = time();
    
    $user_prop = $user_value = "";
    
    $defaulValues = array("experience","salary","birthdate","growth","weight");
    
    $count = count($data["main_data"]);
    $nim_attr = 1;
    
    $result = $modx->query("SELECT id FROM user_questionnaire WHERE user_id = " . $user_id);
    if (!is_object($result)) {
        
        foreach ($data["main_data"] as $keyAttr => $value) {
            
            if(in_array($keyAttr,$defaulValues)) $value = 0;
            
            $user_prop .= '`'.$keyAttr.'`';
            $user_value .= '"'.$value.'"';
            
            if($nim_attr != $count && $count) {
                $user_prop .= ',';
                $user_value .= ',';
            }
            
            $nim_attr++;
        }
       
        $sql = "INSERT INTO user_questionnaire (user_id,createdon,data_json,$user_prop) VALUES ($user_id,$createon,'".json_encode($data["second_data"])."',".$user_value.")";
        $inser = $modx->query($sql);
        
        echo json_encode(array(
            "action" => "add",
            "message" => "Анкета пользователя сохранена"
        ));
       
    } else {
        
        foreach ($data["main_data"] as $keyAttr => $value) {
            
            if(in_array($keyAttr,$defaulValues)) $value = 0;
            
            $user_prop .= '`'.$keyAttr.'` = "'.$value.'"';
            
            if($nim_attr != $count && $count) {
                $user_prop .= ',';
                $user_value .= ',';
            }
            
            $nim_attr++;
        }
        
        $sql = "UPDATE user_questionnaire SET editedon = $editedon, data_json = '".json_encode($data["second_data"])."', $user_prop WHERE user_id = $user_id";
        $update = $modx->query($sql);
        
        echo json_encode(array(
            "action" => "edit",
            "message" => "Анкета пользователя изменена"
        ));
    }
}

?>