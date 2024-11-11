<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[WebReinvent](https://webreinvent.com/)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[DevSquad](https://devsquad.com/hire-laravel-developers)**
-   **[Jump24](https://jump24.co.uk)**
-   **[Redberry](https://redberry.international/laravel/)**
-   **[Active Logic](https://activelogic.com)**
-   **[byte5](https://byte5.de)**
-   **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

######################### Respuestas ############################
¿Qué hace el método orWhere?
Hace que si el primer where pase a ver si el siguiente si se cumple, esto nos permite filtrar una misma cosa al mismo tiempo con dos posibilidades, funcionando mas o menos como un if. La función avanzada de orWhere nos permite meter una funcion dentro de la condicion.

¿Por qué no necestiamos un modelo Profile? ¿En qué situación crees que sería necesario crear un modelo Profile independiente?
es mejor crear un modelo Profile para organizar y gestionar esos datos de manera más efectiva
Relaciones: Si el perfil del usuario necesita establecer relaciones con otros modelos (por ejemplo, un usuario puede tener múltiples perfiles o un perfil puede estar relacionado con otros modelos como publicaciones, comentarios, etc.), un modelo independiente puede facilitar estas relaciones.
Escalabilidad: Si se espera que la aplicación crezca y que la funcionalidad de los perfiles se expanda en el futuro, tener un modelo Profile independiente puede hacer que la aplicación sea más escalable y fácil de modificar.

Separación de Responsabilidades: Seguir el principio de separación de responsabilidades puede ser una buena práctica. Tener un modelo Profile independiente puede ayudar a mantener el modelo User más limpio y enfocado en la autenticación y la gestión de usuarios.

Personalización y Extensibilidad: Si se planea permitir a los usuarios personalizar su perfil de maneras significativas (por ejemplo, configuraciones de privacidad, temas, etc.), un modelo Profile independiente puede proporcionar la flexibilidad necesaria.
La decisión de crear un modelo Profile independiente depende de las necesidades específicas de tu aplicación y de cómo planeas manejar los datos del usuario. Si la complejidad y la escalabilidad son factores importantes, es recomendable optar por un modelo separado. Por otro lado, si la aplicación es simple y no se espera que crezca en complejidad, mantener los datos en el modelo User puede ser suficiente.

Explica para qué sirve el atributo enctype.
¿Qué método HTTP se está utilizando en el formulario para actualizar los datos del perfil?
¿Qué diferencia hay entre ese método y el método PUT?

Pregunta: ¿Qué parámetro tiene el método update del ProfileController?

Pregunta: ¿Cuál es tu sistema de almacenamiento por defecto? Comprueba en el archivo filesystems.php de la carpeta config.

php artisan storage:link

Explica en detalle qué es lo que hace el comando anterior.
