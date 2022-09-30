<?php
/**
 * Handles removal of threads if a Resource is deleted.
 * 
 * @package directresize
 */
$modx->lexicon->load('directresize:default');
$path = $modx->getOption('directresize.path',null,true);
$prefix = $modx->getOption('directresize.prefix',null,true);
$r = $modx->getOption('directresize.size_rule',null,true);
$q_jpg = $modx->getOption('directresize.q_jpg',null,true);
$q_png = $modx->getOption('directresize.q_png',null,true);
$path_base = $modx->getOption('directresize.path_base',null,true);
$lightbox = $modx->getOption('directresize.lightbox',null,true);
$lightbox_w = $modx->getOption('directresize.lightbox_w',null,true);
$lightbox_h = $modx->getOption('directresize.lightbox_h',null,true);



if (substr($prefix,-1) != "_") $prefix .= "_";

include "core/components/directresize/elements/plugins/plugin.directresize.php";

$e = &$modx->event;
switch ($e->name) {
    case "OnWebPagePrerender":
        $o = $modx->resource->_output;
  //print_r('1'.$o.'2');
        
        $reg = "/<img[^>]*>/";  
        preg_match_all($reg, $o, $imgs, PREG_PATTERN_ORDER);
        for($n=0;$n<count($imgs[0]);$n++) {
            //-----------------------

            $path_img = preg_replace("/^.+src=('|\")/ui","",$imgs[0][$n]);                                            
            $path_img = preg_replace("/('|\").*$/ui","",$path_img);                                                                           
            //-----------------------
            if (substr($path_img,0,strlen($path_base)) == $path_base) {                                                                     
                $img = strtolower($imgs[0][$n]);
                $verif_balise = sizeof(explode("width",$img)) + sizeof(explode("height",$img)) - 2;
                if ($verif_balise > 0) {
                    #################################
                    preg_match("/height *(:|=) *[\"']* *\d+ *[\"']*/",$img,$array);                                      
                    sizeof(explode(":",$array[0])) > 1 ? $style = true : $style = false;
                    $heigth = preg_replace("/[^0123456789]/","",$array[0]);
                    //-------------------
                    preg_match("/width *(:|=) *[\"']* *\d+ *[\"']*/",$img,$array);
                    $width = preg_replace("/[^0123456789]/","",$array[0]);
                    //-------------------
                    if ($style) {
                        $imgf = preg_replace("/(height|HEIGHT|Height) *: *[0123456789]* *(px)* */ui","",$imgs[0][$n]);
                        $imgf = preg_replace("/(width|WIDTH|Width) *: *[0123456789]* *(px)* */ui","",$imgf);
                    } else {
                        $imgf = preg_replace("/(height|HEIGHT|Height) *= *[\"']* *[0123456789]* *(px)* *[\"']*/ui","",$imgs[0][$n]);
                        $imgf = preg_replace("/(width|WIDTH|Width) *= *[\"']* *[0123456789]* *(px)* *[\"']*/ui","",$imgf);
                    }
                    //-------------------
                    preg_match("/^.+(src|Src|SRC)=('|\")/",$imgf,$path_g);
                    $imgf = preg_replace("/^.+src=('|\")/ui","",$imgf);
                    preg_match("/('|\").*$/",$imgf,$path_d);
                    //-------------------
                    $pathRedim = directResize($path_img,$path,$prefix,$width,$heigth,$r,$q_jpg,$q_png);
                    //-------------------
                    $nouvo_lien = $path_g[0].$pathRedim.$path_d[0];
                    
                    ###############################
                    preg_match("/highslide/",strtolower($imgs[0][$n]),$verif_light);
                    if (($lightbox == 1 && $verif_light[0] == "highslide") || ($lightbox == 2 && substr($path_img,0,strlen($path_base)) == $path_base)) {
                        
                        $size       = getimagesize($path_img);
                        $img_src_w  = $size[0];
                        $img_src_h  = $size[1];
                        $alt        = "";
                        $title  = "";
                        preg_match("/(alt|Alt|ALT) *= *[\"|'][^\"']*[\"']/",$imgs[0][$n],$array);
                        if ($array[0] <> "") {
                            $alt = preg_replace("/alt *= *[\"|']/ui","",$array[0]);
                            $alt = preg_replace("/[\"']*/ui","",$alt);
                            $alt = trim($alt);
                        }
                        preg_match("/(title|Title|TITLE) *= *[\"|'][^\"']*[\"']/",$imgs[0][$n],$array);
                        if ($array[0] <> "") {
                            $title = preg_replace("/title *= *[\"|']/ui","",$array[0]);
                            $title = preg_replace("/[\"']*/ui","",$title);
                            $title = trim($title);
                        }
                        if ($alt <> "" || $title <> "") {
                            $legende = " title=\"$alt";
                            if ($alt <> "" && $title <> "") $legende .= "<br />";
                            if ($title <> "") $legende .= "<span style='font-weight:normal; font-size: 9px'>$title</span>";
                            $legende .= "\" ";
                        } else {
                            $legende = "";
                        }
                        
                        if ($img_src_w > $width || $img_src_h > $height) {
                            if ($img_src_w > $lightbox_w || $img_src_h > $lightbox_h) {                                     
                                $pathRedim = directResize($path_img,$path,$prefix,$lightbox_w,$lightbox_h,3,$q_jpg,$q_png);
                                $nouvo_lien = "<a class=\"highslide\" onclick=\"return hs.expand(this)\" ".$legende." href='".$pathRedim."' >".$nouvo_lien."</a>";
                            } else {
                                $nouvo_lien = "<a class=\"highslide\" onclick=\"return hs.expand(this)\" ".$legende." href='".$path_img."' >".$nouvo_lien."</a>";
                            }
                        }
                    }
                    
                    ####################################
                    $o = str_replace($imgs[0][$n],$nouvo_lien,$o);
                }
            }
        }
        $head = '<script type="text/javascript" src="assets/components/directresize/js/highslide.packed.js"></script><script type="text/javascript">
hs.graphicsDir = \'assets/components/directresize/js/graphics/\';
                  hs.lang.creditsText = \'\';</script>';
        
        
        $o = preg_replace('~(</head>)~i', $head . '\1', $o);
        $modx->resource->_output = $o;
         break;
    default :
        return;
        break;
}