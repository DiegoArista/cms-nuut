$(document).ready(function(){
   
    $("#FormEncuest").on("submit", function(e){
        // $("#verRespuestas").on("click", function(e){
            // e.preventDefault();
// ojo

var email = $("#email").val();

var idEncuesta = $("#idEncuesta").val();

// if(idEncuesta == 0){
//     idEncuesta = 1;

// } else {
//     idEncuesta +1;
// }
console.log(idEncuesta); 

        var ArrayPreguntas = [];
        var NumPreguntas = $(".card-body .respuestaPregunta");
        

     





var NumRespuesta = $(".custom-control-input");
// var ever = NumRespuesta.length;
// console.log(ever);

var ArrayRespuestas = [];

var obj = $('.respuestas').find(':checkbox');

// var childCount = obj.size();
var checkedCount =  obj.filter(':checked');





// let arrayR = [];
// for (let respu of checkedCount){
//     arrayR[i] +=  respu[i].value;
// }
// console.log("ever", arrayR);







var cara1 = $("#cara1"+idP);
var cara2 =$("#pregunta2"+idP);
var cara3 =$("#item3"+idP);
var cara4 =$("#cuestion4"+idP);
var cara5 = $("#encuesta5"+idP);




    for (let i = 0; i < checkedCount.length; i++){
        if (cara1.is(':checked') ){
            ArrayRespuestas[i] = checkedCount[i].value;
           
        } else{
            console.log("No se ha seleccioando");
        }
        if (cara2.is(':checked')  ){
            ArrayRespuestas[i] = checkedCount[i].value;
           
        }else{
            console.log("No se ha seleccioando");
        }

        if (cara3.is(':checked')){
            ArrayRespuestas[i] = checkedCount[i].value;
           
        }else{
            console.log("No se ha seleccioando");
        }

        if (cara4.is(':checked')){
            ArrayRespuestas[i] = checkedCount[i].value;
           
        }else{
            console.log("No se ha seleccioando");
        }

        if (cara5.is(':checked')){
            ArrayRespuestas[i] = checkedCount[i].value;
            
        }else{
            console.log("No se ha seleccioando");
        }























    

    
}



















// analizar codigo






for (let i = 0; i < NumPreguntas.length; i++){
    var idP = $("#idPregunta").val();
    ArrayPreguntas[i] = NumPreguntas[i].value;










    
}
console.log(ArrayPreguntas);
console.log(email);




console.log(ArrayRespuestas);








    
    // TodasPreguntas = preguntas[i];
    // TodasRespuestas = respuestas[i];
    // ArrayPreguntas.push(TodasPreguntas.value);
    // ArrayRespuestas.push(TodasRespuestas.valie);


    // imagen = archivo[i];
    // imagenSize.push(imagen.size);
    // ArrayRespuestas.push(imagen.type);


for(let i; i < NumPreguntas.length; i++){
    var guardarRespuestas = new FormData();
    guardarRespuestas.append("idEncuesta", idEncuesta[i]);
    guardarRespuestas.append("guardarIdPreguntas", ArrayPreguntas[i]);
    guardarRespuestas.append("guardarIdRespuestas", ArrayRespuestas[i]);
    guardarRespuestas.append("email", email[i]);
   
    console.log("ARRAY A ENVIAR", guardarRespuestas);
   
    $.ajax({
        url:"views/ajax/gestorRespuestas.php",
        method: "POST",
        data: guardarRespuestas,
        cache: false,
        contentType: false,
        processData:false,
        success: function(respuesta1){
        //   $("#FormEncuesta").html(respuesta1)

          console.log("ojo", ArrayRespuestas);
           // usamos sweet alert

            // swal({
            //     title: "¡OK!",
            //     text: "¡Las respuestas se han guardado correctamente!",
            //     type: "success",
            //     confirmButtonText: "Cerrar",
            //     closeOnConfirm: false
            //     },
            //     function(isConfirm){
            //         if (isConfirm) {
            //             window.location = "encuestas"; 
            //         }
            //   });
        }
    });  
}
   



    });
  });








