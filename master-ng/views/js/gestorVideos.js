
/*------------------area de arrastre de video--------------------*/
if($("#galeriaVideo" ).html() == 0){
    $("#galeriaVideo").css({"height":"100px"});

} else{

    $("#galeriaVideo").css({"height":"auto"});
}

/*-------------fin area de arrastre de video--------------------*/






/*************SUBIR VIDEO************* */
/************************************ */


$("#subirVideo").change(function(){

   
    video = this.files[0];
   

 
    /*---------------validar tamaño del video ---------------*/
    videoSize = video.size;

    if(Number(videoSize) > 50000000){
        $("#galeriaVideo").before('<div class= "alert alert-warning alerta text-center"> El archivo excede el peso permitido, 50 MB</div> ');

    }else{
        $(".alerta").remove();
    }

    /*---------------validar tipo de video ---------------*/
    videoType = video.type;
    //   console.log("videoType", videoType);
    if(videoType == "video/mp4"){

        $(".alerta").remove();
       
    }else{
        $("#galeriaVideo").before('<div class= "alert alert-warning alerta text-center"> El archivo debe ser formaro MP4.</div> ');

    }



/*************MOSTRAR VIDEO CON AJAX************* */
/************************************************ */
if(Number(videoSize) < 50000000 && videoType == "video/mp4"){
    var datos =  new FormData();
    datos.append("video", video);
    $.ajax({
        url:"views/ajax/gestorVideos.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData:false,
        beforeSend: function(){
            $("#galeriaVideo").before('<img src="views/images/status.gif" id="status">');
        },
        success: function(respuesta){
            console.log('respuesta', respuesta);
            $("#status").remove();

            $("#galeriaVideo").css({"height":"auto"});

           
                $("#galeriaVideo").append('<li><span class="fa fa-times"></span><video controls><source src="'+respuesta.slice(6)+'" type="video/mp4"></video></li>');
           // usamos sweet alert
    
           swal({
            title: "¡OK!",
            text: "¡El video se subió correctamente!",
            type: "success",
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
            },
            function(isConfirm){
                if (isConfirm) {
                    window.location = "videos"; 
                }
        });
            
        }
      
    })


}



});


/*ELIMNAR ITEM VIDEO----------------------------------*/

$(".eliminarVideo").click(function(){

    if($(".eliminarVideo").length == 1){

   $("#galeriaVideo").css({"height":"100px"});
   
  

    }

    idVideo = $(this).parent().attr("id");
  
    rutaVideo = $(this).attr("ruta");
    $(this).parent().remove();









     //ELIMINAMOS RUTA VIDEO DE LA BD

     var  borrarVideo = new FormData();
     borrarVideo.append("idVideo", idVideo);
     //enviamos al archivo ajax en php llamado gestorSlide.php
     borrarVideo.append("rutaVideo", rutaVideo);
 
     $.ajax({
         url:"views/ajax/gestorVideos.php",
         method: "POST",
         data: borrarVideo,
         cache: false,
         contentType: false,
         processData:false,
         success: function(respuesta){
 
           // console.log("respuesta", respuesta);
         }
     })

});








/*=============================================
ORDENAR ITEM VIDEO     
=============================================*/

/* Ordenar Videos 
variables de arrays para ordenar los items*/
var almacenarOrdenId = [];
var ordenItem = [];

//si doy click en el boton ordenar video lo oculto y muestro el de guardar  con .show() 
$("#ordenarVideo").click(function(){
    
    $("#ordenarVideo").hide();
    $("#guardarVideo").show();

   // tomamos el ul  y le ponemos el cursor en modo move y ocultamos el icono de eliminar de la etiqeuta html span
	$("#galeriaVideo").css({"cursor":"move"})
    //ocultamos las x rojas de eliminar
	$("#galeriaVideo span").hide()
	//usamos la propiedad .sortable() de jqueryUI	 
	$( "#galeriaVideo").sortable({
      	revert: true,
      	connectWith: ".bloqueVideo",
      	handle: ".handleVideo",	
      	stop: function( event, ui ) {


//for para recolectar el id y el orden de cada item 
      	for(var i= 0; i < $( "#galeriaVideo li").length; i++){

      		almacenarOrdenId[i] = event.target.children[i].id;
            ordenItem[i] = i+1;
       
      		
      		}
      	}
    })

})

/* Guardar Orden Slide */ 
//si doy click en guardar slide muestre el boton ordenar slide 
$("#guardarVideo").click(function(){
    
	$("#ordenarVideo").show();
	$("#guardarVideo").hide();

	//  if(OrdenItem){

	// 	$("#textoSlide ul").html("")

		for(var i= 0; i < $( "#galeriaVideo li").length; i++){
            var actualizarOrden = new FormData();
            actualizarOrden.append("actualizarOrdenVideo", almacenarOrdenId[i]);
            actualizarOrden.append("actualizarOrdenItem", ordenItem[i]);




            $.ajax({
                url:"views/ajax/gestorVideos.php",
                method: "POST",
                data: actualizarOrden,
                cache: false,
                contentType: false,
                processData:false,
                success: function(respuesta){
             	 $("#galeriaVideo").html(respuesta)

             
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
                                window.location = "videos"; 
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