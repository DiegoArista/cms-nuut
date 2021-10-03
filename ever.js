idRespuesta1 = $("#cara1"+id).val();
idRespuesta2 = $("#pregunta2"+id).val();
idRespuesta3 = $("#item3"+id).val();
idRespuesta4 = $("#cuestion4"+id).val();
idRespuesta5 = $("#encuesta5"+id).val();
idPregunta = $(".respuestaPregunta"+id).val();

console.log(idRespuesta1);
console.log(idRespuesta2);
console.log(idRespuesta3);
console.log(idRespuesta4);
console.log(idRespuesta5);



//for para recolectar el id y el orden de cada item 
for(var i= 0; i < $( "#guardarEncuesta .respuestaPregunta").length; i++){

    almacenarId[i] = target.children[i].id;
    almacenarRespuesta[i] = i+1;

    
    }
    $("#guardar").on("click", function(){
 

        totalRespuestas = $(".respuestas").length;
       
        console.log(totalRespuestas);
    
    
    
    
    
    
    });