<?php
	$mysqli = new mysqli("localhost", "progettoleila", "delneri!", "my_progettoleila");
    $delete=mysqli_query($mysqli,"truncate table db_notizie_aggiornate");
 	$result= mysqli_query($mysqli,"select * from db_notizie_source a, db_notizie_scelte b where a.id in (b.idNews)");
	$i=0;
    while($r=mysqli_fetch_array($result)){
        $xmlDoc = new DOMDocument();
        $xmlDoc->load($r['link']);
        $x=$xmlDoc->getElementsByTagName('item');
        for ($i=0; $i<$r['numero']; $i++) {
          $title=$x->item($i)->getElementsByTagName('title')
                ->item(0)->childNodes->item(0)->nodeValue;
          $link=$x->item($i)->getElementsByTagName('link')
                ->item(0)->childNodes->item(0)->nodeValue;
          $desc=$x->item($i)->getElementsByTagName('description')
                ->item(0)->childNodes->item(0)->nodeValue;
          $date=$x->item($i)->getElementsByTagName('pubDate')
                ->item(0)->childNodes->item(0)->nodeValue;
          $img='a';
          if(substr($desc,0,1)=='<'&&substr($desc,-1,1)=='>'){
         	$dom=new DOMDocument();
          	$dom->loadHTML($desc);
          	$img=$dom->getElementsByTagName('p')->item(0)->getElementsByTagName('img')->item(0)->getAttribute('src');
            $desc=$dom->getElementsByTagName('p')->item(1)->nodeValue;
            if($desc=='')
            	$desc=$dom->getElementsByTagName('p')->item(0)->nodeValue;
            $desc=utf8_decode($desc);
          }
          
          
          mysqli_query($mysqli, "INSERT INTO `db_notizie_aggiornate`(`id`, `idSource`, `ordine`, `date`, `title`, `desc`, `link`, `img`) 
          			VALUES (null,'".$r['idNews']."',".$r['ordine'].",'".dateConverter($date)."','".(addslashes($title))."','".(addslashes($desc))."','$link','$img')");
          //  echo "INSERT INTO `db_notizie_aggiornate`(`id`, `idSource`, `ordine`, `date`, `title`, `desc`, `link`, `img`) 
          //			VALUES (null,'".$r['idNews']."',".$r['ordine'].",'".dateConverter($date)."','$title','$desc','$link','$img')";

         }
    }

	function dateConverter($str) {
    return date('Y-m-d H:i:s', strtotime($str));
}
?>