

/*===================================================================
                        AREA GESTOR SLIDER
======================================================================*/

//si el contenido esta vacio abrimos la altura a 100px sino la altura será auto

if($("#columnasSlide").html() == 0 ){
    $("#columnasSlide").css({"height":"100px"});
}
else{
    $("#columnasSlide").css({"height":"auto"});
}

/*===================     FIN AREA GESTOR SLIDER    =================*/


/*===================================================================
                        SUBIR IMAGENES GESTOR SLIDER
======================================================================*/
$("#columnasSlide").on("dragover", function(e){
    //preventDefault() evitamos accionse que traen por defecto los navegadores
    e.preventDefault();
    //stopPropagation() detiene la propagacion de un evento para que no se realice 
    //otra ejecucion u otro listener lo escuhce atraves del DOM
    e.stopPropagation(); 

    $("#columnasSlide").css({"background":"url('views/images/pattern.jpg')", "transition":"all .5s ease-in"})

}) 






/*============     FIN SUBIR IMAGENES GESTOR SLIDER   =================*/


/*===================================================================
                        SOLTAR IMAGENES GESTOR SLIDER
======================================================================*/
$("#columnasSlide").on("drop", function(e){
 
    e.preventDefault();
    e.stopPropagation(); 

    $("#columnasSlide").css({"background":"white"})
//Validar tamaño de la imagen
    var archivo = e.originalEvent.dataTransfer.files;    
    //tomamos el indixe 0 para trabajar los archivos en el dom
    var imagen = archivo[0];
    //obtenemos el tamaño del archivo
    var imagenSize = imagen.size;
 
    if(Number(imagenSize) > 2000000){
        $("#columnasSlide").before ('<div class="alert alert-warning text-center">El archivo excede el peso permitido 2 MB</div>')

    }
    else{
        $(".alert").remove ();
    }


//Validar tipo imagen


var imagentype = imagen.type;

if(imagentype == "image/jpeg" || imagentype ==  "image/png"){

    $(".alert").remove ();
}else{
    $("#columnasSlide").before ('<div class="alert alert-warning text-center">El archivo debe ser formato jpg o png.</div>')
}
//subir imagen al servidor

if(Number(imagenSize) < 2000000 && imagentype == "image/jpeg" || imagentype ==  "image/png"){

    var datos = new FormData();
    datos.append("imagen", imagen);
    $.ajax({
        url:"views/ajax/GestorSlide.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData:false,
        dataType:"json",
        beforeSend: function(){
            $("#columnasSlide").before('<img src="views/images/status.gif" id="status">');
        },
        success: function(respuesta){
            //quitamos el loader de la imagen
            $("#status").remove();
        
            if(respuesta == 0){
                $("#columnasSlide").before('<div class="alert alert-warning text-center">El imagen es inferior a 1600px x 600px.</div>')
            } else {
                //ponemos el alto automatico segun el alto de las imagenes 
                $("#columnasSlide").css({"height":"auto"});
                //mostramos con json las imagenes subidas al servidor
                $("#columnasSlide").append('<li class="bloqueSlide"><span class="fa fa-times"></span><img src="'+respuesta["ruta"].slice(6)+'" class="handleImg"></li>');
               
               
                $("#ordenarTextSlide").append('<li><span class="fa fa-pencil" style="background:blue"></span><img src="'+respuesta["ruta"].slice(6)+'"style="float:left; margin-bottom:10px" width="80%"><h1>'+respuesta["titulo"]+'</h1> <p>'+respuesta["descripcion"]+'</p></li>');
                
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
                            window.location = "slide"; 
                        }
                    });


                }
            }
        });

    }


}) 
/*============     FIN SOLTAR IMAGENES GESTOR SLIDER   =================*/



/*===================================================================
                        ELIMINAR UNA IMAGEN DEL SLIDER
======================================================================*/

// al hacer click borramos del front end tabto de la caja drag and drop como de la que muestra las imagenes subidas

$(".eliminarSlide").click(function(){

    //cuando falte un item por elimnar que regrese a 100px de alto
    if($(".eliminarSlide").length == 1 ){
        $("#columnasSlide").css({"height":"100px"});
    }
    // si hace click busca del elemento padre es decir de los <li> el atributo id 
     idSlide = $(this).parent().attr("id");

    //variable para eliminar de la carpeta del servidor una imagen del slide
    // buscamos  el atributo ruta de la etiqueta html span clikeada con this y obtenemos la ruta completa
     rutaSlide = $(this).attr("ruta");


     //lo quita visualemnte de la caja de drag and drop con .remove()
     $(this).parent().remove();
    //  tambien lo quita del editor
     $("#item"+idSlide).remove();

    //  console.log("idSlide", idSlide);




    //ELIMINAMOS IMAGEN DE LA BD

    var  borrarItem = new FormData();
    borrarItem.append("idSlide", idSlide);
    //enviamos al archivo ajax en php llamado gestorSlide.php
    borrarItem.append("rutaSlide", rutaSlide);

    $.ajax({
        url:"views/ajax/GestorSlide.php",
        method: "POST",
        data: borrarItem,
        cache: false,
        contentType: false,
        processData:false,
        success: function(respuesta){

          // console.log("respuesta", respuesta);
        }
    })


})


/*============   FIN ELIMINAR UNA IMAGEN DEL SLIDER   =================*/




/*===================================================================
                        EDITAR ITEM SLIDER
======================================================================*/
$(".editarSlide").click(function(){
    //buscamos el id del elemento html padre a lo que le estoy dando click
    idSlide = $(this).parent().attr("id");
    //en la caja padre reemplace por estoa elementos hijos html img, h1 y p obteniendo el valor de estos elementos
    rutaImagen = $(this).parent().children("img").attr("src");
    rutaTitulo = $(this).parent().children("h1").html();
    rutaDescripcion = $(this).parent().children("p").html();
   
    $(this).parent().html('<img src="'+rutaImagen+'" class="img-thumbnail"><input type="text" class="form-control" id="enviarTitulo" placeholder="Título" value="'+rutaTitulo+'"><textarea row="5" id="enviarDescripcion" class="form-control" placeholder="Descripción" >'+rutaDescripcion+'</textarea><button class="btn btn-info pull-right" id="guardar'+idSlide+'" style="margin:10px">Guardar</button>');
//cuando le de click al boton guaerdar ejecute la sigueinte funcion
    $("#guardar"+idSlide).click(function(){
        //eliminamos la palabra item con slice para enviar solo el id
        enviarId = idSlide.slice(4);
        //enviamos las demas valores
        enviarTitulo = $("#enviarTitulo").val();
        enviarDescripcion = $("#enviarDescripcion").val();
        //creamos la variableq eu se va a enviar con ajax ala archivo phph 
        var actualizarSlide = new FormData();
 
        actualizarSlide.append("enviarId", enviarId);
        actualizarSlide.append("enviarTitulo", enviarTitulo);
        actualizarSlide.append("enviarDescripcion", enviarDescripcion);

        $.ajax({
            url:"views/ajax/GestorSlide.php",
            method: "POST",
            data: actualizarSlide,
            cache: false,
            contentType: false,
            processData:false,
            dataType:"json",
            success: function(respuesta){
                $("#guardar"+idSlide).parent().html('<span class="fa fa-pencil editarSlide" style="background:blue"></span><img src="'+rutaImagen+'"style="float:left; margin-bottom:10px" width="80%"><h1>'+respuesta["titulo"]+'</h1> <p>'+respuesta["descripcion"]+'</p>');
                // usamos sweet alert

                swal({
                    title: "¡OK!",
                    text: "¡Se han guardado los cambios correctamente!",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            window.location = "slide"; 
                        }
                    });
            }
        });


    })


    //console.log("idSlide", idSlide);
});






/*============   FIN EDITAR ITEM SLIDER   =================*/





/*=============================================
ORDENAR SLIDE     
=============================================*/

/* Ordenar Slide */
var almacenarOrdenId = new Array();
var ordenItem = new Array();

//si doy click en el boton ordenar slide lo oculto y muestro el de guardar slide con .show() 
$("#ordenarSlide").click(function(){
    //tomamos el ul columnasSlide y le ponemos el cursor en modo move y ocultamos el icono de eliminar de la etiqeuta html span
	$( "#columnasSlide").css({"cursor":"move"})
	$( "#columnasSlide span").hide()
	//usamos la propiedad .sortable() de jqueryUI	 
	$( "#columnasSlide").sortable({
      	revert: true,
      	connectWith: ".bloqueSlide",
      	handle: ".handleImg",	
      	stop: function( event, ui ) {



      	for(var i= 0; i < $( "#columnasSlide li").length; i++){

      		almacenarOrdenId[i] = event.target.children[i].id;
            ordenItem[i] = i+1;
       
      		
      		}
      	}
    })

    $("#ordenarSlide").hide();
    $("#guardarSlide").show();

})

/* Guardar Orden Slide */ 
//si doy click en guardar slide muestre el boton ordenar slide 
$("#guardarSlide").click(function(){
    
	$("#ordenarSlide").show();
	$("#guardarSlide").hide();

	//  if(OrdenItem){

	// 	$("#textoSlide ul").html("")

		for(var i= 0; i < $( "#columnasSlide li").length; i++){
            var actualizarOrden = new FormData();
            actualizarOrden.append("actualizarOrdenSlide", almacenarOrdenId[i]);
            actualizarOrden.append("actualizarOrdenItem", ordenItem[i]);




            $.ajax({
                url:"views/ajax/GestorSlide.php",
                method: "POST",
                data: actualizarOrden,
                cache: false,
                contentType: false,
                processData:false,
                success: function(respuesta){
             	 $("#textoSlide ul").html(respuesta)

                  //  $("#guardar"+idSlide).parent().html('<span class="fa fa-pencil editarSlide" style="background:blue"></span><img src="'+rutaImagen+'"style="float:left; margin-bottom:10px" width="80%"><h1>'+respuesta["titulo"]+'</h1> <p>'+respuesta["descripcion"]+'</p>');
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
                                window.location = "slide"; 
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






















