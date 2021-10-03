/*=============MOSTRAR FORMULARIO REGISTRO PERFIL=============
===============================================================*/
$("#registrarPerfil").click(function(){

    $("#formularioPerfil").toggle("fast");


})

/*=============SUBIR FOTO DE PERFIL=============
===============================================================*/


$("#subirFotoPerfil").change(function(){

    $("#subirFotoPerfil").attr("name", "nuevaImagen");

})



/*=============MOSTRAR FORMULARIO EDITAR PERRFIL=============
===============================================================*/
$("#btnEditarPerfil").click(function(){

    $("#editarPerfil").hide("fast");
    $("#formEditarPerfil").show("fast");
    
  


})

$("#cambiarFotoPerfil").change(function(){

    $("#cambiarFotoPerfil").attr("name", "editarImagen");

})
