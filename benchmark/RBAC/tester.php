<?php
require "vendor/autoload.php";



$rbac1 = new \Zend\Permissions\Rbac\Rbac();
$rbac2 = new \Zend\Permissions\Rbac\Rbac();
$rbac3 = new \Zend\Permissions\Rbac\Rbac();

// creation des differents 
$developpeur  = new \MIT\Role('developpeur');
$comptable = new \MIT\Role('comptable');
$secretaire = new \MIT\Role('secretaire');
//ajout des roles 
$rbac1->addRole($developpeur);
$rbac2->addRole($comptable);
$rbac3->addRole($secretaire);

// Ajout des differentes permissions aux differents roles 
 $comptable->addPermission('zoneA');
 $comptable->addPermission('zoneB');
 $comptable->addPermission('zoneC');


$developpeur->addPermission('zoneC');
$developpeur->addPermission('zoneB');


$secretaire->addPermission('zoneB');


// affichage 

$compteur1=0;
$machaine="reserve";

if ($rbac1->isGranted($_POST['uname'], $_POST['psw'])) {

  echo "vous avez la permission";
}
else
{
echo "vous n'avez pas  la permission";
$compteur1=1;

}


$compteur=0;
$monfichier=fopen('infoParking.txt','r+');

if ( $compteur1 == 0){
while(!feof($monfichier))
{

$pieces = explode(":", fgets($monfichier,filesize('infoParking.txt')));

if($pieces[0] == $_POST['zone'] )

{
	if (strcmp($pieces[1], $machaine) == 0)
		{
			$compteur=1;
		}
	else {
		$compteur=0;
			//echo $machaine;
		}

}
else {
$compteur=0;
echo " -----cette place n'existe pas ";

	}
}





if ($compteur==0)
{
echo "-------cette place n'est pas libre";
}
else
{
echo "------la place est libre";
}
}
else {
echo "-------vous n'avez pas la permission donc Vous ne pouvez pas acceder a cette place ";
}



fclose($monfichier);
