<?php
header("Content-type: image/png"); //la ligne qui change tout !
$x = 200; //largeur de mon image en PIXELS uniquement !
$y = 200; //hauteur de mon image en PIXELS uniquement !

/* on créé l'image en vraies couleurs avec une largeur de 200 pixels et une hauteur de 200 pixels */
$image = imagecreatetruecolor($x,$y);

$color = "BEDFFE";
$rouge = hexdec(substr($color,0,2)); //conversion du canal rouge
$vert = hexdec(substr($color,2,4)); //conversion du canal vert
$bleu = hexdec(substr($color,4,6)); //conversion du canal bleu

/* on créé la couleur et on l'attribue à une variable pour ne pas la perdre */
$couleur = imagecolorallocate($image,$rouge,$vert,$bleu);

imagestring($image, 3, 65, 10, "horizontal", $couleur); //on écrit horizontalement
imagestringup($image, 3, 5, 180, "vertical", $couleur); //on écrit verticalement
imagepng($image); //renvoie une image sous format png
imagedestroy($image); //détruit l'image, libérant ainsi de la mémoire
?>
