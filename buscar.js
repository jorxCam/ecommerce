  var truc = 0;
  

  $(document).ready(function(){
    $("input").keypress(function(){
      $("span").text( truc += 1);
      
      
      //console.log ( nombre );
      const fd = new FormData();
            fd.append ('nombre', truc);
            fd.append ('text', $("input[name='buscar']").val());
            const data = new URLSearchParams(fd);
            
        fetch('ajax-buscar.php', { method: 'post', body: data })
      .then ( function ( j ){    return j.json( );     })
      .then ( function ( d ){   
        
        console.log ( d );      
        const publicaciones = document.getElementById('publicaciones');

        publicaciones.innerHTML ='';
       

        d.resultados.forEach( u => {
            publicaciones.innerHTML += `
            <div class="resultadosarticulos">
            <a href="article.php?id=${u.id_article}"><img src=images/${u.image} alt="image" width="200" height="200" ></a> <br>
            ${u.description_article} <br> <br>
          
            <strong>  Article  :  </strong>   ${u.nom_article} <br> 
            <strong>  Prix     :  </strong>   ${u.prix_article} <br>
            <strong>  Categorie:  </strong>   ${u.categorie} <br>
          </div>
            `;
        });
    
    
        })
      

    });
  });
