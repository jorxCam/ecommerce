<?php
    require 'bdd.php';  

    $cant_por_pagina=10;

    function buscar ( $que =NULL, $pagina =1){
      global $conn, $cant_por_pagina;

      $where = is_null($que) ? '': " WHERE nom_ article LIKE '%$que%' "
      $inicio = ($pagina -1) * $cant_por_pagina;
      $consulta = "SELECT * FROM article $where ORDER BY nom_article LIMIT $inicio, $cant_por_pagina";

      echo $consulta;

    }