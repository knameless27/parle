# 🗣️ Parle - Aplicación Laravel 11

Bienvenido a **Parle**, una aplicación construida con **Laravel 11** para gestionar [añade una breve descripción de la funcionalidad principal de tu proyecto]. Este proyecto incluye una configuración completa con **Docker Compose** para simplificar la instalación y ejecución.

---

## 📝 Requisitos Previos

Antes de empezar, asegúrate de tener lo siguiente instalado en tu máquina:

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)

**Opcional**:
- [Composer](https://getcomposer.org/) (para instalar dependencias sin Docker).
- [Node.js y npm](https://nodejs.org/) (para compilar assets si no usas Docker).

---

## ⚙️ Configuración del Proyecto

Sigue estos pasos para configurar **Parle** en tu entorno local:

### 1. Clona el Repositorio

```bash
git clone https://github.com/knameless27/parle.git
cd parle
```

### 2. Copia el Archivo `.env`

Crea un archivo `.env` basado en el ejemplo proporcionado:

```bash
cp .env.example .env
```

**Nota:** Si usas Docker Compose, las configuraciones predeterminadas son suficientes, pero puedes ajustar las variables de entorno según sea necesario (por ejemplo, credenciales de base de datos).

### 3. Configura los Contenedores con Docker Compose

Construye y levanta los contenedores ejecutando:

```bash
docker-compose up -d
```

Esto iniciará los servicios para:

- **PHP y Laravel**: El servidor de la aplicación.
- **MySQL**: La base de datos.
- **Nginx**: Servidor web.

---

## 🔑 Configuración Inicial

### Genera la Key de Laravel

Ejecuta este comando dentro del contenedor para generar la clave de la aplicación:

```bash
php artisan key:generate
```

### Configura la Base de Datos

Ejecuta las migraciones para crear las tablas necesarias:

```bash
php artisan migrate
```

**Opcional:** Si necesitas datos de prueba, ejecuta los seeders:

```bash
php artisan db:seed
```

---

## 🚀 Ejecuta la Aplicación

Abre tu navegador y accede a:

```
http://localhost
```

Si configuraste un puerto diferente en `docker-compose.yml`, usa ese puerto.

---

## 🛠 Comandos Útiles

Aquí tienes comandos que pueden ayudarte en el desarrollo:

### Contenedores

- **Detener los Contenedores**:
  ```bash
  docker-compose down
  ```

- **Reiniciar los Contenedores** (por cambios en la configuración de Docker):
  ```bash
  docker-compose up -d --build
  ```

- **Acceder al Contenedor de Laravel**:
  ```bash
  docker exec -it parle-app bash
  ```

### Laravel

- **Limpiar Caché**:
  ```bash
  php artisan config:clear
  php artisan cache:clear
  php artisan route:clear
  php artisan view:clear
  ```

- **Ejecutar Pruebas**:
  ```bash
  php artisan test
  ```

---

## 📂 Estructura del Proyecto

El proyecto sigue la estructura estándar de Laravel 11. Puedes consultar la [documentación oficial](https://laravel.com/docs/11.x) para entender mejor cómo funciona el framework.

---

## 🛡️ Licencia

Este proyecto está bajo la licencia [MIT](LICENSE). Siéntete libre de usarlo y modificarlo según tus necesidades.
