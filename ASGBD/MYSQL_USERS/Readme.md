
# USERS_MYSQL

Indica el nombre de las tablas que aparecen en tu base de datos mysql.
![descripcion](/ASGBD/MYSQL_USERS/1.png)
Crea el usuario "Bego" con contraseña "Begoña" para que pueda acceder desde localhost.
![descripcion](/ASGBD/MYSQL_USERS/2.png)
Crea el usuario "Mati" con contraseña "Mati90" para que pueda acceder desde el dominio lasalleinstitucion.es.
![descripcion](/ASGBD/MYSQL_USERS/3.png)
Crea el usuario "Mifli" con contraseña "topol45" para que pueda acceder desde el dominio lasalleinstitucion.es.
![descripcion](/ASGBD/MYSQL_USERS/4.png)
Muestra los usuarios creados (los que están en la tabla user de la base de datos mysql). Indica la sentencia que has utilizado para mostrar esos usuarios.
![descripcion](/ASGBD/MYSQL_USERS/5.png)
Muestra el usuario con el que te has logado, utilizando para ello una función. Indica la sentencia que has utilizado para ello.
![descripcion](/ASGBD/MYSQL_USERS/6.png)
Cambia la contraseña de Mati, de manera que la nueva contraseña sea "minuevacontraseña". Indica la sentencia que has utilizado para ello.
![descripcion](/ASGBD/MYSQL_USERS/7.png)
Muestra los privilegios del usuario Bego. Indica la sentencia que has utilizado para ello.
![descripcion](/ASGBD/MYSQL_USERS/8.png)
Muestra los privilegios del usuario con el que te has logado. Indica la sentencia que has utilizado para ello.
![descripcion](/ASGBD/MYSQL_USERS/9.png)
Concede permisos al usuario Bego de lectura y actualización sobre la tabla usuario.
![descripcion](/ASGBD/MYSQL_USERS/10.png)
Conéctate como Bego y lanza una sentencia select y otra update sobre la tabla usuario. Lanza también una sentencia delete. Muestra las sentencias y sus efectos sobre la base de datos de la red social.
![descripcion](/ASGBD/MYSQL_USERS/11.png)
Concede permisos al usuario Mati de borrado sobre la tabla grupo.
![descripcion](/ASGBD/MYSQL_USERS/12.png)
Crea el usuario Crispula con contraseña "rosita" para que pueda acceder desde el dominio lasalleinstitucion.es y con permiso de lectura, actualización y borrado sobre las tablas usuario, grupo y comentario. Concede además permisos a Crispula para que pueda conceder sus permisos a otros usuarios.
![descripcion](/ASGBD/MYSQL_USERS/13.png)
Conéctate con el usuario Crispula.
![descripcion](/ASGBD/MYSQL_USERS/14.png)
Inserta un registro en la tabla comentario. Actualiza un registro en la tabla grupo. Muestra las sentencias y su resultado al ejecutarlas sobre la base de datos de la red social.
![descripcion](/ASGBD/MYSQL_USERS/15.png)
Concede permiso de borrado sobre la tabla usuario a Bego. Muestra la sentencia utilizada y el resultado de su ejecución.
![descripcion](/ASGBD/MYSQL_USERS/16.png)
Concede permiso de lectura y actualización sobre la tabla grupo a Mati. Muestra la sentencia utilizada y el resultado de su ejecución.
![descripcion](/ASGBD/MYSQL_USERS/17.png)
Vuelve a conectarte con tu usuario de mysql.
![descripcion](/ASGBD/MYSQL_USERS/18.png)
Concede permisos totales sobre todas las tablas de la base de datos de la red social a Mifli. Muestra la sentencia utilizada y el resultado de su ejecución.
![descripcion](/ASGBD/MYSQL_USERS/19.png)
Quítale permisos de borrado sobre todas las tablas de la base de datos de la red social a Mifli. Muestra la sentencia utilizada y el resultado de su ejecución.
![descripcion](/ASGBD/MYSQL_USERS/20.png)
Muestra los usuarios creados y sus privilegios (los que están en la tabla user de la base de datos mysql). Indica la sentencia que has utilizado para mostrar esos usuarios.
![descripcion](/ASGBD/MYSQL_USERS/21.png)
Cambia la contraseña del usuario Mifli modificando directamente la tabla user. Indica la sentencia que has utilizado para ello.
![descripcion](/ASGBD/MYSQL_USERS/22.png)
¿Es necesaria hacer FLUSH PRIVILEGES después de la sentencia anterior? Explica el porqué y para qué sirve FLUSH PRIVILEGES.
Sí, es necesario ejecutar `FLUSH PRIVILEGES` cuando se modifican directamente las tablas del sistema.
Esto se debe a que MySQL carga los privilegios en memoria al iniciar, y `FLUSH PRIVILEGES` obliga al servidor a recargar esos datos para que los cambios surtan efecto.  
¿Puedo utilizar la función PASSWORD con GRANT? Justifica tu respuesta.
No.
Desde MySQL 5.7, la función PASSWORD() está en desuso y no se puede usar junto con GRANT.
La forma correcta de crear usuarios o cambiar contraseñas es mediante CREATE USER o ALTER USER, especificando la contraseña directamente:
Elimina el usuario Mifli. Muestra la sentencia utilizada y el resultado de su ejecución.
![descripcion](/ASGBD/MYSQL_USERS/25.png)