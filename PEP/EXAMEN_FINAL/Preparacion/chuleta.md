import tkinter as tk 
from tkinter import messagebox 

# funcion analizar input

def analizar_input():

    texto = input_numero.get()
    
    if texto == "":
        messagebox.showerror("Error escribe un numero")
        return
    
    numero = int(texto)
    if numero % 2 == 0:
        input_par = "El numero es Par"
    else:
        input_par = "El numero es Impar"
    
    cantidad_cifras = len(texto)

    al_reves = texto[::-1]

    resultado_final = f"{input_par} , Tiene {cantidad_cifras} cifras y al Reves es: {al_reves}"

    etiqueta_resultado.config(text=resultado_final)
        

# Tkinter parte visual

ventana = tk.Tk()
ventana.title("Analizador de inputs")
ventana.geometry("350x250")

tk.Label(ventana, text="Introduce un numero entero: ", font=("Arial", 12)).pack(pady=10)

input_numero = tk.Entry(ventana)
input_numero.pack(pady=10)

btn_analizarInput = tk.Button(ventana, text="Analizar", command=analizar_input)
btn_analizarInput.pack(pady=10)

etiqueta_resultado = tk.Label(ventana, text="Resultado del analisis...")
etiqueta_resultado.pack(pady=10)


ventana.mainloop()


#apuntes alberto

Documento Explicativo: Ejercicios de
Python (Jutge)
Este documento resume y explica los conceptos de programación en Python aplicados en
los 27 ejercicios de la plataforma Jutge, estructurados en tres bloques temáticos.
Tema 1: Conceptos Básicos, Entrada/Salida y Gráficos
● Salidas simples y librería Turtle: Los primeros ejercicios introducen el uso básico
de la función print y de la librería visual turtle para trazar líneas rectas y giros,
formando figuras geométricas como cuadrados.
● Lectura de variables simples: Se aprende a solicitar información al usuario
mediante la función input() y se convierte la respuesta a un número entero con int()
para definir el tamaño de una figura en pantalla.
● Lectura avanzada y sumas: Se introduce el uso de la librería sys para leer la
entrada estándar de manera masiva con sys.stdin.read().split(). Esto permite
capturar múltiples números a la vez y realizar operaciones aritméticas básicas, como
la suma de dos o tres valores.
● Operaciones matemáticas con tiempo: Se utilizan operadores matemáticos como
la división entera (//) y el resto o módulo (%) para calcular conversiones de tiempo,
transformando una cantidad total de segundos en un formato de horas, minutos y
segundos.
Tema 2: Condicionales (If, Elif, Else)
● Comparaciones lógicas: Se aplican las estructuras de decisión if, elif y else para
evaluar qué número es mayor al comparar dos o tres variables ingresadas. Estas
comprobaciones se refuerzan combinándolas con el operador lógico and.
● Evaluación de estados: Se evalúa un valor de temperatura para imprimir distintos
mensajes según las franjas térmicas (frío, calor, agua congelada o hirviendo).
● Condicionales aplicados a gráficos: El programa lee una cadena de texto (círculo,
cuadrado o rectángulo) y utiliza un if/elif para decidir qué figura exacta debe dibujar
en la pantalla utilizando turtle.
● Lógica de relojes y calendarios: Se implementa un script que suma un segundo a
un reloj digital, anidando condicionales para controlar correctamente el reinicio de los
segundos o minutos al llegar a 60, y de las horas al llegar a 24. También se calculan
los años bisiestos usando condiciones matemáticas múltiples.
● Lógica de intervalos: A través de varias comparaciones y el uso de las funciones
max() y min(), se calcula si existe una intersección entre dos rangos numéricos y se
determina la relación matemática entre ellos (si uno contiene al otro, si son iguales o
si son disjuntos).
Tema 3: Bucles (For, While) y Algoritmos

● Bucles For y rangos: Se usa la estructura for junto a la función range() para iterar
sobre secuencias. Esto se utiliza para imprimir números de forma ascendente o
descendente. También se emplea para generar la tabla de multiplicar de un número
del 1 al 10.
● Manejo de Cadenas de Texto (Strings): Se cuentan los dígitos de un valor leyendo
la longitud de su formato de texto con len(). Además, se aplica la técnica de partición
(slicing) [::-1] para invertir cadenas de texto.
● Algoritmos matemáticos iterativos con While:
○ Conversión a binario: Se utiliza un bucle while para dividir un número
decimal entre 2 repetidamente, guardando los restos para formar su
representación binaria.
○ Máximo Común Divisor (MCD): Implementación del algoritmo de Euclides
para encontrar el MCD entre dos cifras actualizando los valores hasta que el
resto sea cero.
○ Factores Primos: Uso de un while anidado para descomponer un número en
sus divisores primos.

● Bucles anidados y dibujos complejos:
○ Se combinan bucles anidados con turtle para crear una espiral paramétrica
que aumenta su longitud en cada giro.
○ Se utiliza un bucle dentro de otro para definir filas y columnas, logrando
dibujar una cuadrícula (matriz) de cuadrados separados en la pantalla.
○ Se crean figuras directamente en la consola de comandos, utilizando bucles
para multiplicar espacios y caracteres asteriscos (*) con el fin de imprimir un
rombo simétrico.

Resumen de Buenas Prácticas (Apuntes)
De acuerdo a tus apuntes de clase, todos los ejercicios respetan principios muy importantes
en la plataforma Jutge:
1. Conversión forzosa: La función input() siempre recupera texto por defecto. Para
operar matemáticamente, siempre debe ser convertido usando int() o float().
2. Prevención de Errores (Try/Except): Dado que la validación automática de la
plataforma puede incluir errores de formato o valores inexistentes, se emplea try y
except para evitar que el programa se rompa por completo (crash). Esto se puede
ver aplicado en scripts que descartan un ValueError para poder continuar su
ejecución de forma segura.
3. Procesamiento de líneas masivas: A diferencia de ejecutar un solo comando,
muchos de los ejercicios aprovechan utilidades como sys.stdin.read().split() o el
método .readline() para capturar de manera fluida y robusta grandes bloques de
texto sin importar cómo estén espaciados en la consola.

Anexo: Comandos y Funciones Clave
(Cheat Sheet)
A continuación, se detallan las instrucciones y herramientas de Python imprescindibles que
se han aplicado en esta primera parte de ejercicios en Jutge, explicadas de forma sencilla:
1. Entrada y Salida de Datos (I/O)
● print(valor): Imprime un resultado en la pantalla. Puedes imprimir texto
combinándolo con variables separadas por comas.
● input(&quot;Mensaje&quot;): Pausa el programa y espera a que el usuario escriba algo y pulse
Enter. ¡Ojo! Siempre devuelve un texto (string).
● import sys y sys.stdin.read().split(): Es la forma &quot;profesional&quot; (y necesaria en
Jutge) de leer muchos datos de golpe. Lee todo lo que se introduzca en la consola y
lo separa en una lista de palabras/números, ignorando los espacios o saltos de línea
sobrantes.
2. Conversión de Tipos (Casting)
Como Jutge a menudo da los números como texto, es vital convertirlos para poder hacer
matemáticas:
● int(valor): Convierte un texto o número decimal en un número entero (sin
decimales). Ejemplo: int(&quot;5&quot;) se convierte en el número 5.
● str(valor): Convierte un número en texto. Muy útil si necesitas usar funciones como
len() para contar cuántas cifras tiene un número.
● float(valor): Convierte un texto a un número con decimales.
3. Operadores Matemáticos Especiales
Además de la suma (+), resta (-) y multiplicación (*), en los ejercicios de conversiones
(como el del tiempo o el de binario) has usado:
● // (División entera): Divide dos números pero descarta los decimales. Ejemplo: 10 //
3 da como resultado 3 (en lugar de 3.33).
● % (Módulo o Resto): Devuelve lo que &quot;sobra&quot; de una división. Ejemplo: 10 % 3 da
como resultado 1. Es fundamental para saber si un número es par (n % 2 == 0) o
para sacar factores primos.
● max(a, b) / min(a, b): Devuelven el número más grande o el más pequeño de los
que le pases. Muy usados en los ejercicios de calcular intervalos.
4. Herramientas para Textos (Strings) y Listas
● len(texto): Te dice la longitud de algo. Si le pasas una palabra o un número
convertido a texto, te dirá cuántos caracteres o dígitos tiene.

● texto[::-1] (Slicing): Un truco muy potente de Python. Sirve para darle la vuelta a un
texto. Si tienes &quot;123&quot;, usando esto obtendrás &quot;321&quot;.
5. Control de Flujo (Bucles y Rangos)
● range(inicio, fin): Genera una secuencia de números. Empieza en el inicio y
termina justo antes del fin.
○ Ejemplo: for i in range(1, 11): dará los números del 1 al 10 (ideal para la tabla
de multiplicar).

● range(inicio, fin, paso): Igual que el anterior, pero avanza de tanto en tanto. Si el
paso es -1, el bucle va hacia atrás (cuenta regresiva).
● while condicion:: Repite un bloque de código mientras la condición sea verdadera.
Fundamental para algoritmos donde no sabes cuántas vueltas vas a dar (como
sacar el Máximo Común Divisor o descomponer en binario).
6. Librería Gráfica (Turtle)
Para los ejercicios visuales (dibujar cuadrados, espirales, etc.):
● import turtle: Activa la librería de dibujo.
● turtle.forward(distancia) o turtle.fd(x): Mueve la &quot;tortuga&quot; (el lápiz) hacia adelante
trazando una línea.
● turtle.left(grados) / turtle.right(grados): Gira la dirección de la tortuga hacia la
izquierda o la derecha. Fundamental para hacer esquinas (ej. turtle.left(90) para un
cuadrado).
● turtle.penup() / turtle.pendown(): Levanta el lápiz (para moverte sin dibujar) y lo
baja (para volver a trazar).
● turtle.done(): Se coloca siempre al final del script para evitar que la ventana de
dibujo se cierre de golpe al terminar.


# 🛠️ CHULETA DE EXAMEN: TKINTER Y LÓGICA PYTHON

## 1. Tkinter (Interfaces Gráficas)

### Ventanas principales y secundarias
```python
import tkinter as tk
from tkinter import Toplevel

# 1. Crear la ventana principal (Solo debe haber una)
root = tk.Tk()
root.geometry("600x400") # Define el tamaño (ancho x alto)
root.title("App Principal")

# 2. Crear una ventana secundaria (Submenú)
def abrir_secundaria():
    win = Toplevel(root)
    win.geometry("300x200")
    win.title("Ventana Secundaria")
    
    # Cerrar esta ventana actual
    tk.Button(win, text="Cerrar esta ventana", command=win.destroy).pack(pady=10)

tk.Button(root, text="Abrir Secundaria", command=abrir_secundaria).pack(pady=20)

# 3. Bucle infinito que mantiene la app abierta (Siempre al final)
root.mainloop()





import tkinter as tk

root = tk.Tk()

# Declarar variables
var_texto = tk.StringVar()
var_entero = tk.IntVar()
var_booleana = tk.BooleanVar()

# .set(valor): Para modificar el valor desde el código
var_texto.set("Hola Mundo")
var_booleana.set(True) # Ideal para simular el 80% de socios

# .get(): Para leer lo que el usuario ha introducido
def mostrar_datos():
    texto_ingresado = var_texto.get()
    
    # ¡Importante! Si necesitas cálculos, asegúrate de convertir el texto a número:
    try:
        numero = int(var_entero.get())
        print(f"El doble es: {numero * 2}")
    except ValueError:
        print("¡Error! Debes introducir un número.")

tk.Entry(root, textvariable=var_texto).pack()
tk.Entry(root, textvariable=var_entero).pack()
tk.Button(root, text="Imprimir en consola", command=mostrar_datos).pack()

root.mainloop()








import tkinter as tk

root = tk.Tk()

# Declarar variables
var_texto = tk.StringVar()
var_entero = tk.IntVar()
var_booleana = tk.BooleanVar()

# .set(valor): Para modificar el valor desde el código
var_texto.set("Hola Mundo")
var_booleana.set(True) # Ideal para simular el 80% de socios

# .get(): Para leer lo que el usuario ha introducido
def mostrar_datos():
    texto_ingresado = var_texto.get()
    
    # ¡Importante! Si necesitas cálculos, asegúrate de convertir el texto a número:
    try:
        numero = int(var_entero.get())
        print(f"El doble es: {numero * 2}")
    except ValueError:
        print("¡Error! Debes introducir un número.")

tk.Entry(root, textvariable=var_texto).pack()
tk.Entry(root, textvariable=var_entero).pack()
tk.Button(root, text="Imprimir en consola", command=mostrar_datos).pack()

root.mainloop()






import tkinter as tk

root = tk.Tk()
root.geometry("400x500")

# Label: Texto estático
tk.Label(root, text="Formulario de Registro", font=("Arial", 14, "bold")).pack(pady=10)

# Entry: Caja de texto (asociada a una variable)
nombre_var = tk.StringVar()
tk.Entry(root, textvariable=nombre_var).pack(pady=5)

# Checkbutton: Casilla de verificación (Sí/No)
socio_var = tk.BooleanVar()
tk.Checkbutton(root, text="¿Es socio?", variable=socio_var).pack(pady=5)

# Radiobutton: Opciones excluyentes (Misma variable para el mismo grupo)
provincia_var = tk.StringVar(value="Madrid") # Valor por defecto
tk.Radiobutton(root, text="Madrid", variable=provincia_var, value="Madrid").pack()
tk.Radiobutton(root, text="Otra", variable=provincia_var, value="Otra").pack()

# Listbox: Lista de elementos
tk.Label(root, text="Selecciona grupo:").pack(pady=5)
lista = tk.Listbox(root, height=3)
opciones = ["Individual", "Familiar", "Colegio"]
for op in opciones:
    lista.insert(tk.END, op)
lista.pack(pady=5)

# Botón normal (Sin paréntesis en el command)
def accion_boton():
    print("¡Botón pulsado!")

tk.Button(root, text="Guardar Datos", command=accion_boton).pack(pady=20)

# Menú Superior
menubar = tk.Menu(root)
root.config(menu=menubar)

menu_archivo = tk.Menu(menubar, tearoff=0)
menubar.add_cascade(label="Archivo", menu=menu_archivo)
menu_archivo.add_command(label="Imprimir saludo", command=lambda: print("Hola"))
menu_archivo.add_command(label="Salir", command=root.quit)

root.mainloop()






# //: División entera (Ignora los decimales)
segundos_totales = 3665
horas = segundos_totales // 3600  # Resultado: 1 hora

# %: Módulo o resto de la división
# Útil para sacar los segundos sobrantes:
segundos_restantes = segundos_totales % 3600 # Resultado: 65

# Útil para saber si es par o impar:
numero = 10
es_par = (numero % 2 == 0) # True

# Útil para años bisiestos:
anyo = 2024
es_bisiesto = (anyo % 4 == 0 and anyo % 100 != 0) or (anyo % 400 == 0)




Condicionales
Python
edad = 20
es_socio = True

# if, elif, else con operadores lógicos (and, or, not)
if edad < 4 or (es_socio and edad > 65):
    print("Entrada Gratis")
elif 18 <= edad <= 25 and not es_socio:
    print("Descuento del 10%")
else:
    print("Paga tarifa base")




# Bucle FOR: Para repetir un número exacto de veces
# range(inicio, fin, paso) -> El fin NO se incluye
numero_tabla = 5
print(f"--- Tabla del {numero_tabla} ---")
for i in range(1, 11): # Va del 1 al 10
    print(f"{numero_tabla} x {i} = {numero_tabla * i}")

# Bucle WHILE: Para repetir hasta que deje de cumplirse una condición
# Ej: Contar cuántos dígitos tiene un número (muy típico en Jutge)
numero_evaluar = 4567
contador_digitos = 0

if numero_evaluar == 0:
    contador_digitos = 1
else:
    while numero_evaluar > 0:
        contador_digitos += 1
        numero_evaluar = numero_evaluar // 10 # Le quitamos el último dígito

print(f"El número tiene {contador_digitos} dígitos.")
