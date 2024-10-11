# Ejercicios Prácticos de Git

## Ejercicios con `git config`, `git init`, `git add`, `git status`, `git commit`, y `git log`

1. **Configurar el nombre de usuario global**
   - Abre tu terminal y ejecuta el siguiente comando para configurar tu nombre de usuario global:
     ```bash
     git config --global user.name "Tu Nombre"
     ```
   - Verifica la configuración ejecutando:
     ```bash
     git config --global user.name
     ```
   **Resultado esperado**: La terminal debe mostrar el nombre que configuraste, por ejemplo, "Tu Nombre".

2. **Configurar el correo electrónico global**
   - Configura tu correo electrónico global para Git con el siguiente comando:
     ```bash
     git config --global user.email "tuemail@ejemplo.com"
     ```
   - Verifica la configuración del correo electrónico:
     ```bash
     git config --global user.email
     ```
   **Resultado esperado**: La terminal debe mostrar tu correo electrónico, por ejemplo, "tuemail@ejemplo.com".

3. **Verificar toda la configuración global de Git**
   - Verifica toda la configuración global que has hecho hasta ahora:
     ```bash
     git config --list
     ```
   **Resultado esperado**: La terminal debe mostrar tu nombre, correo electrónico y otras configuraciones globales de Git.

4. **Inicializar un nuevo repositorio**
   - Crea un nuevo directorio y navega a él:
     ```bash
     mkdir mi-proyecto
     cd mi-proyecto
     ```
   - Inicializa un repositorio Git en este directorio:
     ```bash
     git init
     ```
   **Resultado esperado**: La terminal debe mostrar el mensaje "Initialized empty Git repository in /ruta/a/mi-proyecto/.git/".

5. **Verificar la estructura de un repositorio Git**
   - En el mismo directorio, lista los archivos ocultos para ver el directorio `.git`:
     ```bash
     ls -la
     ```
   **Resultado esperado**: Debes ver una carpeta oculta llamada `.git`, que es donde Git almacena la información del repositorio.

6. **Crear y agregar un archivo al área de preparación**
   - Crea un archivo en tu proyecto:
     ```bash
     echo "Hola Git" > archivo.txt
     ```
   - Usa el comando `git add` para agregarlo al área de preparación:
     ```bash
     git add archivo.txt
     ```
   - Verifica el estado del archivo con:
     ```bash
     git status
     ```
   **Resultado esperado**: El archivo `archivo.txt` debe aparecer en verde bajo la sección "Changes to be committed".

7. **Agregar varios archivos al área de preparación**
   - Crea dos archivos nuevos:
     ```bash
     echo "Estilos CSS" > estilos.css
     echo "Script JS" > script.js
     ```
   - Agrega ambos archivos al área de preparación con un solo comando:
     ```bash
     git add estilos.css script.js
     ```
   - Verifica el estado del repositorio:
     ```bash
     git status
     ```
   **Resultado esperado**: Los archivos `estilos.css` y `script.js` deben estar en el área de preparación, listos para el commit.

8. **Agregar todos los archivos modificados al área de preparación**
   - Crea y modifica varios archivos:
     ```bash
     echo "Archivo A" > archivoA.txt
     echo "Archivo B" > archivoB.txt
     ```
   - Agrega todos los archivos modificados al área de preparación usando `git add .`:
     ```bash
     git add .
     ```
   - Verifica el estado del repositorio:
     ```bash
     git status
     ```
   **Resultado esperado**: Todos los archivos nuevos y modificados deben estar listos para el commit.

9. **Verificar archivos no rastreados**
   - Crea un nuevo archivo, pero **no lo agregues al área de preparación**:
     ```bash
     echo "Archivo sin agregar" > nuevoArchivo.txt
     ```
   - Ejecuta el comando `git status` para ver los archivos no rastreados:
     ```bash
     git status
     ```
   **Resultado esperado**: El archivo `nuevoArchivo.txt` debe aparecer bajo la sección "Untracked files".

10. **Verificar archivos modificados**
    - Modifica el archivo `archivo.txt`:
      ```bash
      echo "Agregado un cambio" >> archivo.txt
      ```
    - Ejecuta `git status` para ver los archivos modificados:
      ```bash
      git status
      ```
    **Resultado esperado**: El archivo `archivo.txt` debe aparecer bajo la sección "Changes not staged for commit" en rojo.

11. **Hacer un commit simple**
    - Asegúrate de que el archivo `archivo.txt` esté en el área de preparación:
      ```bash
      git add archivo.txt
      ```
    - Realiza un commit con un mensaje:
      ```bash
      git commit -m "Primer commit con archivo.txt"
      ```
    **Resultado esperado**: La terminal debe mostrar un mensaje confirmando que el commit fue exitoso, incluyendo el número de archivos modificados.

12. **Hacer un commit con varios archivos**
    - Asegúrate de que todos los archivos estén en el área de preparación:
      ```bash
      git add .
      ```
    - Realiza un commit describiendo los cambios:
      ```bash
      git commit -m "Agregados varios archivos y modificaciones"
      ```
    **Resultado esperado**: Git debe mostrar un mensaje confirmando el commit de múltiples archivos.

13. **Modificar un archivo y hacer otro commit**
    - Modifica el archivo `script.js`:
      ```bash
      echo "console.log('Hola Mundo');" >> script.js
      ```
    - Agrega el archivo al área de preparación y haz un commit:
      ```bash
      git add script.js
      git commit -m "Agregado código de consola en script.js"
      ```
    **Resultado esperado**: Git debe confirmar un nuevo commit.

14. **Ver el historial de commits**
    - Muestra el historial de commits de tu proyecto:
      ```bash
      git log
      ```
    **Resultado esperado**: Debes ver una lista de commits con detalles como el autor, la fecha y el mensaje del commit.

15. **Ver el historial en formato abreviado**
    - Muestra el historial de commits en formato resumido:
      ```bash
      git log --oneline
      ```
    **Resultado esperado**: Debes ver una lista de commits donde cada uno aparece en una sola línea con su hash corto y mensaje.

16. **Ver el historial de un archivo específico**
    - Muestra el historial de commits relacionados con el archivo `archivo.txt`:
      ```bash
      git log archivo.txt
      ```
    **Resultado esperado**: Debes ver solo los commits donde se haya modificado `archivo.txt`.

17. **Modificar archivos y seguir el flujo completo**
    - Modifica el archivo `archivoB.txt`:
      ```bash
      echo "Nueva línea en archivo B" >> archivoB.txt
      ```
    - Verifica el estado, agrega el archivo al área de preparación, y realiza un commit con un mensaje descriptivo.

**Resultado esperado**: El archivo modificado debe pasar por todo el flujo de trabajo y aparecer en el historial de commits.

18. **Volver a hacer cambios y confirmar**
    - Modifica el archivo `estilos.css` agregando una nueva regla:
      ```bash
      echo "body {background-color: #f0f0f0;}" >> estilos.css
      ```
    - Verifica el estado, agrega el archivo al área de preparación, y haz un commit con un mensaje descriptivo.

19. **Ver el estado y el historial tras varios commits**
    - Tras varios commits, ejecuta `git log` y `git status` para revisar la historia del proyecto.

20. **Búsqueda de commits por autor**
    - Muestra solo los commits realizados por ti:
      ```bash
      git log --author="Tu Nombre"
      ```

---
