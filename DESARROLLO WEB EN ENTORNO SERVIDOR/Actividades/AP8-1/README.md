# GUIÓN DE LA ACTIVIDAD PRÁCTICA AP8-1 Seguridad con Symfony

---

## Objetivos

- Entender el sistema de seguridad de Symfony.
- Configurar la autenticación de usuarios mediante el componente Security.
- Implementar un sistema de registro, login y logout.
- Proteger rutas y mostrar contenido según el estado de autenticación del usuario.
- Trabajar con el objeto User y acceder a sus propiedades desde Twig.

---

## Recursos generales

- [Documentación oficial de Symfony - Security](https://symfony.com/doc/current/security.html)

---

## Enunciado

Eres el desarrollador de una aplicación web que requiere un sistema de autenticación de usuarios. Debes implementar las
funcionalidades básicas de seguridad: registro, login y logout, asi como proteger ciertas secciones de la aplicación
para que solo sean accesibles por usuarios autenticados.

### Se pide:

- Crea un nuevo proyecto Symfony llamado **AP81**.

- Comprueba que el servidor de desarrollo funciona correctamente en `http://localhost:8000`.

- Crea una entidad **User** con los campos: `id`, `email` (string, unique), `password` (string) y `roles` (array).

- Implementa un formulario de **registro** que permita a los usuarios crear una cuenta con email y password. El password
  debe ser hasheado antes de guardarse en la base de datos.

- Implementa un formulario de **login** que permita a los usuarios autenticarse.

- Implementa la funcionalidad de **logout**.

- Genera un **CRUD para User** que solo sea accesible para usuarios autenticados.

- Crea una **página principal** con un menu de navegación que muestre:
    - Si el usuario **NO esta autenticado**:
        - Enlace a "Registrarse"
        - Enlace a "Iniciar sesión"
    - Si el usuario **esta autenticado**:
        - Mensaje de bienvenida mostrando el **email** del usuario
        - Enlace a "Gestión de Usuarios" (CRUD)
        - Enlace a "Cerrar sesión"

- Protege la ruta del CRUD de usuarios (`/user/*`) para que solo sea accesible por usuarios con rol `ROLE_USER` mediante
  la configuración de `access_control` en `security.yaml`.

- Comprueba que:
    - Un usuario no autenticado puede acceder a la pagina principal, registro y login.
    - Un usuario no autenticado **NO puede** acceder al CRUD de usuarios.
    - Un usuario autenticado puede ver su email en el menu y acceder al CRUD.
    - El logout funciona correctamente y redirige a la página principal.