
function recargaautomatica(){
//location.reload();


}

function muestra_oculta(id) 
	{
	    if (document.getElementById)
	     { //se obtiene el id
	        var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
	        el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
	   		
	   	 }
	}

window.onload = function () {
  
validarSesion();
mapa();
          
}

function mapa() {
  var mapOptions = {
    center: new google.maps.LatLng(-34.397, 150.644),
    zoom: 8,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById("mapa"),
      mapOptions);
}


//$(window).on("navigate", function () {
    //validarSesion();
    //var direction = data.state.direction;
    //if ( !! direction) {
     //   alert(direction);
  // }
//});




//$(window).on('navigate', function() {
  //alert('jjnj');
// validarSesion();
//});




function validarSesion()    
{
   //location.reload();
  // alert(baseurl+"usuario_control/verificarsesion");
         $.ajax({
            url: baseurl+"usuario_control/verificarsesion",
            type:"POST",
            data: {data:""},
            success: function( result ) {
           if (result!="true")
           {
            setTimeout(5); 
             alert("La Sesión Expiró");
           redireccionar();
           }
            //
           },
           error: function () { 
                console;log("error de conexión");      
              } 
           });
  
}

function redireccionar(){
		location.href="http://localhost:8080/mundo";
		//alert("La sesion a Expirado");
} 


function cerrar_sesion(url)    
{
   //location.reload();
   if(baseurl.indexOf('administrador/') >= 0)
   {

   }
   else
   {
      $.ajax({
            url: baseurl+url,
            type:"POST",
            data: {data:""},
            success: function( result ) {
           
            alert("Sesión Cerrada");
            location.reload();
              
              
           },
           error: function () {
                console;log("error de conexión");      
              } 
           });
  }
}
 //tiempo expresado en milisegundos</script>
//setTimeout ("redireccionar()", 50);
//location.href="http://localhost:8080/mundo";
//redireccionar();
	//alert("listo");
	//url: baseurl+url,
function cargar_modulo(url)    
{
  validarSesion()
switch (true) {
    case (baseurl.indexOf('administrador/') >= 0):
        var res = baseurl.replace("administrador/", ""); 
        baseurl = res;
        break;
    case (baseurl.indexOf('ST1') >= 0):
        day = "Monday";
        break;
    case (baseurl.indexOf('ST1') >= 0):
        day = "Tuesday";
        break;
} 
$.ajax({
      url: baseurl+url,
      type:"POST",
      data: {data:""},
      success: function( result ) {
      	
      
        $('#contenido').html(result);
        
        
     },
     error: function () {
          console;log("error de conexión");      
        } 
     });

}
