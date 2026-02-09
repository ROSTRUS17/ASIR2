import tkinter as tk

ventana = tk.Tk()
ventana.title('Saludo')
ventana.geometry('500x300')

etiqueta1=tk.Label(ventana, text='Escribe algo:')
etiqueta1.pack(pady=20)

entrada=tk.Entry(ventana)
entrada.pack(pady=3)


def saludar():
    nombre = entrada.get()
    etiqueta2.config(text=f'Hola, {nombre} segun mis datos eres muy gay!')

boton1=tk.Button(ventana, text='Saludar', command=saludar)
boton1.pack(pady=5)

etiqueta2=tk.Label(ventana, text='')
etiqueta2.pack(pady=2)

ventana.mainloop()
