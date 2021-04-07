# Mejoras propuestas

Esta parte estará en español para mejorar el entendimiento de la misma y que no quepa lugar a posibles interpretaciones.

## Arquitectura

Para la arquitectura del sistema, me base en el complemento Jetstram que provee una amplia gama de características utiles a la hora de implementar un modulo de autenticación a alto nivel. Nos provee herramientas para facilitar autenticación, registros, administración de perfiles e incluso autenticación de 2 pasos, entre otras. Sin embargo, para el manejo de roles se utilizo el uso de compuertas o "Gates" como permisos en el servicio proveedor de autenticación, esto puede mejorarse utilizando Jetstream no se implemento debido a que utilizar un "Gate" en "AuthServiceProvider" es mucho más simple y rápido, la desventaja de esto es que se deben configurar el ACL a cada rol. 

## Seguridad

Una mejora sustancial a la solución es agregar autenticación de 2 pasos, provista por Jetstream, esto aumenta la fiabilidad del sistema de autenticación de usuarios. Se puede modificar el api_token para utilizar algo más robusto como JWT o autenticación directa en cada una de las peticiones.

## Escalabilidad

En cuanto a escalabilidad no hay mucho que agregar, sólo comentar que se pueden modificar las tablas mediante migraciones, como la última que agrega a la tabla "users" el campo "api_token" para el uso de la API. En caso de necesitar adjuntar código desde otra fuente, si el framework de origen es Laravel o Lumen al igual que este, se pueden mezclar los archivos que se encuentran dentro de la carpeta "/app" de ambas aplicaciones sin mayores inconvenientes.

## Rendimiento

En caso de continuar solamente como una API, se recomienda modificar el framework por la version minimalista que provee Lumen.

## Diseño

El diseño puede ser mejorado ampliamente con mejores habilidades de diseño de interfaces web, se pueden modificar cada una de las interfaces presentes actualizando el código presente en "resources/views". También se puede acoplar una aplicación externa que pueda ser un framework como Angular o librerias como React para mejorar la interacción con el usuario sin afectar en mayor medida al rendimiento.

## Despliegue

Se puede configurar un docker-compose para reducir la dificultad que pueda llegar a presentar el despliegue de la solución en cualquier plataforma, pues este nos provee el contenedor que posee todas las dependencias requeridas para ejecutar el proyecto.
