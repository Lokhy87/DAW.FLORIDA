# GUION DE LA ACTIVIDAD PRACTICA AP9-1 API Rest con Symfony

---

## Objetivos

- Entender como funcionan los APIs.
- Aprender a montar un API Rest usando Symfony.
- Practicar con el uso de un API mediante Bruno.

---

## Recursos generales

- Florida Oberta

---

## Enunciado

Eres el desarrollador de un API para la gestion de jugadores de la liga fantasy. Solo tenemos que hacer la parte de
Backend y ofrecer la funcionalidad mediante un API Rest, porque el interfaz de usuario lo haran otros equipos, nosotros
solo vamos a ofrecer la parte de gestion de jugadores en backend.

---

## Ejercicio 1. Crea la entidad

### Entidad `PlayerCard`

| Campo           | Tipo    | Descripcion                        |
|-----------------|---------|------------------------------------|
| `id`            | integer | Identificador unico (autogenerado) |
| `name`          | string  | Nombre del jugador                 |
| `surname`       | string  | Apellidos del jugador              |
| `age`           | integer | Edad                               |
| `currentTeam`   | string  | Equipo actual                      |
| `goalsScored`   | integer | Goles marcados                     |
| `cardsReceived` | integer | Tarjetas recibidas                 |
| `birthDate`     | date    | Fecha de nacimiento                |

---

## Ejercicio 2. Crea el API Rest

Crea el controlador necesario para ofrecer la funcionalidad CRUD para la entidad `PlayerCard` mediante API Rest.

### Endpoints a implementar:

| Metodo | Endpoint            | Descripcion                    |
|--------|---------------------|--------------------------------|
| GET    | `/api/players`      | Obtener todos los jugadores    |
| GET    | `/api/players/{id}` | Obtener un jugador por ID      |
| POST   | `/api/players`      | Crear un nuevo jugador         |
| PUT    | `/api/players/{id}` | Actualizar un jugador completo |
| PATCH  | `/api/players/{id}` | Actualizar parcialmente        |
| DELETE | `/api/players/{id}` | Eliminar un jugador            |

---

## Ejercicio 3. Configura Bruno

Crea una coleccion en Bruno para poder realizar todas las acciones CRUD en el API.

### Se pide:

- Crear una coleccion llamada **Fantasy League API**.
- Crear una carpeta `Players` con todas las peticiones CRUD.
- Probar que todas las operaciones funcionan correctamente.
