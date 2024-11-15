# 📘 Documentación del Proyecto: Parle

Este documento describe el sistema básico de gestión de posts desarrollado como parte de una prueba técnica. A continuación, se detallan los objetivos, requisitos cumplidos, y la implementación de cada funcionalidad.

---

## 🎯 Objetivo

Desarrollar un sistema básico que permita:

1. Registrar y autenticar usuarios con medidas de seguridad básicas.
2. Crear y gestionar posts en un entorno tipo blog.
3. Conectar la aplicación a una base de datos relacional (MySQL).
4. Implementar pruebas unitarias para validar funcionalidades clave.

---

### 1. Estructura Básica

#### Sistema en PHP con POO

El sistema está desarrollado siguiendo principios de **Programación Orientada a Objetos (POO)**, lo que asegura modularidad y reutilización del código.

#### Gestión de Usuarios

Se implementaron las siguientes funcionalidades para los usuarios:

- **Registro de Usuarios**:
  Endpoint: `POST /api/register`  
  Permite registrar usuarios en la base de datos con los campos obligatorios:
  - `id` (autogenerado)
  - `name`
  - `email`
  - `password` (encriptado con `bcrypt`)

- **Autenticación de Usuarios**:
  Endpoint: `POST /api/login`  
  Permite autenticar usuarios mediante:
  - Validación de email y contraseña.
  - Generación de un **token simple** que se utiliza para acceder a endpoints protegidos.

#### Gestión de Posts

Se desarrollaron las siguientes funcionalidades relacionadas con los posts:

- **Creación de Posts**:
  Endpoint: `POST /api/posts`  
  Permite a usuarios autenticados crear un nuevo post con los siguientes campos:
  - `id` (autogenerado)
  - `title`
  - `content`
  - `userid` (relacionado al usuario autenticado)

- **Listado de Posts por Categoría**:
  Endpoint: `GET /api/posts/{categoryid}`  
  Retorna todos los posts asociados a una categoría específica.

#### Medidas de Seguridad

- **Encriptación de Contraseñas**: Se encriptan para almacenar las contraseñas de manera segura.
- **Validación de Datos**: Se validan los datos de entrada en todos los endpoints para prevenir errores y ataques.
- **Protección de Endpoints**: Los endpoints sensibles (como crear posts) solo están disponibles para usuarios autenticados.

---

### 2. Conexión a Base de Datos

El sistema utiliza una base de datos MySQL con las tablas de Usuarios, Categorias y Posts

#### Conexión Segura

- Las credenciales de la base de datos se gestionan mediante variables de entorno (`.env`).

---

### 3. Pruebas Unitarias

Se implementaron pruebas unitarias para las siguientes funcionalidades:

- **Registro de Usuarios**:
  Verifica que:
  - Se registre un usuario con datos válidos.
  - No se permitan registros con datos incompletos o duplicados.

- **Creación de Posts**:
  Valida que:
  - Solo los usuarios autenticados puedan crear posts.
  - Los datos del post sean correctamente almacenados en la base de datos.
