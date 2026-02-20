# CRM Laravel - Segunda Entrega

## Descripción

Para esta segunda entrega del CRM utilizando Laravel, he añadido las siguientes mejoras:

- Sistemas de roles para el uso del CRM.
- Imágenes para usuarios y productos.
- Archivos PDF para los productos.
- Paginación con un máximo de 10.
- DataTables para mejorar búsqueda.
- Gestión de usuarios para los administradores.

---

## Cómo instalar el proyecto

Antes de empezar necesitas tener instalado XAMPP y Composer.

**Paso 1 - Descomprime el proyecto en:**
```
C:\xampp\htdocs\CRM-Segunda
```

**Paso 2 - Abre una terminal dentro de esa carpeta e instala las dependencias:**
```bash
composer install
```

**Paso 3 - Crea el archivo de configuración:**
```bash
cp .env.example .env
php artisan key:generate
```

**Paso 4 - Configura la base de datos** abriendo el archivo .env y editando estas líneas:
```
DB_DATABASE=crm_segunda
DB_USERNAME=root
DB_PASSWORD=
```

**Paso 5 - Crea la base de datos** en phpMyAdmin (`http://localhost/phpmyadmin`). Tiene que tener de nombre crm_segunda y el cotejamiento utf8mb4_unicode_ci.

**Paso 6 - Ejecuta las migraciones:**
```bash
php artisan migrate --seed
```

**Paso 7 - Crea el enlace de storage:**
```bash
php artisan storage:link
```

**Paso 8 - Arranca el servidor:**
```bash
php artisan serve
```

Entra desde: `http://localhost:8000`

---

## Usuarios para entrar

He creado dos usuarios de prueba para poder ver las diferencias entre roles:

| Rol | Email | Contraseña |
|-----|-------|------------|
| Administrador | admin@admin.com | password |
| Usuario normal | usuario@usuario.com | password |

---

## Qué hay nuevo

### Sistema de roles
He creado dos roles: **Admin** y **Usuario**.

### Subida de imágenes
He añadido la posibilidad de subir una foto para cada cliente y una imagen para cada producto.

### Subida de archivos PDF
En los productos he añadido un campo para subir la ficha técnica en PDF. En la lista hay un icono rojo de PDF que al hacer clic abre el archivo.

### DataTables
He añadido el plugin DataTables para que las tablas tengan búsqueda instantánea y se puedan ordenar por cualquier columna haciendo clic en el encabezado.

### Gestión de usuarios
He creado un módulo nuevo donde el administrador puede ver todos los usuarios, crear nuevos, cambiarles el rol o eliminarlos.

---

## Cosas a tener en cuenta

- Si no ejecutas `php artisan storage:link` las imágenes no se verán aunque se hayan subido bien.
- El módulo de Usuarios & Roles solo aparece en el menú lateral si eres administrador. Si entras como usuario normal no se ve.