<html>
   <head>
      <title>Stock d'images</title>
   </head>
   <body>
      <?php
         require ("connect.php");
         $req = $bdd->prepare("SELECT img_nom, img_id " .
                "FROM images ORDER BY img_nom");
         $ret->execute($req);
         while($donnees = $req->fetch(PDO::PARAM_STR))
         {
             echo "<a href=\"apercu.php?id=" . $col[1] . "\">" . $col[0] . "</a><br />";
         }
      ?>
   </body>
</html>
