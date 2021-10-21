// Cuando el documento se cargue. 
$(document).ready(function(){

    // Seleccionamos por defecto 
    loadCities( 1 );

    // Listener onChange en el selector de provincias.
    $("select#provincias").change(function(){
        var provinciaId = $(this).children("option:selected").val();
        loadCities( provinciaId );
        
    });
});


/**
 * Función que recive un id e inserta el xml devuelto con las ciudades
 * de la provincia seleccionada. 
 * 
 * Utilzamos el proxy cors-anywhere por el cross-domain error. 
 * 
 * @param {*} id = id de la provincia seleccionada.
 */
function loadCities( id ){
    $.ajax({url: "https://cors-anywhere.herokuapp.com/http://sitelicon.eu/test/ajax_localidades.php",
    dataType: 'html',      
    //dataType: 'jsonp',    
    crossDomain: true,
    type: "GET",
    data : {id:id},
    headers: {
        'Access-Control-Allow-Origin':'*',
    },
    success: function(result){
        $("#box_localidades").html(result);
    },
    error: function(err){
        alert("Se ha producido un error: "+err.state());
    }
})
}