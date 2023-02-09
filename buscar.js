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
      .then ( function ( d ){   console.log ( d );       })
      

    });
  });
