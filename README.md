# Como utilizar Asistrack

## Instalación 
Se requiere como minimo PHP 8.1, MySQL/MariaDB y composer.
Para esta guía se utilizará laragon.

1. Descargar el proyecto (o clonar usando GIT)
2. Copiar `.env.example` en `.env` y configurar las credenciales de la base de datos.
3. Ir al directorio raíz del proyecto utilizando la terminal de windows/terminal de laragon.
4. Ingresar `composer install`
5. Ingresar `npm install`
6. Generar la clave de la aplicación ingresando `php artisan key:generate --ansi`
7. Crear las migraciones ingresando `php artisan migrate`
8. Iniciar el servidor local dando click en `Start` en el panel de Laragon (o ingresando `php artisan serve` en la terminal).
9. Ingresar `npm run dev` en la terminal.
10. Entrar a [http://127.0.0.1:8000/](http://127.0.0.1:8000/) o [http://asistrack-laravel.test/](http://asistrack-laravel.test/) para testear la aplicación.

## Utilizando Asistrack
 ### Registro de usuarios y administradores
  #### Registro de usuario
   Ingresar a la página de registro de usuario [http://127.0.0.1:8000/register](http://127.0.0.1:8000/register)
  #### Registro de administrador
   Ingresar a la página de registro de administrador [http://127.0.0.1:8000/registerAdmin](http://127.0.0.1:8000/registerAdmin), donde permitirá seleccionar si desea crear una cuenta como administrador o no.
 ### Creando parámetros
  Luego de iniciar sesión, en la parte derecha de la barra de navegación verá un panel desplegable, que muestra dos opciones (tres en caso de ser administrador, siendo la tercera la ventana de registros): perfil y desconectar.
  Haga click en `perfil`, lo que lo llevará a la vista de edición de perfil, donde podrá crear los tres parámetros necesarios para definir la condición de los alumnos: `total de días de clase`, `porcentaje para regularizar` y `porcentaje para promocionar`.
 ### Sección 'alumnos'
  en esta sección de Asistrack podrá `crear` alumnos, `editar` o `mostrar `sus datos, y `eliminar` alumnos. También podrá `exportar` el listado completo de alumnos como PDF o archivo de Excel.
 ### Sección 'Buscar'
  Al ingresar el DNI de un alumno, podrá crear una asistencia inmediata (que almacena la fecha actual) o podrá mostrar el `total` de asistencias y ausencias que posee.
 ### Sección 'Calendario'
  En esta sección podrá ingresar una fecha (y de forma opcional, un año) para obtener los estudiantes presentes en dicha fecha.
 ### Sección 'registros'
  Si el usuario actual es un administrador, al hacer click en el panel en la parte superior derecha, encontrará una tercera opción entre `perfil` y `desconectarse` llamada `registros`, la cuál presentará todas las acciones (creación, edición o eliminación de estudiantes) realizadas por los usuarios en el sistema.
  
  
