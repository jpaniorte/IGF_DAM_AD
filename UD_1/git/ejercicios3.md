# Ejercicios parte 3

> Si no te gusta trabajar con PDF, puedes ver estos ejercicios en la siguiente URL (incluso hacer fork del proyecto): https://github.com/jpaniorte/IGF_DAM_AD/blob/main/UD_1/git/ejercicios3.md

> Si consideras que debes repasar lo aprendido hasta ahora, recomiendo este video de 10min: https://www.youtube.com/watch?v=DuYjcOZw11s

> Si no ha sido suficiente, recomiendo este otro video de 5h: https://www.youtube.com/watch?v=3GymExBkKjE

# Ejercicios de dificultad básica

## Ejercicio 1.1

#### Paso 1: Crear una cuenta en GitHub
1. Accede a la página de GitHub: [https://github.com](https://github.com).
2. Haz clic en el botón **Sign Up** en la esquina superior derecha.
3. Completa los pasos para registrarte:
   - Introduce tu dirección de correo electrónico.
   - Elige un nombre de usuario.
   - Crea una contraseña segura.
   - Confirma tu cuenta a través del correo electrónico que te enviarán.
   
4. Después de completar el registro, inicia sesión en GitHub con tu nuevo nombre de usuario y contraseña.

#### Paso 2: Realizar un fork del repositorio de Laravel
1. Una vez que hayas iniciado sesión, busca el repositorio oficial de **Laravel**, uno de los frameworks PHP más populares, accediendo a este enlace:  
   [https://github.com/laravel/laravel](https://github.com/laravel/laravel).

2. En la parte superior derecha de la página del repositorio, haz clic en el botón **Fork**.

3. Selecciona tu cuenta de GitHub (o la organización si trabajas en equipo) para hacer el fork.

4. GitHub creará una copia del repositorio de Laravel en tu cuenta. Ahora, tienes tu propio repositorio, que se llamará `tu-usuario/laravel`.

#### Paso 3: Clonar el repositorio
   
En tu terminal, ejecuta el siguiente comando para clonar el repositorio en tu máquina local:
   ```bash
   git clone https://github.com/tu-usuario/laravel.git
   ```

#### Paso 4: Abre el repositorio con VSCode.

Abre el repositorio con VSCode y busca el fichero README la forma de contribuir al proyecto. Lee la documentación sobre la contribución al proyecto.

>**Examen: Supongamos que he detectado un bug en el proyecto [Laravel Framework](https://github.com/laravel/framework). Indica los pasos necesarios que debo realizar para poder contribuir con su solución a través de una PR.**

## Ejercicio 1.3

Realiza los siguientes ejercicios: https://aprendeconalf.es/docencia/git/ejercicios/repositorios-remotos/

> Nota: si consideras que deber repasar más lo aprendido sobre ramas, realiza primero este otro: https://aprendeconalf.es/docencia/git/ejercicios/ramas/

>**Examen: Supongamos que tengo mi rama local `main` con 1 commit por delante de la rama remota `origin/main`. ¿Cómo podria trasladar ese commit a la rama remota?**

>**Examen: Supongamos que tengo en la rama remota `origin/main` con 1 commit por delante de mi rama local `main`. ¿Cómo podria obtener ese commit en mi rama local?**

## Ejercicio 1.4

Si no te ha quedado claro el funcionamiento de las Pull Request, os recomiendo este video: https://www.youtube.com/watch?v=_M8oalUyz10

>**Examen: ¿Qué es una Pull Request en GitHub?**

>**Examen: ¿Es correcta esta afirmación?**
>
>"Una Pull Request permite a los colaboradores revisar y discutir los cambios antes de fusionarlos."

> **Examen: ¿Es correcta esta afirmación?**
>
> "Solo el creador del repositorio puede crear una Pull Request.."

> **Examen: ¿Es correcta esta afirmación?:**
>
> "Las Pull Requests se crean automáticamente cuando se hace un commit en una rama."

# Ejercicios de dificultad media

## Ejercicio 2.1

Accede al siguiente enlace: https://www.atlassian.com/es/git/tutorials/comparing-workflows/gitflow-workflow e intenta replicar todos los ejemplos. Evita el uso de la biblioteca de extensiones git-flow.

>**Examen: En el flujo de trabajo Gitflow, ¿cuál es el propósito de la rama develop?**

## Ejercicio 2.2

Visualiza el siguiente video: https://www.youtube.com/watch?v=AuDZvbHSW1c e intenta aplicar un modelo gitlab flow a un repositorio.

## Ejercicio 2.3

Visualiza el siguiente video: https://www.youtube.com/watch?v=-73RVTQxUhs e intenta aplicar un modelo Trunk-Based Development a un repositorio.

>**Examen: ¿Cuál es la característica principal del enfoque Trunk-Based Development?**

# Ejercicios de dificultad alta

## Ejercicio 3.1

Configura tu cuenta de GitHub para hacer uso de SSH cuando trabajas contra un repositorio remoto. ¿Qué ventajas aporta frente al protocolo HTTP?

>**Examen: ¿Cuál es la ventaja de usar una clave SSH en lugar de HTTPS para interactuar con un repositorio remoto en GitHub?**