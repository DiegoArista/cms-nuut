/*------------------area de arrastre de imagen--------------------*/
if($("#lightbox" ).html() == 0){
    $("#lightbox").css({"height":"100px"});

} else{

    $("#lightbox").css({"height":"auto"});
}

/*-------------fin area de arrastre de imagen--------------------*/




/*---------SUBIR MULTIPLES IMAGENES*/
/* --------------------------------*/

$("body").on("dragover", function(e){
    e.preventDefault();
    e.stopPropagation();

  

});
$("#lightbox").on("dragover", function(e){
    e.preventDefault();
    e.stopPropagation();

    $("#lightbox").css({"background":"url(views/images/pattern.jpg)"});

});


/*---------SOLTAR IMAGENES*/
/* --------------------------------*/
$("body").on("drop", function(e){
    e.preventDefault();
    e.stopPropagation();


});

var imagenSize = [];
var imagenType = [];

$("#lightbox").on("drop", function(e){
    e.preventDefault();
    e.stopPropagation();

    $("#lightbox").css({"background":"white"});

    archivo = e.originalEvent.dataTransfer.files;


    for( var i=0; i < archivo.length; i++){
        imagen = archivo[i];
        imagenSize.push(imagen.size);
        imagenType.push(imagen.type);

        if (Number(imagenSize[i] > 2000000)) {
            $("#lightbox").before('<div class= "alert alert-warning alerta text-center"> El archivo excede el peso permitido, 2MB</div> ');
            
        }else{
            $(".alerta").remove();
        }

    
       


        
            /*---------------validar tipo de imagen ---------------*/
        
            //   console.log("imagenType", imagenType);
            if(imagenType[i] == "image/jpeg" || imagenType[i] == "image/png" ){

                $(".alerta").remove();
            
            }else{
                $("#lightbox").before('<div class= "alert alert-warning alerta text-center"> El archivo debe ser formaro JPG o PNG</div> ');

            }








            /*--------------- Mostrar imagen con AJAX ---------------*/
            if(Number(imagenSize[i]) < 2000000 && imagenType[i] == "image/jpeg" || imagenType[i] == "image/png" ){
                var datos =  new FormData();
                datos.append("imagen", imagen);
                $.ajax({
                    url:"views/ajax/gestorGaleria.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData:false,
                    beforeSend: function(){
                        $("#lightbox").append('<li id="status"> <img src="views/images/status.gif" style="width:15%; margin-left:65px;" ></li>');
                    },
                    success: function(respuesta){
                        //console.log('respuesta', respuesta);
                        $("#status").remove();

                        if(respuesta == 0){
                            $("#lightbox").before('<div class= "alert alert-warning alerta text-center">La imagen es inferior a 1024px x  768px</div> ');
                        } else {
                            $("#lightbox").css({"height": "auto"});
                            $("#lightbox").append('<li> <span class="fa fa-times"></span><a rel="grupo" href="'+respuesta.slice(6)+'"><img src="'+respuesta.slice(6)+'"></a></li> ');
                       


                              // usamos sweet alert
    
                                swal({
                                    title: "¡OK!",
                                    text: "¡La imagen se subió correctamente!",
                                    type: "success",
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false
                                    },
                                    function(isConfirm){
                                        if (isConfirm) {
                                            window.location = "galeria"; 
                                        }
                                });
                            

                        }//else
                    }// function success

                }) //ajax

                
            }//if

    }//for

})

/*ELIMNAR ITEM GALERIA----------------------------------*/

$(".eliminarFoto").click(function(){

    if($(".eliminarFoto").length == 1){

   $("#lightbox").css({"height":"100px"});
   
  

    }

    idGaleria = $(this).parent().attr("id");
  
    rutaGaleria = $(this).attr("ruta");
    $(this).parent().remove();









     //ELIMINAMOS IMAGEN DE LA BD

     var  borrarItem = new FormData();
     borrarItem.append("idGaleria", idGaleria);
     //enviamos al archivo ajax en php llamado gestorSlide.php
     borrarItem.append("rutaGaleria", rutaGaleria);
 
     $.ajax({
         url:"views/ajax/gestorGaleria.php",
         method: "POST",
         data: borrarItem,
         cache: false,
         contentType: false,
         processData:false,
         success: function(respuesta){
 
           // console.log("respuesta", respuesta);
         }
     })

});












/*=============================================
ORDENAR ITEM GALERIA     
=============================================*/

/* Ordenar Galeria 
variables de arrays para ordenar los items*/
var almacenarOrdenId = [];
var ordenItem = [];

//si doy click en el boton ordenar slide lo oculto y muestro el de guardar slide con .show() 
$("#ordenarGaleria").click(function(){
    
    $("#ordenarGaleria").hide();
    $("#guardarGaleria").show();

   // tomamos el ul  y le ponemos el cursor en modo move y ocultamos el icono de eliminar de la etiqeuta html span
	$("#lightbox").css({"cursor":"move"})
    //ocultamos las x rojas de eliminar
	$("#lightbox span").hide()
	//usamos la propiedad .sortable() de jqueryUI	 
	$( "#lightbox").sortable({
      	revert: true,
      	connectWith: ".bloqueGaleria",
      	handle: ".handleImg",	
      	stop: function( event, ui ) {


//for para recolectar el id y el orden de cada item 
      	for(var i= 0; i < $( "#lightbox li").length; i++){

      		almacenarOrdenId[i] = event.target.children[i].id;
            ordenItem[i] = i+1;
       
      		
      		}
      	}
    })

})

/* Guardar Orden Slide */ 
//si doy click en guardar slide muestre el boton ordenar slide 
$("#guardarGaleria").click(function(){
    
	$("#ordenarGaleria").show();
	$("#guardarGaleria").hide();

	//  if(OrdenItem){

	// 	$("#textoSlide ul").html("")

		for(var i= 0; i < $( "#lightbox li").length; i++){
            var actualizarOrden = new FormData();
            actualizarOrden.append("actualizarOrdenGaleria", almacenarOrdenId[i]);
            actualizarOrden.append("actualizarOrdenItem", ordenItem[i]);




            $.ajax({
                url:"views/ajax/gestorGaleria.php",
                method: "POST",
                data: actualizarOrden,
                cache: false,
                contentType: false,
                processData:false,
                success: function(respuesta){
             	 $("#lightbox").html(respuesta)

             
                   // usamos sweet alert
    
                    swal({
                        title: "¡OK!",
                        text: "¡El orden se ha actualizado correctamente!",
                        type: "success",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                        },
                        function(isConfirm){
                            if (isConfirm) {
                                window.location = "galeria"; 
                            }
                      });
                }
            });

	      
	      	//}
     }

	// $("#columnasSlide").css({"cursor":"auto"})
	// $("#columnasSlide span").show()

	// $("#columnasSlide").disableSelection();


})


/*=====  Fin de ORDENAR SLIDE   ======*/
