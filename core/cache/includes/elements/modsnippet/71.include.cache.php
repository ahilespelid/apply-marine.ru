<?php
/* ===================================================
Сниппет для вывода социальных ссылок

пример использования: [[!socialLinks? &links=`phone,vk,facebook,ok,instagram,whatsapp,telegram` &colored=`1` &phone=``]]

используемые параметры:
&links - перечень необходимых ссылок для данного вывода (они будут выведены только если ссылка/телефон для данного поля указана)
&colored - укажите 0 или 1. Если указана 1, у блока появится класс "color-ico"
&phone - указать номер телефона, необходим если в перечне иконок указан параметр phone и необходимо вывести конкретное значение. Если не указан, то берётся первый номер телефона из конфигураций

===================================================== */
// если выставлен параметр цвета в 1, то присваиваем переменной название класса
$colored = ($colored)? "color-ico" : "";
// разбиваем строку на массив
$links = explode(",",$links);
// если полученный массив не пустой и его первое значение не равно пустому значению
if(count($links)>0 && $links[0] != "") {
    // формируем строку с открытым контейнеров
    $content = '<!-- SOCIAL LINKS --><div class="social-links header-links '.$colored.'">';
    // перебераем список элементов которые необходимо вывести
    foreach ($links as $element) {
        // подгружаем соответственный параметр из конфигурации
        if($element != "phone") {
            $value = $modx->getOption("my_link_".$element);
            $key = "b";
        } else {
            if(!$phone){
                $phones = $modx->getOption("my_".$element."s");
                // преобразуем строку с телефонами в массив
                $phone = explode(";",$phones)[0];
            }
            
            // убераем все символы из строки кроме цифр и пробелов
            $phoneLink = preg_replace('/[^0-9 ,]/', '', $phone);
            // убераем все пробелы
            $phoneLink = str_replace(" ","",$phoneLink);
            // получаем первую цифру телефона
            $rest = substr($phoneLink, 0, -10);
            // если это 7, то добавляем +
            if ($rest == 7) {
                $phoneLink = "+$phoneLink";
            }
            // присваиваем значение переменной value
            $value = $phoneLink;
            $key = "s";
        }
        $elementIco = $element;
        // если значение существует
        if($value){
            // проверяем нужно ли поменять иконку или преобразовать ссылку
            switch($element){
                case "phone": // если это facebook то преобразуем название для иконки
                    $value = "tel:".$value;
                break;
                case "facebook": // если это facebook то преобразуем название для иконки
                    $elementIco = "facebook-f";
                break;
                case "ok": // если это ok то преобразуем название для иконки
                    $elementIco = "odnoklassniki";
                break;
                case "telegram": // если это telegram то преобразуем название для иконки и формируем ссылку
                    $elementIco = "telegram-plane";
                    $value = "https://t.me/".$value;
                break;
                case "whatsapp": // если это whatsapp то преобразуем ссылку для вставки
                    $value = "https://api.whatsapp.com/send?phone=".$value;
                break;
            }
            // формируем строку для вывода для указанного параметра
            $content .= '<a href="'.$value.'" title="Перейти в '.$element.'" target="_blank"><i class="fa'.$key.' fa-'.$elementIco.' ico-block" aria-hidden="true"></i></a>';
        }
    }
    // закрываем контейнер
    $content .= '</div><!-- /SOCIAL LINKS -->';
    // возвращаем полученный результат
    return $content;
    
}
return;
