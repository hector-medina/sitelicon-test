# SITELICON TEST


Puedes utilizar cualquier framework, librería o clase que necesites o creas conveniente.  

## Ejercicio 1

### Descripción.
1. En la siguiente web, realizar un archivo js que sea capaz de mostrar las localidades correspondientes a la provincia elegida en el primer combo. Refrescar el combo de localidades mediante AJAX a medida que cambie el valor del primero. 
La url es la siguiente: 
http://sitelicon.eu/test/ 
La dirección que carga las localidades esta otra 
http://sitelicon.eu/test/ajax_localidades.php
Mandar únicamente un archivo js.

### Uso

Debido a la seguridad ajax cross-domain, al principio dará error y habrá que solicitar autorización en el siguiente enlace [https://cors-anywhere.herokuapp.com/corsdemo]( https://cors-anywhere.herokuapp.com/corsdemo). 

Al recargar la página ya funcionará.

## Ejercicio 2

### Descripción.
2. Maquetar el png adjunto con los tamaños, colores y espacios que se ven en la ilustración.

- El cuadro 1 y 2 no deben tener un alto fijo, únicamente deberán estar igualados en cuanto a tamaño dependiendo de cual de los cuadros sea el que tenga más contenido.
- El pie de debe ocupar todo el ancho del monitor, si la web tiene menos alto que el de nuestro monitor, el pie deberá permanecer en la parte inferior de la web.
- La web debe estar centrada, si nuestro monitor es más ancho, deberá quedar el mismo margen a la izquierda que a la derecha.
- Se valorará que toda la maquetación sea responsive.

### Observaciones.

He implementado responsive design.


## Ejercicio 3

### Descripción.

3.1. Según el .sql adjunto, desarrollar un Script en PHP que se conecte a la base de datos y muestre un listado con los nombres de todos los equipos de fútbol y su imagen en caso de tenerla.

### Uso

Se deberá lanzar por medio del navegador web el fichero **Ejercicio3.1.php**. Hay que tener php instalado, está probado en XAMPP.

### Descripción.

3.2. Con el listado de equipos del punto anterior, desarrollar un Script en PHP que realice un calendario de fútbol con sus respectivas jornadas.

- Dos equipos no se puedan enfrentar 2 veces entre ellos hasta haber completado la primera vuelta.
- Si el partido anterior se jugó en casa el siguiente se deberá jugar fuera, y viceversa.
- El script debe ser compatible con cualquier número de equipos definidos en la base de datos.
- Se valorará que también sea válido con un número de equipos impar, en ese caso un equipo descansaría cada jornada.

### Uso

Se deberá lanzar por medio del navegador web el fichero **Ejercicio3.2.php**. Hay que tener php instalado, está probado en XAMPP.

### Observaciones

Está implementado para número de equipos pares.
