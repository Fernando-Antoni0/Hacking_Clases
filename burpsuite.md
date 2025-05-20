Actividad con Burpsuite--- Todo esto es con fines educativos!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!1

Primero en Burpsuite nos vamos a la seccion de Proxy, eso se encuentra en la parte de arriba, dentro de este
vamos a configuracion para ver que direccion queremos utilizar, en este caso estamos en localhost asi que ahi
lo dejamos y habilitamos la casilla de response porque se ocupa, terminada esta accion pues le damos en
open browser. ![alt text](/imgclass1/image.png)

Esto nos abrira un navegador de chromium en donde tendremos que abrir el home de mutillidae esto desde
localhost, este navegador es el que nos proporciana burpsuite, tendremos que irnos a owasp 2017 en la parte
de sql injection -> sql insert injection -> register, aqui es donde crearemos nuestro usuario, contraseña y lo que nos pida
![alt text](/imgclass1/image-1.png)

Para iniciar sesion nos dirigimos a owasp 2017 sql injection -> sql extract data -> user info, es donde empezaremos a
ver los datos que pasen en este login a traves de los inputs ![alt text](/imgclass1/image-2.png), pero para empezar a ver el trafico de
ver que nos devuelve entre la pagina y servidor activamos intercep en burpsuite ![alt text](/imgclass1/image-3.png), con esto cada solicitud
que aparezca la podremos ver.![alt text](/imgclass1/image-4.png)

Verificar los datos que el usuario esta enviando, este se queda cargando esperando ![alt text](/imgclass1/image-5.png), lo que
esta esperando es a que nosotros autoricemos ya que ahora tenemos el control de lo que esta pasando entre 
la pagina y servidor ![alt text](/imgclass1/image-6.png)

Se puede aplicar el metodo de canario que es cambiar datos en la solicitud para que lleguen al servidor y obtener la
respuesta que necesitemos, como en este caso que habiamos puesto su contraseña y verificamos que fue exitoso
ya que muestra cosas de inicio en el response ![alt text](/imgclass1/image-7.png)

Para cambiar cosas como usuario normal o admin tenemos que monitorear que al momento de que este inicie sesion
tengamos activado el intercep, para asi irnos a lo que la imagen nos muestra ![alt text](/imgclass1/image-8.png), en header cambiamos a
uid a 1 ![alt text](/imgclass1/image-9.png) y le damos a forward para que el usuario ingrese, como nos damos cuenta aqui
ya esta como admin a pesar de que las credenciales eran de usuario normal ![alt text](/imgclass1/image-10.png).



