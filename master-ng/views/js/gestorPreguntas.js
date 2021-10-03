/*----------------TOGGLE BOTTON AGREGAR PREGUNTA-------------
-------------------------------------------------------------*/

$("#btnAgregarPregunta").click(function () {
  $("#agregarPregunta").toggle(400);
});

/*----------  FIN TOGGLE BOTTON AGREGAR PREGUNTA---------------*/


































// /*----------------TOGGLE BOTTON BORRAR ENCUESTA-------------
// -------------------------------------------------------------*/

// var idBorrar=$("#borrar").val();
// var contador = $("#rutaBorrar"),length;
// console.log(idBorrar);

// for(var i; contador < i; i++){

//   $("#borrarEncuestado"+idBorrar).click(function () {

 

//     var rutaBorrar = "index.php?action=encuestas&idBorrar="+idBorrar;
//     console.log(rutaBorrar);
//     swal({
//       title: "¡Cuidado!",
//       text: "¡Esta acción no puede deshacerse!",
//       type: "warning",
//       showCancelButton: true,
//       cancelButtonText: "Cerrar",
//       confirmButtonText: "Borrar",
//       closeOnConfirm: false
//       },
//       function(isConfirm){
//           if (isConfirm) {
//               window.location =rutaBorrar; 
//           }
//     });
//   });

// }

// /*----------  FIN TOGGLE BOTTON AGREGAR PREGUNTA---------------*/























// /*----------------SUBIR IMAGEN EN EL INPUT-------------
// -------------------------------------------------------------*/

// $("#subirFoto").change(function () {
//   imagen = this.files[0];

//   // console.log('imagen', imagen);
//   /*---------------validar tamaño de la imagen ---------------*/
//   imagenSize = imagen.size;

//   if (imagenSize > 2000000) {
//     $("#arrastreImagenArticulo").before(
//       '<div class= "alert alert-warning alerta text-center"> El archivo excede el peso permitido, 2MB</div> '
//     );
//   } else {
//     $(".alerta").remove();
//   }

//   /*---------------validar tipo de imagen ---------------*/
//   imagenType = imagen.type;
//   //   console.log("imagenType", imagenType);
//   if (imagenType == "image/jpeg" || imagenType == "image/png") {
//     $(".alerta").remove();
//   } else {
//     $("#arrastreImagenArticulo").before(
//       '<div class= "alert alert-warning alerta text-center"> El archivo debe ser formaro JPG o PNG</div> '
//     );
//   }

//   /*--------------- Mostrar imagen con AJAX ---------------*/
//   if (
//     (Number(imagenSize) < 2000000 && imagenType == "image/jpeg") ||
//     imagenType == "image/png"
//   ) {
//     var datos = new FormData();
//     datos.append("imagen", imagen);
//     $.ajax({
//       url: "views/ajax/gestorArticulos.php",
//       method: "POST",
//       data: datos,
//       cache: false,
//       contentType: false,
//       processData: false,
//       beforeSend: function () {
//         $("#arrastreImagenArticulo").before(
//           '<img src="views/images/status.gif" id="status">'
//         );
//       },
//       success: function (respuesta) {
//         //console.log('respuesta', respuesta);
//         $("#status").remove();

//         if (respuesta == 0) {
//           $("#arrastreImagenArticulo").before(
//             '<div class= "alert alert-warning alerta text-center">La imagen es inferior a 800px x  400px</div> '
//           );
//         } else {
//           $("#arrastreImagenArticulo").html(
//             '<div id="imagenArticulo"><img src="' +
//               respuesta.slice(6) +
//               '" class="img-thumbnail"></div> '
//           );
//         }
//       },
//     });
//   }
// });

// /*----------  FIN SUBIR IMAGEN EN EL INPUT---------------*/

/*----------------EDITAR  ARTICULO-------------
-------------------------------------------------------------*/

// $(".editarPregunta").click(function () {
//   idPregunta = $(this).parent().parent().attr("id");
//   // rutaImagen = $("#" + idArticulo)
//   //   .children("img")
//   //   .attr("src");


//   // pregunta = $("#" + idPregunta)
//   //   .children("input")
//   //   .val();

//   $("#" + idPregunta).html(
//     '<form method="post" ><span><input type="submit" style="width:10%; padding:5px 0; margin-top:4px; " class="btn btn-primary pull-right" value="Guardar"></span><div id="editarImagen"><input type="file" style="display:none"  id="subirNuevaFoto" class="btn btn-default" ><div id="nuevaFoto"><span  class="fa fa-times cambiarImagen"></span><img src="' +
//       rutaImagen +
//       '" class="img-thumbnail"></div></div><input type="text" value="' +
//       titulo +
//       '" name="editarTitulo"><textarea cols="30" rows="5" name="editarIntroduccion">' +
//       introduccion +
//       '</textarea><textarea name="editarContenido" id="editarContenido" cols="30" rows="10">' +
//       contenido +
//       '</textarea><input type="hidden" value="' +
//       rutaImagen +
//       '" name="fotoAntigua"><input type="hidden" value="' +
//       idArticulo +
//       '" name="id"><hr></form>'
//   );

//   $(".cambiarImagen").click(function () {
//     $(this).hide();
//     $("#subirNuevaFoto").show();
//     $("#subirNuevaFoto").css({ width: "90%" });
//     $("#nuevaFoto").html("");
//     //agregamos atributos si se cambia una imagen
//     $("#subirNuevaFoto").attr("name", "editarImagen");
//     $("#subirNuevaFoto").attr("required", true);
//     console.log(rutaImagen);

//     $("#subirNuevaFoto").change(function () {
//       imagen = this.files[0];
//       imagenSize = imagen.size;

//       if (imagenSize > 2000000) {
//         $("#editarImagen").before(
//           '<div class= "alert alert-warning alerta text-center"> El archivo excede el peso permitido, 2MB</div> '
//         );
//       } else {
//         $(".alerta").remove();
//       }

//       /*---------------validar tipo de imagen ---------------*/
//       imagenType = imagen.type;
//       //   console.log("imagenType", imagenType);
//       if (imagenType == "image/jpeg" || imagenType == "image/png") {
//         $(".alerta").remove();
//       } else {
//         $("#editarImagen").before(
//           '<div class= "alert alert-warning alerta text-center"> El archivo debe ser formaro JPG o PNG</div> '
//         );
//       }

//       /*--------------- Mostrar imagen con AJAX ---------------*/
//       if (
//         (Number(imagenSize) < 2000000 && imagenType == "image/jpeg") ||
//         imagenType == "image/png"
//       ) {
//         var datos = new FormData();
//         datos.append("imagen", imagen);
//         $.ajax({
//           url: "views/ajax/gestorArticulos.php",
//           method: "POST",
//           data: datos,
//           cache: false,
//           contentType: false,
//           processData: false,
//           beforeSend: function () {
//             $("#nuevaFoto").before(
//               '<img src="views/images/status.gif" style="width:15%; margin-left:65px;" id="status2">'
//             );
//           },
//           success: function (respuesta) {
//             //console.log('respuesta', respuesta);
//             $("#status2").remove();

//             if (respuesta == 0) {
//               $("#editarImagen").before(
//                 '<div class= "alert alert-warning alerta text-center">La imagen es inferior a 800px x  400px</div> '
//               );
//             } else {
//               $("#nuevaFoto").html(
//                 '<div id="imagenArticulo"><img src="' +
//                   respuesta.slice(6) +
//                   '" class="img-thumbnail"></div> '
//               );
//             }
//           }, //function success
//         }); //ajax
//       } //if
//     }); //change
//   }); //cambiar imagen click
// }); //editar imagen

/*------------Ordenar item articulos ---------------*/
/*--------------------------------------------------*/
var almacenarOrdenId = new Array();
var ordenItem = new Array();

$("#ordenarArticulos").click(function () {
  //si hago click en el boton ordenar articulos oculta el boton mismo y muestra el de guardar
  $("#ordenarArticulos").hide();
  $("#guardarOrdenArticulos").show();

  //el mouse se cambia a move indicando que se puede mover un elemento
  $("#editarArticulo").css({ cursor: "move" });
  //ocultamos elementos html
  $("#editarArticulo span i").hide();
  $("#editarArticulo button").hide();
  $("#editarArticulo img").hide();
  $("#editarArticulo p").hide();
  $("#editarArticulo hr").hide();
  //eliminamos los div modales de cada articulo
  $("#editarArticulo div").remove();
  //estilos a los h1
  $(".bloqueArticulo h1").css({
    "font-size": "14px",
    position: "absolute",
    padding: "10px",
    top: "-15px",
  });

  $(".bloqueArticulo").css({ padding: "2px" });
  //mostramos icono move
  $("#editarArticulo span").html(
    '<i class="glyphicon glyphicon-move" style="padding:8px"></i>'
  );
  //animamos el scroll con jquery
  $("body, html").animate(
    {
      scrollTop: $("body").offset().top,
    },
    500
  );
  //activamos el sortable de jquery iu
  $("#editarArticulo").sortable({
    revert: true,
    connectWith: ".bloqueArticulo",
    handle: ".handleArticle",
    stop: function (event) {
      //en un ciclo for capturamos la cantidad de item en la bd
      for (var i = 0; i < $("#editarArticulo li").length; i++) {
        //almacenamos el id de cada elemento li

        almacenarOrdenId[i] = event.target.children[i].id;
        //almacenamos el orden desde 1
        ordenItem[i] = i + 1;
      }
    },
  });

  //si foy click en el boton guardar orden hago lo contario
  $("#guardarOrdenArticulos").click(function () {
    $("#ordenarArticulos").show();
    $("#guardarOrdenArticulos").hide();
    for (var i = 0; i < $("#editarArticulo li").length; i++) {
      var actualizarOrden = new FormData();
      //almacenamos los datos en varianle name
      actualizarOrden.append("actualizarOrdenArticulos", almacenarOrdenId[i]);
      actualizarOrden.append("actualizarOrdenItem", ordenItem[i]);

      $.ajax({
        url: "views/ajax/gestorArticulos.php",
        method: "POST",
        data: actualizarOrden,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
          // mostramos el orden actualizado con el maquetado original
          $("#editarArticulo").html(respuesta);

          // usamos sweet alert

          swal(
            {
              title: "¡OK!",
              text: "¡El orden se ha actualizado correctamente!",
              type: "success",
              confirmButtonText: "Cerrar",
              closeOnConfirm: false,
            },
            function (isConfirm) {
              if (isConfirm) {
                window.location = "articulos";
              }
            }
          );
        },
      });
    }
  });
});
