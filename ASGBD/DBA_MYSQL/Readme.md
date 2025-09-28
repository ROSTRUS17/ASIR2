## Empresa 1

- Miles de usuarios simultáneos.

- Muchas escrituras y lecturas al mismo tiempo (compras, inventario, consultas de productos).

- Altísima concurrencia en tiempo real.

- Prioridad absoluta en consistencia e integridad de transacciones.

- Tiempos de respuesta bajos = rendimiento crítico.

| Parámetro                      | Valor recomendado                | Explicación breve                                  |
|--------------------------------|----------------------------------|----------------------------------------------------|
| innodb_buffer_pool_size        | 6G (60-70% de la RAM)            | Mantiene datos recientes en memoria para rapidez   |
| innodb_log_file_size           | 512M                             | Balance entre escrituras frecuentes y seguridad    |
| max_connections                | 2000                             | Soporta miles de clientes simultáneos              |
| query_cache_size               | 0 (deshabilitado)                | Evita bloqueos en transacciones concurrentes       |
| table_open_cache               | 4000                             | Muchas tablas abiertas a la vez                    |
| tmp_table_size                 | 128M                             | Tablas temporales necesarias en búsquedas rápidas  |
| max_heap_table_size            | 128M                             | Igual que tmp_table_size para evitar desbordes     |
| innodb_flush_log_at_trx_commit | 1                                | Consistencia total en cada transacción             |
| log_bin                        | ON                               | Respaldos, auditoría y replicación                 |
| slow_query_log                 | ON                               | Detectar consultas lentas                          |
| slow_query_log_file            | /var/log/mysql/slow.log          | Guardar consultas lentas en archivo                |
| long_query_time                | 1                                | Marca lentas consultas > 1 seg                     |
| bind-address                   | 0.0.0.0 (si acceso remoto)       | Acceso desde múltiples servidores front-end        |
| innodb_file_per_table          | ON                               | Manejo individual de tablas de productos/inventario|
| performance_schema             | ON                               | Monitorizar cargas en tiempo real                  |
---
## Empresa 2
 
- Grandes volúmenes de datos históricos.

- Consultas complejas de agregación (lectura intensiva).

- Escrituras periódicas pero no en tiempo real.

- Carga de trabajo de análisis (lecturas pesadas).Grandes volúmenes de datos históricos.

- Consultas complejas de agregación (lectura intensiva).

- Escrituras periódicas pero no en tiempo real.

- Carga de trabajo de análisis (lecturas pesadas).

| Parámetro                      | Valor recomendado                | Explicación breve                                |
|--------------------------------|----------------------------------|--------------------------------------------------|
| innodb_buffer_pool_size        | 8G (70-80% de la RAM disponible) | Más memoria para cachear datos y mejorar lecturas|
| innodb_log_file_size           | 1G                               | Soporta transacciones grandes sin fragmentación   |
| max_connections                | 300                              | Permite varias conexiones concurrentes            |
| query_cache_size               | 0 (deshabilitado)                | Evita cuellos de botella en consultas complejas   |
| table_open_cache               | 4000                             | Mantiene muchas tablas abiertas en memoria        |
| tmp_table_size                 | 512M                             | Soporta consultas grandes con tablas temporales   |
| max_heap_table_size            | 512M                             | Igual que tmp_table_size para evitar desbordes    |
| innodb_flush_log_at_trx_commit | 2                                | Menos escritura en disco, mejor rendimiento       |
| log_bin                        | ON                               | Necesario para backups y replicación              |
| slow_query_log                 | ON                               | Detectar consultas lentas                         |
| slow_query_log_file            | /var/log/mysql/slow.log          | Guardar consultas lentas en archivo               |
| long_query_time                | 2                                | Marca como lenta cualquier consulta > 2 seg       |
| bind-address                   | 0.0.0.0 (si acceso remoto)       | Permite conexiones desde fuera si es necesario    |
| innodb_file_per_table          | ON                               | Mejora manejo de tablas grandes                   |
| performance_schema             | ON                               | Monitorización y análisis de rendimiento          |
---
## Empresa 3


- Muchas lecturas concurrentes (perfiles, posts, comentarios).

- Escrituras menos frecuentes, pero requieren consistencia inmediata (que un cambio se vea enseguida).

- Alta concurrencia de usuarios conectados simultáneamente.

- Necesidad de disponibilidad y coherencia de datos.


| Parámetro                      | Valor recomendado                | Explicación breve                                 |
|--------------------------------|----------------------------------|---------------------------------------------------|
| innodb_buffer_pool_size        | 6G (60-70% de la RAM)            | Mantiene datos y perfiles en memoria para lecturas|
| innodb_log_file_size           | 512M                             | Maneja escrituras medianas con consistencia rápida |
| max_connections                | 1000                             | Soporta muchos usuarios concurrentes              |
| query_cache_size               | 0 (deshabilitado)                | Mejor desactivado para entornos concurrentes       |
| table_open_cache               | 2000                             | Mantiene tablas frecuentes abiertas en memoria     |
| tmp_table_size                 | 256M                             | Consultas que necesitan tablas temporales          |
| max_heap_table_size            | 256M                             | Igual que tmp_table_size para evitar desbordes     |
| innodb_flush_log_at_trx_commit | 1                                | Consistencia fuerte en cada escritura              |
| log_bin                        | ON                               | Necesario para backups/replicación                 |
| slow_query_log                 | ON                               | Detectar consultas lentas                          |
| slow_query_log_file            | /var/log/mysql/slow.log          | Guardar consultas lentas en archivo                |
| long_query_time                | 1.5                              | Marca lentas consultas > 1,5 seg                   |
| bind-address                   | 0.0.0.0 (si acceso remoto)       | Permite acceso desde la red de servidores          |
| innodb_file_per_table          | ON                               | Mejor administración de tablas individuales        |
| performance_schema             | ON                               | Monitorización en sistemas de alta concurrencia    |
---
## Configuración MaríaDB
![Imagen Jupyter](/ASGBD/DBA_MYSQL/Imagenes/ConfigMariaDB.png)


### Explicaciones
**innodb_buffer_pool_size**  
Valor: 70–80% de la RAM disponible  
→ Almacena datos e índices de InnoDB en memoria y mejora el rendimiento de consultas.  

**innodb_log_file_size**  
Valor: 256M – 1G  
→ Tamaño del log de transacciones; más grande = menos escrituras, pero recuperación más lenta.  

**max_connections**  
Valor: 200–500  
→ Número máximo de conexiones simultáneas que acepta MySQL.  

**query_cache_size**  
Valor: 0 (MySQL ≥ 5.7) / 64M (antiguo)  
→ Cachea resultados de consultas; está obsoleto en versiones recientes.  

**table_open_cache**  
Valor: 2000–4000  
→ Número de tablas abiertas que MySQL mantiene en caché para acelerar accesos.  

**tmp_table_size**  
Valor: 64M – 256M  
→ Tamaño máximo de tablas temporales en memoria antes de pasarlas a disco.  

**max_heap_table_size**  
Valor: 64M – 256M  
→ Límite para tablas MEMORY; conviene igualarlo a `tmp_table_size`.  

**innodb_flush_log_at_trx_commit**  
Valor: 1 (seguro) / 2 (más rápido)  
→ Controla la frecuencia de escritura de logs; 1 garantiza durabilidad, 2 mejora rendimiento.  

**log_bin**  
Valor: ON  
→ Activa el binary log; necesario para replicación y recuperación.  

**slow_query_log**  
Valor: ON  
→ Registra consultas lentas para detectar problemas de rendimiento.  

**slow_query_log_file**  
Valor: /var/log/mysql/slow.log  
→ Archivo donde se guardan las consultas lentas.  

**long_query_time**  
Valor: 1s – 2s  
→ Tiempo a partir del cual una consulta se considera lenta y se registra.  

**bind-address**  
Valor: 0.0.0.0 (remoto) o IP específica (seguridad)  
→ Define desde qué direcciones IP se aceptan conexiones.  

**innodb_file_per_table**  
Valor: ON  
→ Cada tabla tiene su propio tablespace; facilita mantenimiento y recuperación de espacio.  

**performance_schema**  
Valor: ON   
→ Activa la monitorización de rendimiento y métricas internas de MySQL.