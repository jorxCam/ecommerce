<?php 
if(isset($_POST['txtbusca'])):
  include "conexion.php";
   $user=new ApptivaDB();  
    $u=$user->buscar("article"," description_article like '%".$_POST['txtbusca']."%'");
    $html="";
 foreach ($u as $v)
      $html.="<p>".$v['nombre']."</p>";
 echo $html;
else:
    echo "Error";
endif;
 ?>

<script>

document.getElementById("buscar").addEventListener("keyup", e=>{
    var parametros = { txtbusca : e.target.value }
    fetch("salida.php",{
        method:'POST',
        body: JSON.stringify(parametros),
        dataType: "json",
        headers:{
           'X-Requested-With': 'XMLHttpRequest',
           'Accept' : 'application/json',
           'Content-Type' : 'application/json' 
        }
     }).then(response => {
       return response.json()
     }).then(data =>{ 
       salida.innerHTML = data
     }).catch(error =>console.error(error));
   })




$(document).ready(function(){
    $("#txtbusca").keyup(function(){
         var parametros="txtbusca="+$(this).val()
         $.ajax({
               data:  parametros,
             url:   'salida.php',
             type:  'post',
               beforeSend: function () { },
               success:  function (response) {                 
                   $(".salida").html(response);
             },
             error:function(){
                  alert("error")
               }
          });
    })
})

</script>