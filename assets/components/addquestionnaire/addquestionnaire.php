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

switch($data["action"])
{
	case "resume":
		$table = "user_questionnaire";
	break;
	case "company":
		$table = "user_company";
	break;
	default:
		$table = "";
	break;
}

if(array_key_exists("id",$_GET) && $_GET["id"] > 0)
{
    $sql = "SELECT * FROM $table WHERE user_id = " . $_GET["id"];
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
	
	//echo json_encode($data);
	
	$photo = ["key" => "","value" => ""];
	
	if(array_key_exists("photo",$data) && $data["photo"]) {
	    $reg = '/data:image\/(\w+?);base64,(.+)$/si';
        preg_match($reg,$data["photo"],$match_result);
    	
        $FPName = $table.'-'.$data["user_id"].'.'.$match_result[1];
        $FPsitePath = '/upload/images/users/'.$FPName;
        $FPPath = $_SERVER['DOCUMENT_ROOT'].$FPsitePath;
        
        $num = file_put_contents($FPPath,base64_decode($match_result[2]));
        
        if(!empty($num)){
            
            $photo["key"] = ",photo";
            $photo["value"] = ",'".$FPsitePath."'";
            $photo["update"] = ", photo = '".$FPsitePath."'";
            
         } else {
             echo json_encode(array(
    			"action" => "error",
    			"message" => "Ошибка создания файла"
    		));
        }
	}
	
	if($table){
    
		$result = $modx->query("SELECT id FROM $table WHERE user_id = " . $user_id);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        //
        /*/
        @unlink('/var/www/apply_marine/dumpadd.txt')@unlink('/var/www/apply_marine/data.txt');
        @file_put_contents('/var/www/apply_marine/dumpadd.txt',"\r\n".var_export($row, true )); 
        @file_put_contents('/var/www/apply_marine/data.txt',"\r\n".var_export($data, true )); //*/
		if(isset($row['id'])){
            
            foreach ($data["main_data"] as $keyAttr => $value) {
                
                if(in_array($keyAttr,$defaulValues)) $value = 0;
                
                $user_prop .= '`'.$keyAttr.'` = "'.$value.'"';
                
                if($nim_attr != $count && $count) {
                    $user_prop .= ',';
                    $user_value .= ',';
                }
                
                $nim_attr++;
            }
            
            $sql = "UPDATE $table SET editedon = $editedon".$photo["update"].", data_json = '".json_encode($data["second_data"])."', $user_prop WHERE user_id = $user_id";
            $update = $modx->query($sql);
            
            echo json_encode(array(
                "action" => "edit",
                "message" => "Анкета пользователя изменена "
            ));
        } else {
			
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
		   
			$sql = "INSERT INTO $table (user_id,createdon".$photo["key"].",data_json,$user_prop) VALUES ($user_id,$createon".$photo["value"].",'".json_encode($data["second_data"])."',".$user_value.")";
			$inser = $modx->query($sql);
			
			echo json_encode(array(
				"action" => "add",
				"message" => "Анкета пользователя сохранена"
			));
		   
		} 
	} else {
		echo json_encode(array(
			"action" => "error",
			"message" => "Ошибка в добавлении/редактировании данных"
		));
	}
}

?>