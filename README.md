# Ejemplo Completo en CakePHP3
En este ejemplo se muestran las implementaciones de Paginación por Ajax, Filtro de Búsqueda, Ordenamiento de Columnas por parte de las tablas implicadas y además un sistema de usuarios y roles (RBAC) con distintos permisos según su rol. También se utiliza las opciones de lenguaje como el Inflector y el Locale.

# Lógica del Ejemplo
El ejemplo se basa en las tablas Ingredientes y Recetas, las cuales tienen relación n a n, es decir una receta puede tener muchos ingredientes, y un ingrediente puede ser utilizado en muchas recetas, para resolver esta parte se debe recordar que las relaciones n a n, terminan generando otra nueva relación(tabla) en la base de datos que contiene los IDs de las relaciones(tablas) participantes.
Con respecto a la funcionalidad, se diseño un ABM (Alta, Baja, Modificación) de Ingredientes y Recetas, pero para poder implementar el concepto de usuarios y roles, se estableció que los usuarios con el rol cocineros puedan realizar todas las acciones y los usuarios tipo usuario(valga la redundancia) solo listar Ingredientes y Recetas.
A sí mismo, se permite en la pantalla de acceso(login) la creación de mas usuarios, pero con el rol de usuario.

# A tener en cuenta
Se han utilizado plugins externos:  
Reglas de Inflector(Español 2017): http://gtechrl.blogspot.com.ar/2017/02/cakephp-3x-reglas-del-inflector-en.html  
CakeDC(Para los roles): https://github.com/CakeDC/users  
Idiomas(Locale): https://github.com/cakephp/localized  

# Instalacion
Para probar este ejemplo, se necesita tener instalado y activado el XAMPP con sus módulos Apache y MySQL. Se recomienda utilizar NetBeans para la administración del directorio de archivos. El archivo vendor.zip se debe descomprimir.  
*Ademas se adjunta una base de datos de prueba en el directorio bd con algunos registros de prueba.

# Version ONLINE
Para observar el ejemplo sin necesidad de instalar: http://reflejo.epizy.com/cakerbacft/  
Usuarios:  
Rodrigo_Lopez  
asd1234  
Cocinero_master  
asd1234
