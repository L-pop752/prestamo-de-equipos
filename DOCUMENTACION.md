# Documentación del proyecto — Gestión de préstamos de equipos

## Resumen
Proyecto de gestión de préstamos de equipos para la universidad, desarrollado con Laravel. Permite registrar equipos, solicitantes, generar préstamos y gestionar devoluciones.

## Estructura del proyecto (resumen)
- **Rutas:** [routes/web.php](routes/web.php) — define recursos y rutas principales (equipos, solicitantes, prestamos, devoluciones).
- **Controladores:** [app/Http/Controllers](app/Http/Controllers/) — controlan la lógica de cada recurso. Ejemplos:
  - [app/Http/Controllers/PrestamoController.php](app/Http/Controllers/PrestamoController.php)
  - [app/Http/Controllers/EquipoController.php](app/Http/Controllers/EquipoController.php)
  - [app/Http/Controllers/SolicitanteController.php](app/Http/Controllers/SolicitanteController.php)
  - [app/Http/Controllers/DevolucionController.php](app/Http/Controllers/DevolucionController.php)
- **Modelos:** [app/Models](app/Models/) — representan las tablas y relaciones:
  - [app/Models/Prestamo.php](app/Models/Prestamo.php)
  - [app/Models/Equipo.php](app/Models/Equipo.php)
  - [app/Models/Solicitante.php](app/Models/Solicitante.php)
  - [app/Models/Devolucion.php](app/Models/Devolucion.php)
- **Vistas:** [resources/views](resources/views/) — vistas Blade organizadas por recurso (ej. `prestamos`, `equipos`, `solicitantes`, `devoluciones`).
- **Migraciones:** [database/migrations](database/migrations/) — crean las tablas principales (equipos, solicitantes, prestamos, devoluciones).

## Controladores y responsabilidades
- `PrestamoController`: listado, creación y almacenamiento de préstamos. Valida datos y crea registros en la tabla `prestamos`. Además actualiza el estado del `Equipo` a `Prestado` al crear un préstamo. (ver [PrestamoController](app/Http/Controllers/PrestamoController.php)).
- `EquipoController`: CRUD de equipos y manejo del campo `estado` (Disponible / Prestado).
- `SolicitanteController`: CRUD de solicitantes.
- `DevolucionController`: vistas y almacenamiento de devoluciones (index/create/store según rutas).

## Modelos y relaciones (clave)
- `Prestamo`:
  - Campos rellenables: `equipo_id`, `solicitante_id`, `fecha_prestamo`, `fecha_esperada_devolucion` ([app/Models/Prestamo.php](app/Models/Prestamo.php)).
  - Relaciones: `belongsTo` con `Equipo` y `Solicitante`; `hasOne` con `Devolucion`.
- `Equipo`: mantiene estado y se relaciona con `Prestamo`.
- `Solicitante`: datos de quien solicita el equipo.
- `Devolucion`: registro de la devolución asociada a un `Prestamo`.

## Flujo principal: registrar un préstamo
1. Usuario abre la vista de creación: `resources/views/prestamos/create.blade.php`.
2. El formulario envía a `PrestamoController@store`.
3. `store` valida los datos, crea un registro en `prestamos` y actualiza el `estado` del `Equipo` a `Prestado`.
4. Redirige a la lista de préstamos con un mensaje de éxito. (Ver [PrestamoController@store](app/Http/Controllers/PrestamoController.php)).

## Flujo de devolución (alto nivel)
- Hay una ruta `PATCH` definida en [routes/web.php](routes/web.php) para `prestamos/{prestamo}/devolver` que apunta a `PrestamoController@devolver`.
- Además `DevolucionController` gestiona la creación y listado de devoluciones (ver [app/Http/Controllers/DevolucionController.php](app/Http/Controllers/DevolucionController.php)).

## Migraciones relevantes
- [database/migrations/2026_06_13_190523_create_equipos_table.php](database/migrations/2026_06_13_190523_create_equipos_table.php)
- [database/migrations/2026_06_13_190557_create_solicitantes_table.php](database/migrations/2026_06_13_190557_create_solicitantes_table.php)
- [database/migrations/2026_06_13_190617_create_prestamos_table.php](database/migrations/2026_06_13_190617_create_prestamos_table.php)
- [database/migrations/2026_06_15_005400_create_devoluciones_table.php](database/migrations/2026_06_15_005400_create_devoluciones_table.php)

## Comandos para instalar y levantar el proyecto (rápido)
```bash
composer install
cp .env.example .env
php artisan key:generate
composer dump-autoload
php artisan migrate
npm install
npm run dev
php artisan serve
```

## Notas y próximos pasos recomendados
- Revisar que exista e implemente `devolver` en `PrestamoController` si el flujo de PATCH debe manejar la devolución directamente.
- Añadir pruebas unitarias/funcionales para `Prestamo` y `Devolucion`.
- Agregar control de acceso/autenticación si se requiere control de usuarios.

---
Documento generado automáticamente con un resumen de la estructura y flujo principal. Puedo ampliar secciones (diagramas ER, ejemplos de payload, tests) si lo deseas.
