![](https://focasoftware.com/wp-content/uploads/2022/05/Logo.FocaSoftware.png)
# Desafío PHP - Sistema de Reservas
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E)![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white)
> Estás desarrollando un sistema de reservas para un hotel. El hotel tiene varias habitaciones, y los clientes pueden realizar reservas para estancias específicas. Cada reserva tiene un número de habitación, una fecha de check-in y una fecha de check-out.



# Tareas
1. **Modelo de Datos:** Define una estructura de datos que represente las habitaciones y las
reservas. Incluye atributos relevantes para cada entidad.
2. **Validación de Reservas:** Implementa una función en PHP que tome como entrada una reserva (número de habitación, fecha de check-in y fecha de check-out) y verifique si la habitación está disponible para ese período.
3. **Listado de Reservas:** Crea una función para mostrar todas las reservas actuales, ordenadas por fecha de check-in. Muestra la información relevante de cada reserva.
4. **Interfaz Web Simple**: Diseña una interfaz web simple que permita a los usuarios ver las reservas actuales y realizar nuevas reservas. Puedes usar HTML y CSS para la interfaz.

# Solución

Respecto al modelo de datos realicé el siguiente DER:
<br>
[![DER](https://i.postimg.cc/9F4s67Mj/imagen-2024-01-31-204757838.png "DER")](https://i.postimg.cc/9F4s67Mj/imagen-2024-01-31-204757838.png "DER")

Para realizar las tareas decidí que era mejor desarrollarlo aplicando un patrón MVC, ya que permitiría un código más organizado y facilitaría las tareas a realizar.

# Preguntas

**A. Manejo de Datos en Tránsito y Persistencia:**

Explica cómo manejarías la seguridad de los datos en tránsito (durante la comunicación entre el cliente y el servidor) y la persistencia de datos (almacenamiento a largo plazo) en el sistema de reservas. ¿Qué tecnologías y prácticas considerarías?

**respuesta**:

Creo que para asegurar la comunicación entre el cliente y el servidor haría uso del protocolo HTTPS para cifrar la información, entiendo que sería necesario configurar el servidor apache. Respecto a la persistencia de datos creo que la gestión de roles y permisos puede ser de utilidad para evitar accesos no autorizados a información sensible o a acciones (CRUD) que no correspondan con su rol.
También para la persistencia creo que sería bueno un backup con frecuencia, así como crear índices prácticos, que las tablas estén normalizadas, que se haga uso de procedimientos almacenados o triggers de ser necesario.

---

**B. Seguridad en la Reserva de Habitaciones:**

¿Qué medidas de seguridad implementarías para prevenir problemas como la reserva de una habitación que ya está ocupada? Considera la concurrencia y cómo manejarías situaciones en las que varios clientes intentan reservar la misma habitación simultáneamente.

**respuesta**:

Respecto al transito de datos se podría implementar un bloqueo temporal al iniciar un proceso de reserva, que cuente con un tiempo determinado para así evitar que varios usuarios intenten reservar la misma habitación. El bloqueo debería liberarse automáticamente mediante un job después del tiempo determinado si es que no se completó la reserva.
Creo que también las transacciones de SQL podrían ser de utilidad para consultas que deban realizarse simultáneamente y que a demás haya un rollback en caso de fallar.
