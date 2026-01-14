# Conceptos Clave de MongoDB
###  Modelo de datos basado en documentos
A diferencia de las tablas, MongoDB guarda la información en documentos BSON (un JSON binario). Esto permite que cada registro tenga una estructura distinta si es necesario.

### NoSQL
Significa "Not Only SQL". Son bases de datos que no utilizan el modelo relacional tradicional. Son ideales para manejar grandes volúmenes de datos no estructurados o que cambian rápidamente.

### Escalabilidad horizontal
Mientras que en SQL sueles mejorar el servidor (Escalabilidad Vertical), en MongoDB puedes añadir más servidores baratos para repartir la carga. Esto se logra mediante una técnica llamada Sharding (fragmentación de datos).

### Consultas
Se realizan mediante el MQL (MongoDB Query Language). En lugar de SELECT * FROM..., usamos funciones de JavaScript como db.coleccion.find({ campo: "valor" }).

### Alta disponibilidad
MongoDB la garantiza a través de Replica Sets. Son copias de los mismos datos en diferentes servidores; si el servidor principal falla, otro toma su lugar automáticamente en segundos.

### Índices
Al igual que en un libro, los índices permiten a MongoDB encontrar datos sin tener que leer cada documento de la colección. Mejoran drásticamente la velocidad de búsqueda.

### Agregaciones
Es el "procesador" de datos de MongoDB. Mediante un Pipeline (tubería), puedes filtrar, agrupar y transformar los datos en etapas sucesivas para obtener estadísticas complejas.

#  Esquema de la Base de Datos Relacional de mandarinas

Consulta 0: Lista todas la colecciones

![nada](/ASGBD/No_Soy_Un_Mongo/Imagenes/Consulta0.png)

Consulta 1: Listar todos los usuarios

![nada](/ASGBD/No_Soy_Un_Mongo/Imagenes/Consulta1.png)


Consulta 2: Buscar pedidos de un usuario cuyo id sea 1

![nada](/ASGBD/No_Soy_Un_Mongo/Imagenes/Consulta2.png)


Consulta 3: Listar productos con precio mayor a 30

![nada](/ASGBD/No_Soy_Un_Mongo/Imagenes/Consulta3.png)


Consulta 4: Buscar pedidos que contengan un producto con id = 2

![nada](/ASGBD/No_Soy_Un_Mongo/Imagenes/Consulta4.png)


Consulta 5: Obtener usuarios que hayan realizado pedidos con un total mayor a 40

![nada](/ASGBD/No_Soy_Un_Mongo/Imagenes/Consulta5.png)


Consulta 6: Mostrar solo los nombres y correos de los usuarios

![nada](/ASGBD/No_Soy_Un_Mongo/Imagenes/Consulta6.png)


Consulta 7: Contar cuántos productos tienen un precio menor o igual a 50

![nada](/ASGBD/No_Soy_Un_Mongo/Imagenes/Consulta7.png)


Consulta 8: Encontrar usuarios que hayan pedido un producto llamado "Mouse"

![nada](/ASGBD/No_Soy_Un_Mongo/Imagenes/Consulta8.png)


Consulta 9: Listar productos únicos comprados en todos los pedidos

![nada](/ASGBD/No_Soy_Un_Mongo/Imagenes/Consulta9.png)


# B. Realiza lo mismo desde la interfaz gráfica MongoDB Compass creando una base de datos llamada mi_comercio2

![nada](/ASGBD/No_Soy_Un_Mongo/Imagenes/c1.png)

![nada](/ASGBD/No_Soy_Un_Mongo/Imagenes/c2.png)

![nada](/ASGBD/No_Soy_Un_Mongo/Imagenes/c3.png)

![nada](/ASGBD/No_Soy_Un_Mongo/Imagenes/c4.png)

![nada](/ASGBD/No_Soy_Un_Mongo/Imagenes/c5.png)

![nada](/ASGBD/No_Soy_Un_Mongo/Imagenes/c6.png)

![nada](/ASGBD/No_Soy_Un_Mongo/Imagenes/c7.png)

![nada](/ASGBD/No_Soy_Un_Mongo/Imagenes/c8.png)

![nada](/ASGBD/No_Soy_Un_Mongo/Imagenes/c9.png)

![nada](/ASGBD/No_Soy_Un_Mongo/Imagenes/c10.png)

# Reflexión sobre las diferencias entre trabajar con MongoDB desde la terminal y desde Compass, destacando ventajas y desventajas de cada método.

Me gusta mucho más el compass ya que a mi parecer partiendo de la base de que supieses como funciona el buscar en terminal, es muchisimo más fácil de usar, quitando un unico aspecto y es que tienes que hacerte a todo lo que te ofrece la aplicación en cuanto a opciones pestañas y tal, pero vamos sin duda me metía antes a compass que a terminal.