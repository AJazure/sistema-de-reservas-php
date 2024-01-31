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
[![DER](https://i.postimg.cc/9F4s67Mj/imagen-2024-01-31-204757838.png "DER")](https://i.postimg.cc/9F4s67Mj/imagen-2024-01-31-204757838.png "DER")

Para realizar las tareas decidí que era mejor desarrollarlo aplicando un patrón MVC, ya que permitiría un código más organizado y facilitaría las tareas a realizar.
