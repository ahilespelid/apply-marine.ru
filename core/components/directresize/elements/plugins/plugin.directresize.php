<?php

##################################################
### crÃ©ation de miniatures Ã  la volÃ©e          ###
##################################################

############### Merci au contributeur de www.php.net ####################
function fastimagecopyresampled ($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h, $quality = 3) {
  // Plug-and-Play fastimagecopyresampled function replaces much slower imagecopyresampled.
  // Just include this function and change all "imagecopyresampled" references to "fastimagecopyresampled".
  // Typically from 30 to 60 times faster when reducing high resolution images down to thumbnail size using the default quality setting.
  // Author: Tim Eckel - Date: 12/17/04 - Project: FreeRingers.net - Freely distributable.
  //
  // Optional "quality" parameter (defaults is 3).  Fractional values are allowed, for example 1.5.
  // 1 = Up to 600 times faster.  Poor results, just uses imagecopyresized but removes black edges.
  // 2 = Up to 95 times faster.  Images may appear too sharp, some people may prefer it.
  // 3 = Up to 60 times faster.  Will give high quality smooth results very close to imagecopyresampled.
  // 4 = Up to 25 times faster.  Almost identical to imagecopyresampled for most images.
  // 5 = No speedup.  Just uses imagecopyresampled, highest quality but no advantage over imagecopyresampled.

  if (empty($src_image) || empty($dst_image)) { return false; }
  if ($quality <= 1) {
   $temp = imagecreatetruecolor ($dst_w + 1, $dst_h + 1);
   imagecopyresized ($temp, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w + 1, $dst_h + 1, $src_w, $src_h);
   imagecopyresized ($dst_image, $temp, 0, 0, 0, 0, $dst_w, $dst_h, $dst_w, $dst_h);
   imagedestroy ($temp);
  } elseif ($quality < 5 && (($dst_w * $quality) < $src_w || ($dst_h * $quality) < $src_h)) {
   $tmp_w = $dst_w * $quality;
   $tmp_h = $dst_h * $quality;
   $temp = imagecreatetruecolor ($tmp_w + 1, $tmp_h + 1);
   imagecopyresized ($temp, $src_image, $dst_x * $quality, $dst_y * $quality, $src_x, $src_y, $tmp_w + 1, $tmp_h + 1, $src_w, $src_h);
   imagecopyresampled ($dst_image, $temp, 0, 0, 0, 0, $dst_w, $dst_h, $tmp_w, $tmp_h);
   imagedestroy ($temp);
  } else {
   imagecopyresampled ($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);
  }
  //return true;
}
#######################################################################

function directResize($img_src, $img_min_path, $img_min_prefix, $img_min_w, $img_min_h, $img_min_r, $img_min_q_jpg, $img_min_q_png){
	
	//***echo "----------------------------------------<br/>\n";
	
	//--o Calculs de valeurs
	$img_src_ext	= substr(strrchr($img_src,'.'),1);			//... extension de l'image d'origine
	$img_src_name	= basename($img_src, ".".$img_src_ext);		//... nom de l'image d'origine
	//***echo "Nom : $img_src_name | Extension : $img_src_ext<br />";
	if ($img_min_w == "") $img_min_w = 0;
	if ($img_min_h == "") $img_min_h = 0;
	if ($img_min_w == 0) $img_min_r = 2;
	if ($img_min_h == 0) $img_min_r = 1;
	
	//--o sÃ©rie de test
	$verif = true;
	// vÃ©rifie si l'image d'origine existe bien
	if (!file_exists($img_src)){
		$verif = false;
		//***echo "L'image n'existe pas.<br />";
	} else {
		// rÃ©cupÃ©ration des dimentions d'origine
		$size 			= getimagesize($img_src);
		$img_src_w 		= $size[0];
		$img_src_h 		= $size[1];
		//***echo "Taille de l'image d'origine : w = $img_src_w | h = $img_src_h<br />";
		//***echo "ratio : $img_min_r<br />";
	}
	// vÃ©rifie si l'extension du fichier correspond avec les formats autorisÃ©s
	$img_ext = strtolower($img_src_ext);
	if ($img_ext != "jpg" && $img_ext != "jpeg" && $img_ext != "gif" && $img_ext != "png"){
		$verif = false;
	} else {
		//***echo "Bonne extension : $img_ext<br />";
	}
	// vÃ©rifie que le dossier de destination existe
	if (!is_dir($img_min_path)){
		$verif = false;
	} else {
		//***echo "Le dossier de destination existe<br />";
	}
	// vÃ©rifie qu'il y a au moins une valeur de largeur ou de hauteur
	if ($img_min_w == 0 && $img_min_h == 0) $verif = false;
	
	// vÃ©rifie si au moins une des nouvelles dimentions est diffÃ©rente de celles d'origine (sinon, renvoie vers l'image originale)
	if ($img_min_w == $img_src_w && $img_min_h == $img_src_h) $verif = false;
	
	if ($verif){
		
		//***echo "lancement de la procÃ©dure de calcul<br />";
		
		// calcul des dimentions cibles
		switch ($img_min_r){
			case 0:
				$img_min_w_calc	= $img_min_w;
				$img_min_h_calc	= $img_min_h;
				break;
			case 1:
				$img_min_w_calc	= $img_min_w;
				$img_min_h_calc	= round($img_src_h * $img_min_w_calc / $img_src_w);
				break;
			case 2:
				$img_min_h_calc	= $img_min_h;
				$img_min_w_calc	= round($img_src_w * $img_min_h_calc / $img_src_h);
				break;
			case 3:
				$ratio_wh		= $img_src_w / $img_src_h;
				$ratio_whmin	= $img_min_w / $img_min_h;
				if ($ratio_wh > $ratio_whmin){
					$img_min_w_calc	= $img_min_w;
					$img_min_h_calc	= round($img_src_h * $img_min_w_calc / $img_src_w);
				} else {
					$img_min_h_calc	= $img_min_h;
					$img_min_w_calc	= round($img_src_w * $img_min_h_calc / $img_src_h);
				}
				break;
			case 4:
				if ($img_src_w/$img_src_h > $img_min_w/$img_min_h) {
					$img_min_h_calc	= $img_min_h;
					$img_min_w_calc	= round($img_src_w * $img_min_h_calc / $img_src_h);
				} else {
					$img_min_w_calc	= $img_min_w;
					$img_min_h_calc	= round($img_src_h * $img_min_w_calc / $img_src_w);
				}
				break;
		}
		//***echo "Taille de l'image calcul&eacute;e : w = $img_min_w_calc | h = $img_min_h_calc<br />";
		
		// calcul du nom de la miniature
		$img_min_name	= $img_min_prefix.$img_src_name."_w".$img_min_w_calc."_h".$img_min_h_calc.".".$img_src_ext;
		//***echo "Nom de la miniature : $img_min_name<br />";
		
		// traitement du chemin cible
		if (substr($img_min_path,-1) == "/"){
			$img_min_path_name = $img_min_path.$img_min_name;
		} else {
			$img_min_path_name = $img_min_path."/".$img_min_name;
		}
		//***echo "Chemin complet de la miniature : $img_min_path_name<br />";
		
		// vÃ©rifie que la miniature n'existe pas et la crÃ©e si c'est le cas
		if (!file_exists($img_min_path_name)) {
			// augmente la limite de mÃ©moire
			
			ini_set('memory_limit', '64M');
			
			// CrÃ©e la nouvelle image suivant le type
			if ( $img_ext == "jpg" || $img_ext == "jpeg" ){
				$image_p 	= imagecreatetruecolor($img_min_w_calc, $img_min_h_calc);
				$image 		= imagecreatefromjpeg($img_src);
				//imagecopyresampled($image_p, $image, 0, 0, 0, 0, $img_min_w_calc, $img_min_h_calc, $img_src_w, $img_src_h);
				fastimagecopyresampled($image_p, $image, 0, 0, 0, 0, $img_min_w_calc, $img_min_h_calc, $img_src_w, $img_src_h, 4);
				imagejpeg($image_p, $img_min_path_name, $img_min_q_jpg);
				
			} else if ( $img_ext == "gif" ){
				$image_p 	= imagecreatetruecolor($img_min_w_calc, $img_min_h_calc);
				$image 		= imagecreatefromgif($img_src);
				imagecopyresampled($image_p, $image, 0, 0, 0, 0, $img_min_w_calc, $img_min_h_calc, $img_src_w, $img_src_h);
				imagegif($image_p, $img_min_path_name);
				
			} else if ( $img_ext == "png" ){
				$image_p 	= imagecreatetruecolor($img_min_w_calc, $img_min_h_calc);
				$image 		= imagecreatefrompng($img_src);
				imageantialias($image_p,true);											//... prÃ©cise le mode d'antialiasing
				imagealphablending($image_p, false);									//... dÃ©sactive le mode de blending transparent d'une image
				imagesavealpha($image_p,true);											//... Configure l'enregistrement des informations complÃ¨tes du canal alpha
				$transparent = imagecolorallocatealpha($image_p, 255, 255, 255, 0);		//... Alloue une couleur avec alpha Ã  une image
				for($x=0;$x<$img_min_w_calc;$x++) {
					for($y=0;$y<$img_min_h_calc;$y++) {
						imagesetpixel( $image_p, $x, $y, $transparent );				//... dessine un pixel aux coordonnÃ©es spÃ©cifiÃ©es
					}
				}
				imagecopyresampled($image_p, $image, 0, 0, 0, 0, $img_min_w_calc, $img_min_h_calc, $img_src_w, $img_src_h);
				//imagepng($image_p, $img_min_path_name, $img_min_q_png, PNG_ALL_FILTERS);
				imagepng($image_p, $img_min_path_name, $img_min_q_png);
				
			}
			// DÃ©truis les tampons
			ImageDestroy($image_p);  
			ImageDestroy($image);
		}
		
		$pathFinal = $img_min_path_name;
		
	} else {
		$pathFinal = $img_src;
	}
	
	return $pathFinal;
}
//--o 

?>