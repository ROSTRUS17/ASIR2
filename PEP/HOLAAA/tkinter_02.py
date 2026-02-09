import tkinter as tk
from tkinter import messagebox

ventana = tk.Tk()
ventana.title('Saludo')
ventana.geometry('500x300')

def mostrar_info():
    messagebox.showinfo('Acerca de', 'Esta es una aplicación de ejemplo usando Tkinter.')

def salir():
    ventana.destroy()

def abrir_ventana_secundaria():
    ventana_secundaria = tk.Toplevel(ventana)
    ventana_secundaria.title('Ventana Secundaria')
    ventana_secundaria.geometry('300x200')
    tk.Label(ventana_secundaria, text='¡Hola desde la ventana secundaria!').pack(pady=20)
    tk.Button(ventana_secundaria, text='Cerrar', command=ventana_secundaria.destroy).pack(pady=10)



menu_barra = tk.Menu(ventana)
ventana.config(menu=menu_barra)

menu_archivo= tk.Menu(menu_barra,tearoff=0)
menu_ayuda= tk.Menu(menu_barra,tearoff=0)
menu_barra.add_cascade(label='Archivo', menu=menu_archivo)
menu_barra.add_cascade(label='Ayuda', menu=menu_ayuda)
menu_archivo.add_command(label='Abrir ventana', command=abrir_ventana_secundaria)
menu_ayuda.add_command(label='Acerca de', command=mostrar_info)
menu_archivo.add_separator()
menu_archivo.add_command(label='Salir', command=salir)

ventana.mainloop()
