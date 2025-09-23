| Parámetro | Valor | Porqué |
|-|-| - |
| innodb_buffer_pool_size |  HOla | caca |
| innodb_log_file_size | chochete | los amo |
| max_connections | 
| query_cache_size |
| table_open_cache |
| tmp_table_size |
| max_heap_table_size |
| innodb_flush_log_at_trx_commit |
| log_bin |
| slow_query_log |
| slow_query_log_file |
| long_query_time |
| bind-address |
| innodb_file_per_table |
| performance_schema |

---

### Explicaciones y valores sugeridos

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