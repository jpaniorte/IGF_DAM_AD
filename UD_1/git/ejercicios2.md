# Ejercicios para git - Parte 2

## Ejercicios dificultad básica

### Ejercicio 1.1

Crea una carpeta llamada ejercicios-git-2, muévete a ella e inicializa git. Crea un fichero llamado README.md con el contenido “Hello world git parte 2”. Ejecuta los comandos necesarios para confirmar los cambios en main.

A continuación, ejecuta:

```sh
git branch feature-login
git branch
```

Comprueba que tienes una nueva rama llamada `feature-login`. Y que actualmente te encuentras en la rama `main`.

### Ejercicio 1.2

Elimina esa rama ejecutando:

````sh
git branch -d feature-login
git branch
````
Comprueba que únicamente tienes una rama main. Vuelve a crear una rama con el nombre `feature`. A continuación, ejecuta:

```sh
git checkout feature
git branch -d feature-index
git checkout main
git branch
```
¿Que ha pasado? 

Finalmente, elimina la rama `feature-index` antes de continuar.

### Ejercicio 1.3
Desde la rama `main`, ejecuta:

```sh
git checkout -b feature-index
git status
git branch
```

¿En qué rama te encuentras?

### Ejercicio 1.4

Comprueba que en la rama `main` tienes únicamente un fichero llamado `README.md` y elimina todas las ramas excepto `main`. Crea y muévete a la rama `feature/login`, crea un fichero `login.html` con el siguiente contenido:

```html
<h1>Login page</h1>
```

y ejecuta:

```sh
git checkout main
git merge feature/login

> Salida: Already up to date.
```
Comprueba que en la rama `main` tiene el fichero `login.html` y `README.md`. ¿No los tienes? Vuelve a la rama `feature/login` y ejecuta un `git status`. Dedica un tiempo a entender que sucede y solucionarlo. Si no puedes, continua con:

Sobre la rama `feature/login`, haz lo necesario para confirmar los cambios sobre el fichero `index.html`. A continuación, ejecuta de nuevo:

```sh
git checkout main
git merge feature/login

> salida:
Updating <hash>
Fast-forward
 index.html | 1 +
 1 file changed, 1 insertion(+)
 create mode 100644 index.html
```

### Ejercicio 1.5

Sobre la rama main, ejecuta:

```sh
echo "<html><body><h1>Hola Mundo</h1></body></html>" > index.html
git add index.html
git commit -m "Primer commit en main"

git checkout -b feature-style
echo "<html><body><h1 style='color: red;'>Hola Mundo</h1></body></html>" > index.html
git add index.html
git commit -m "Cambio de estilo en feature-style"

git checkout main
echo "<html><body><h1 style='color: blue;'>Hola Mundo</h1></body></html>" > index.html
git add index.html
git commit -m "Cambio de estilo en main"

git merge feature-style

# Aparece un conflicto
> CONFLICT (content): Merge conflict in index.html
> Automatic merge failed; fix conflicts and then commit the result.
```

Abre el fichero `index.html` con VSCode y verás algo como esto:

    ```html
    <html>
    <body>
    <<<<<<< HEAD
    <h1 style='color: blue;'>Hola Mundo</h1>
    =======
    <h1 style='color: red;'>Hola Mundo</h1>
    >>>>>>> feature-style
    </body>
    </html>
    ```

Aquí, puedes elegir qué estilo mantener, o combinar ambos de la forma que prefieras. Después de resolver el conflicto, guarda el archivo.

```sh
git add index.html
git commit -m "Resolviendo conflicto entre main y feature-style"
```

¡Enhorabuena, has resuelto el 1º (de muchos) conflictos en git!

## Ejercicios con dificultad media

### Ejercicio 2.1

Haz todo lo necesario para que al ejecutar `git log --oneline` sobre la rama `feature/login-errors-handler` aparezca:

```bash
hash_id3 Tercer commit - versión 3 de archivo.txt
hash_id2 Segundo commit - versión 2 de archivo.txt
hash_id1 Primer commit - versión 1 de archivo.txt
```
> Nota: los valores de `hash_id` serán del estilo: `5e6f7a9`.

Haciendo uso del comando `git checkout <hash>` vuelve al `hash_id1`. Dedica un tiempo analizando las salidas de `git status` y `git log`. Analiza el contenido de los archivos.La salida debe ser parecida a esta:

```bash
Note: switching to '5e6f7a9'.

You are in 'detached HEAD' state. You can look around, make experimental
changes and commit them, and you can discard any commits you make in this
state without impacting any branches by switching back to a branch.
```

Para volver a la rama `main` ejecuta:

```
git checkout main
```

### Ejercicio 2.2
Haz todo lo necesario para que al ejecutar `git log --oneline` sobre la rama `feature/login-errors-handler` aparezca:

```bash
1152f5d (HEAD -> main) Merge branch 'test'
87a10dd (test) update index.html
59da274 udpate
9eb2eee Cambio de estilo en main
258c972 Primer commit en main
```
Para logarlo, debes comenzar recreando este escenario:

```sh
59da274 (HEAD -> main) udpate index.html
9eb2eee Cambio de estilo en main
258c972 Primer commit en main
```

Ahora mueve el puntero al hash_id `9eb2eee`. Modifica o crea el fichero index.html y confirma los cambios. Regresa a la rama `main` con `git checkout main`. Probablemente, tengas una salida como esta:

```bash
Warning: you are leaving 1 commit behind, not connected to
any of your branches:

  87a10dd update

If you want to keep it by creating a new branch, this may be a good time
to do so with:

 git branch <new-branch-name> 87a10dd

Switched to branch 'main'
```

Vamos a crear la rama:

```sh
git branch test 87a10dd
```

Y estando sobre main, ejecuta: `git merge test` y `git log --oneline`


## Ejercicios con dificultad avanzada

### Ejercicio 3.1

Analiza la situación de la salida obtenida con el comando `git log --oneline` y responde a las preguntas.

```bash
1a6aaf3 (HEAD -> main, feature-login) Añadido formulario de contacto
4ebe75b Actualización de la página principal
db9ec1e Corrección de errores
bd729e4 Implementación del sistema de autenticación
```

1. ¿Cuál es el hash_id del commit más reciente?
2. ¿Cuál es el hash_id del commit más antiguo?
3. ¿Qué nos indica HEAD -> main del hash_id 1a6aaf3?
4. ¿Qué nos indica que HEAD -> main y feature-login estén en el hash_id 1a6aaf3?

### Ejercicio 3.2

Analiza la situación de la salida obtenida con el comando `git log --oneline` y responde a las preguntas.

```sh
8377a7b (HEAD -> feature-fix-login) fix login
1a6aaf3 (main, feature-login) add js
4ebe75b add styles
db9ec1e udpate
bd729e4 add readme
```

1. ¿Qué información nos aporta el hash_id 8377a7b?
2. ¿Qué nos indica que main y feature-login apunten al commit 1a6aaf3 y que feature-fix-login apunte al hash_id 8377a7b?

### Ejercicio 3.3

Investiga sobre las diferencias entre `git merge` y `git rebase`. Después, analiza estas dos salidas y justifica cual de ellas es un rebase y cual un merge.

```sh
# Escenario 1
2a3b4c5 (HEAD -> feature-branch, main) Añadido formulario de contacto
d1e2f3g Implementación del sistema de autenticación
e4f5g6h Actualización de la página principal
i7j8k9l Corrección de errores
```

```sh
# Escenario 2
a1b2c3d (HEAD -> main) Merge branch 'feature-branch'
e4f5g6h Actualización de la página principal
i7j8k9l Corrección de errores
2a3b4c5 (feature-branch) Añadido formulario de contacto
d1e2f3g Implementación del sistema de autenticación
```

### Soluciones ejercicios avanzados

3.1 solución:
1. 1a6aaf3
2. bd729e4
3. Que actualmente, estamos en la rama main.
4. Que las ramas main y feature-login tienen los mismos cambios confirmados.


3.2 solución:
1. Estamos en la rama feature-fix-login
2. Que la rama feature-fix-login tiene cambios que la rama main y la rama feature-login no tiene. 

3.3 solución:

Solución:
El escenario 1 es un git rebase:
1. No hay commit de merge
2. Los commits de feature-branch (2a3b4c5 y d1e2f3g) se reescriben como si hubieran sido aplicados después de los commits de main. Esto crea un historial más lineal y limpio.
3. El rebase básicamente toma los commits de la rama feature-branch y los "reaplica" sobre los commits existentes en main

El escenario 2 es un git merge:

1. Aparece un commit nuevo de merge: a1b2c3d Merge branch 'feature-branch'.
2. Los commits de feature-branch (como 2a3b4c5) se mantienen en el historial tal cual. No se reescriben ni se reorganizan.
3. El commit de merge actúa como un punto de unión entre las ramas, lo que significa que puedes ver claramente dónde convergen las dos ramas.
