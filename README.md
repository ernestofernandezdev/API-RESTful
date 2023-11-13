# API-RESTful

Esta API es un complemento para la página del siguiente repositorio:
https://github.com/LucasPiccolo/TPE-Lucas-Piccolo-Ernesto-Fernandez

En dicha página podemos administrar distintos videojuegos y sus desarrolladores. Por medio de esta API es posible realizar reseñas sobre los videojuegos, así como listar y modificar las que ya existen.

Para utilizarla lo primero que debemos hacer es descargar el XAMPP en nuestra computadora. Luego bajamos este repositorio y lo ubicamos en la carpeta "C:\xampp\htdocs" (usualmente la dirección es esta, pero quizá podría variar dependiendo de cómo se realizó la instalación o el SO que se esté utilizando). Finalmente, abrimos XAMPP y activamos los módulos de Apache y MySQL, en los puertos 80 y 3306 respectivamente (en caso de utilizar otro puerto para la base de datos se puede modificar en el archivo "config.php"). Hecho esto ya podemos interactuar con la API por medio de los endpoints listados más abajo. La DB es creada automaticamente en caso de no existir, y es rellenada con algunos datos para facilitar su testeo.

El DER del sistema es el siguiente:

![Image text](https://github.com/ernestofernandezdev/API-RESTful/blob/main/DER.png)

A continuación se listan los distintos endpoints disponibles:

1. (GET) http://localhost/API-RESTful/api/reviews
2. (GET) http://localhost/API-RESTful/api/reviews/:ID
3. (GET) http://localhost/API-RESTful/api/reviews/:ID/:subrecurso
4. (POST) http://localhost/API-RESTful/api/reviews
5. (PUT) http://localhost/API-RESTful/api/reviews/:ID
6. (DELETE) http://localhost/API-RESTful/api/reviews/:ID
7. (GET) http://localhost/API-RESTful/api/users/token

8.
