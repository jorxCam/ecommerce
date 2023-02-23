<?php
    require 'bdd.php';  

    $cant_por_pagina=100;

    function buscarbd ( $que =NULL, $pagina =1){
      global $conn, $cant_por_pagina;

      $where = is_null($que) ? '': " WHERE description_article LIKE '%$que%' ";
      $inicio = ($pagina -1) * $cant_por_pagina;
      
      $consulta = $conn->prepare("SELECT * FROM article $where ORDER BY description_article LIMIT $inicio, $cant_por_pagina");
      $consulta->execute();

      $filas = $consulta->fetchAll(PDO::FETCH_ASSOC);

      return ['resultados' => $filas];

    }


    ?>