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