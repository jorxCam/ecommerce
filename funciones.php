<?php
    require 'bdd.php';  

    $cant_por_pagina=10;

    function buscar ( $que =NULL, $pagina =1){
      global $conn, $cant_por_pagina;

      $where = is_null($que) ? '': " WHERE description_article LIKE '%$que%' ";
      $inicio = ($pagina -1) * $cant_por_pagina;
      
      $consulta = $conn->prepare("SELECT * FROM article $where ORDER BY description_article LIMIT $inicio, $cant_por_pagina");
      $consulta->execute();

      $filas = $consulta->fetchAll(PDO::FETCH_ASSOC);

      //$registros = [];
      /*
      foreach($filas as $f) {
            $registros[] =$f;
      }*/

      //echo $consulta;
      //var_dump($filas);
      //var_dump($registros);

      return $filas;

    }


    ?>