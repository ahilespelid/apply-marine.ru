$(document).ready(function(){
/* Получение данных из БД */
let id = $("input[name=user_id]").val();
if(id > 0)
{
    $.ajax({
        url: '/assets/components/addquestionnaire/addquestionnaire.php?id=' + id,
        method: 'post', 
        dataType: 'html',          
        data: {
            "action" : $("input[name=action]").val()
        },           
        success: function(data){
            data = JSON.parse(data);
    	    console.log(data);
    	    
    	    let value = "";
    	    
    	    if(data.error === 0){
    	        for (var key in data.data) {
    	            value = data.data[key];
    	            if(key == "photo"){
    	                if(value) $("img.photo-user").attr("src",value);
    	            } else {
    	                $(".summary-form *[name=" + key + "]").val(value).attr("value",value);
    	                console.log(key + ": " + value);
    	            }
    	        }
    	    }
        }
    });
}

// добавление нового элемента
$(".parent-add-element").on("click",".btn-add-element", function(){
    console.log("Нажал на ADD");
    let element = $(this).closest(".parent-add-element").find(".default_element").children(".row");
    //console.log(element);
    let number = Number(element.find("input").attr("data-element")) + 1;
    let name = $(this).closest(".parent-add-element").attr("data-elements");
    element.clone().appendTo('.parent-add-element[data-elements=' + name + '] .add-block-elements').find("input").attr('id',name + "-" + number).attr('name',name + "-" + number).attr('placeholder',"Заполните поле");
    
    element.find("input").attr("data-element",number);
});

function get_checked (){
    let checked_text = "";
    $(".select-list ul li.checked").each(function(index, element){
        checked_text += $(this).attr("data-value") + ";";
    });
    $("input[name=job_title]").val(checked_text).attr("value",checked_text);
}

/* Выделяем элемент списка в Анкете*/
$(".select-list-block").on("click",".select-list ul li",function(){
    $(this).toggleClass("checked");
    get_checked();
});

/* Функция что бы получить загружаемую картинку */
function readURL(input){
  if(input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){$('.resume-img').attr('src', e.target.result);}
    reader.readAsDataURL(input.files[0]);
  }
}
/* действие на выбор картинки - вызывается функция выше*/
$(".summary-form").on("change","#imgInp",function() {
  readURL(this);
});

/* Скрипт для отправки данных в БД */
$(".summary-form").on("click",".submit-btn",function(){
    let data = [];
    let data_main = "";
    let data_second = "";
    let key = "";
    let value = "";
    
    let error = 0;
    
    $(".main-data-user .get-input").each(function(index, element){
        key = $(this).attr("name");
        //console.log(this.nodeName);
        let flag = 0;
        switch(this.nodeName){
            case "SELECT":
                value = $("select[name=" + key + "] option:checked").val();
                flag = 1;
            break;
            case "TEXTAREA":
                value = $("textarea[name=" + key + "]").val();
                flag = 1;
            break;
            default:
                let type = $(this).attr("type");
                console.log("Проверка - " + key + ": " + type);
                if(type == "radio") {
                    if($(this).is(":checked")) 
                    {
                        value = $(this).val();
                        flag = 1;
                    }
                } else {
                    value = $(this).val();
                    flag = 1;
                }
                
            break;
        }
        
        if($(this).hasClass("required")) {
            console.log("Я проверяю");
            if(value == "") {
                error++;
                
                if(error == 1) $(this).addClass("first-error");
                
                $(this).addClass("error");
                console.log("error");
            }
        }
        
        if(flag) {
            data_second = data_second + '"' + key + '":"' + value + '",';
        }
        
        if(flag && value != "") {
            data[key] = value;
            data_main = data_main + '"' + key + '":"' + value + '",';
        }
    });
    
    $(".second-data-user .get-input").each(function(index, element){
        key = $(this).attr("name");
        
        //console.log(this.nodeName);
        let flag = 0;
        switch(this.nodeName){
            case "SELECT":
                value = $("select[name=" + key + "] option:checked").val();
                flag = 1;
            break;
            case "TEXTAREA":
                value = $("textarea[name=" + key + "]").val();
                flag = 1;
            break;
            default:
                let type = $(this).attr("type");
                //console.log("Проверка - " + key + ": " + type);
                if(type == "radio") {
                    if($(this).is(":checked")) 
                    {
                        value = $(this).val();
                        flag = 1;
                    }
                } else {
                    value = $(this).val();
                    flag = 1;
                }
                
            break;
        }
        
        if($(this).hasClass("required")) {
            console.log("Я проверяю");
            if(value == "") {
                error++;
                
                if(error == 1) $(this).addClass("first-error");
                
                $(this).addClass("error");
                console.log("error");
            }
        }
        
        if(flag) {
            data_second = data_second + '"' + key + '":"' + value + '",';
        }
    });
    
    if(error < 1) {
    
        data_main = "{" + data_main.substring(0, data_main.length - 1) + "}";
        data_second = "{" + data_second.substring(0, data_second.length - 1) + "}";
        
        //console.log(data2);
        //console.log(JSON.parse(data2));
        //console.log("Картинка: " + $("img.photo-user").attr("src"));
        
        $.ajax({
            url: '/assets/components/addquestionnaire/addquestionnaire.php',
            method: 'post', 
            dataType: 'html',          
            data: {
                "user_id" : $("input[name=user_id]").val(),
                "action" : $("input[name=action]").val(),
                "main_data" : JSON.parse(data_main),
                "second_data" : JSON.parse(data_second),
                "photo": $("img.photo-user").attr("src")
            },     
            success: function(data){
                data = JSON.parse(data);
        	    console.log(data);
        	    
        	    if(data.action == "add") {
        	        $.jGrowl(data.message, { life:4000, theme: 'an-message-saccess' });
        	    } else {
        	        $.jGrowl(data.message, { life:4000, theme: 'an-message-saccess' });
        	    }
            }
        });
    } else {
        $.jGrowl("В форме содержаться ошибки!", { life:4000, theme: 'an-message-error' });
        
        var firstError = $(".first-error").offset().top;
        jQuery("html:not(:animated),body:not(:animated)").animate({
          scrollTop: firstError
        }, 800);
    }
});
});