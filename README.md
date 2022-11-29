# Proyecto Final Internet of Things

# Equipo

* Pablo Javier Arreola Velasco
* Ricardo Rosales Castañeda
* Erick Cabrera González
* Cristian Arturo Díaz
* Miguel Angel Tena García 


## Sobre el proyecto

Las predicciones meteorólogicas necesitan más datos para realizar mejores predicciones, la recolección de datos atmosféricos es caro, el objetivo del proyecto es la creación de estaciones de monitoreo más accesibles que puedan generar más datos meteorológicos utilizando conceptos de internet of things. El proyecto también contempla la creación de una página web en la que los usuarios puedan consultar las mediciones de nuestras primeras estaciones. Los primeros prototipos estarán ubicados en el Tecnológico de Monterrey campus Querétaro.

## El hardware detrás del proyecto

Para la creación de las estaciones se utilizo el microcontrolador MCU SP8266MOD, sensores de temperatura, humedad, presión y luz ambiental, se utilizó el lenguaje de programación C para sistematizar el comportamiento de las estaciones y se consideró el uso de una PCB y un contenedor por impresión 3D. 

[Diseño de la estación](https://user-images.githubusercontent.com/110910843/204659730-398b251d-ac4a-4d0c-b67a-6aa4eaf1cb2a.jpeg)

[Diseño de la PCB](https://user-images.githubusercontent.com/110910843/204660313-ffeded9c-e22c-4c13-88ed-9ac9bd159cd5.jpeg)


## El software detrás del proyecto

Para la creación de la página se utilizó bootstrap, HTML y CSS para la estilización, en cuanto el backend se utilizó PHP y XML.



## Archivos

1) Asssets, contiene todas las imágenes, vectores y gifs que estilizaron el proyecto
2) climatec, contiene la configuración de la primera estación de monitoreo
3) climatec1, contiene la configuración de segunda estación, se diferencía de la primer estación por la conexión a la base de datos
4) css, contiene las hojas de estilos utilizadas durante el proyecto
5) db, contiene el script utilizado para la creación de la base de datos
6) js, contiene los scripts utilizados para la creación de la página
7) php, contiene:
* conection.php, administra la conexión con la base de datos, es utilizado por otros códigos
* data.php, modifica las tarjetas que indican el clima dependiendo de los valores de la base de datos
* data_post.php, registra las mediciones de la primera estación en la base de datos
* data_post1.php, registra las mediciones de la segunda estación en la base de datos
* login.php y logout.php, agregan funcionalidad de inicio de sesión y de cierre de sesión a la página
* map.php, modifica las animaciones del mapa de las estaciones dependiendo de las mediciones
* register.php, implementa la funcionalidad de registro a la página web
* session.php, compara el incio de sesión del usuario con los datos de sesiones de la base de datos
8) index.php, código HTML de la página principal
9) project.php, código HTML de la página de explicación del proyecto
