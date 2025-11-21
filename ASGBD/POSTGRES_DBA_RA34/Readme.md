# POSTGRES_DBA_RA34

## Instalación de PostgreSQL en Linux

1
![img](/ASGBD/POSTGRES_DBA_RA34/1.png)

2
![i](/ASGBD/POSTGRES_DBA_RA34/2.png)
3
![i](/ASGBD/POSTGRES_DBA_RA34/3.png)

## PostgreSQL: Gestión de Información de Equitación en la la DB EquitacionSuave

Paso 1: Crear la base de datos

![i](/ASGBD/POSTGRES_DBA_RA34/4.png)

Paso 2: Crear las tablas principales

![i](/ASGBD/POSTGRES_DBA_RA34/5.png)

![i](/ASGBD/POSTGRES_DBA_RA34/6.png)

## 3. Gestión de Usuarios y Roles

Ejercicio 1: Crear usuarios con distintos niveles de permisos

![i](/ASGBD/POSTGRES_DBA_RA34/7.png)

Ejercicio 2: Asignar permisos

![i](/ASGBD/POSTGRES_DBA_RA34/8.png)

## 4. Inserción de Datos

![i](/ASGBD/POSTGRES_DBA_RA34/9.png)

## 5. Consultas de Datos

![i](/ASGBD/POSTGRES_DBA_RA34/10.png)

## 6. Actualización y Eliminación de Datos

![i](/ASGBD/POSTGRES_DBA_RA34/11.png)

## Uso de PGadmin para administración visual

## 1. Conexión al servidor de postgreSQL

![i](/ASGBD/POSTGRES_DBA_RA34/16.png)
![i](/ASGBD/POSTGRES_DBA_RA34/17.png)
![i](/ASGBD/POSTGRES_DBA_RA34/21.png)
![i](/ASGBD/POSTGRES_DBA_RA34/18.png)

## 2. Base de datos equitacionsuave en pgAdmin

![i](/ASGBD/POSTGRES_DBA_RA34/22.png)

## 3. Tablas jinetes y caballos en pgAdmin

![i](/ASGBD/POSTGRES_DBA_RA34/23.png)

## 4. Insertar y consultar datos

![i](/ASGBD/POSTGRES_DBA_RA34/24.png)
![i](/ASGBD/POSTGRES_DBA_RA34/25.png)
![i](/ASGBD/POSTGRES_DBA_RA34/26.png)

## 5 .Crear y administrar usuarios y roles en pgAdmin

En el árbol de objetos, navega hasta tu tabla (ej: jinetes).

Haz clic derecho en la tabla -> Properties (Propiedades).

Ve a la pestaña Security (Seguridad).

Haz clic en el + para añadir un nuevo Grantee (Beneficiario).

Selecciona el rol (ej: admin_equitacion).

Marca las casillas de Grant (Permitir) que correspondan (todas para admin_equitacion, solo SELECT para user_lectura).

Repite para la tabla caballos y para cada uno de los tres usuarios.

![i](/ASGBD/POSTGRES_DBA_RA34/27.png)
![i](/ASGBD/POSTGRES_DBA_RA34/28.png)
![i](/ASGBD/POSTGRES_DBA_RA34/29.png)

## 

## Uso de JSON en la tabla de jinetes

![i](/ASGBD/POSTGRES_DBA_RA34/30.png)
![i](/ASGBD/POSTGRES_DBA_RA34/31.png)

## Uso de ARRAYS

![i](/ASGBD/POSTGRES_DBA_RA34/32.png)

## Creación de vista materializada

![i](/ASGBD/POSTGRES_DBA_RA34/33.png)
![i](/ASGBD/POSTGRES_DBA_RA34/34.png)


## Herencia en Tablas

![i](/ASGBD/POSTGRES_DBA_RA34/35.png)
![i](/ASGBD/POSTGRES_DBA_RA34/36.png)
![i](/ASGBD/POSTGRES_DBA_RA34/37.png)