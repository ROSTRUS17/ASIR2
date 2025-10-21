# DBA_SQLITE

### 1.1. CREACIÓN DE TABLAS Y ESTRUCTURA

![imagen](/ASGBD/DBA_SQLITE_RA12/1.png)

![imagen](/ASGBD/DBA_SQLITE_RA12/2.png)

### 1.2. TAMAÑO Y MÁS

Consulta de Tamaño en MariaDB:

![imagen](/ASGBD/DBA_SQLITE_RA12/3.png)

Optimización como DBA:

    OPTIMIZE TABLE NombreTabla; para liberar espacio fragmentado.

    Asegurar tipos de datos precisos (VARCHAR(N) pequeño en lugar de TEXT si es posible).

    Ajustar innodb_buffer_pool_size en el archivo de configuración (my.cnf).

### 2. Optimización del rendimiento y mantenimiento

![imagen](/ASGBD/DBA_SQLITE_RA12/4.png)

### 3. Copias de seguridad y restauración

3.1. Realización de una copia de seguridad

![imagen](/ASGBD/DBA_SQLITE_RA12/5.png)


3.2. Realiza la restauración

![imagen](/ASGBD/DBA_SQLITE_RA12/6.png)

3.3. Automatización de backups
![imagen](/ASGBD/DBA_SQLITE_RA12/7.png)

Le damos premisos de ejecución

![imagen](/ASGBD/DBA_SQLITE_RA12/7_5.png)

Esto hará que se repita a las 23:59

![imagen](/ASGBD/DBA_SQLITE_RA12/8.png)

### 4. Preguntas sin Chatgpt ni IAs:

    ¿Cómo impactan los cambios en el PRAGMA en el rendimiento y la seguridad de la base de datos? MariaDB usa Variables de Sistema (no PRAGMAS). Afectan el rendimiento al controlar el uso de memoria (innodb_buffer_pool_size) y el límite de consultas lentas (long_query_time). Afectan la seguridad a través de variables de red (skip-networking) y control de privilegios de acceso.

    ¿Qué mecanismos adicionales usarías para proteger una base de datos SQLite en un entorno de producción?

        Cifrado del archivo de base de datos (ej. SQLCipher).

        Control de Acceso al Archivo (ACLs/Permisos de SO) para restringir el acceso solo al proceso de la aplicación.

        Almacenamiento en una ubicación segura, fuera del directorio web público.

    ¿Qué diferencia existe entre los modos de journaling como DELETE, TRUNCATE y WAL en SQLite?

        DELETE/TRUNCATE: Bloquean toda la base de datos (lectores y escritores) durante el COMMIT. Usan un journal de retroceso.

        WAL (Write-Ahead Logging): Permite que múltiples lectores accedan a la base de datos mientras un escritor está activo (mejor concurrencia). Las modificaciones se escriben primero en un archivo de log separado. Es el más rápido.