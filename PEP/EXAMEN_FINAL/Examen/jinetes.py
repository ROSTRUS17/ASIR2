import tkinter as tk
from tkinter import messagebox

# Guardar el estado jinetes
datos = {
"oros": {"3": False, "10": False, "11": False},
"bastos": {"3": False, "10": False, "11": False},
"doble": "oros"
}

# Funciones PALOS (Oros)
def open_oros():
    v = tk.Toplevel(ventana_principal)
    v.title("Cartas de Oros")
    v.geometry("300x200")
    v3 = tk.BooleanVar(value=datos["oros"]["3"])
    v10 = tk.BooleanVar(value=datos["oros"]["10"])
    v11 = tk.BooleanVar(value=datos["oros"]["11"])
    tk.Checkbutton(v, text="3 de Oros", variable=v3).pack(pady=5)
    tk.Checkbutton(v, text="Sota de Oros", variable=v10).pack(pady=5)
    tk.Checkbutton(v, text="Caballo de Oros", variable=v11).pack(pady=5)

    def guardar1():
        datos["oros"]["3"], datos["oros"]["10"], datos["oros"]["11"] = v3.get(), v10.get(), v11.get()
        v.destroy()
    tk.Button(v, text="OK", command=guardar1).pack(pady=10)

# Funciones PALOS (Bastos)

def open_bastos():
    v = tk.Toplevel(ventana_principal)
    v.title("Cartas de Bastos")
    v.geometry("300x200")
    v3 = tk.BooleanVar(value=datos["bastos"]["3"])
    v10 = tk.BooleanVar(value=datos["bastos"]["10"])
    v11 = tk.BooleanVar(value=datos["bastos"]["11"])
    tk.Checkbutton(v, text="3 de Bastos", variable=v3).pack(pady=5)
    tk.Checkbutton(v, text="Sota de Bastos", variable=v10).pack(pady=5)
    tk.Checkbutton(v, text="Caballo de Bastos", variable=v11).pack(pady=5)

    def guardar2():
        datos["bastos"]["3"], datos["bastos"]["10"], datos["bastos"]["11"] = v3.get(), v10.get(), v11.get()
        v.destroy()
    tk.Button(v, text="OK", command=guardar2).pack(pady=10)

# Ventana para elegir el palo DOBLE
def open_doble():
    v = tk.Toplevel(ventana_principal)
    v.title("Elegir Doble")
    v.geometry("300x200")
    lista = tk.Listbox(v, height=2)
    lista.insert(0, "OROS")
    lista.insert(1, "BASTOS")
    lista.pack(pady=15)

    def guardar3():
        if lista.curselection():
            datos["doble"] = lista.get(lista.curselection()[0]).lower()
            v.destroy()
    tk.Button(v, text="OK", command=guardar3).pack()

# Ventana RESULTADO

def open_resultado():
    v = tk.Toplevel(ventana_principal)
    v.title("Resultado")
    v.geometry("350x300")
    p_oros = (3 if datos["oros"]["3"] else 0) + (10 if datos["oros"]["10"] else 0) + (11 if datos["oros"]["11"] else 0)
    p_bastos = (3 if datos["bastos"]["3"] else 0) + (10 if datos["bastos"]["10"] else 0) + (11 if datos["bastos"]["11"] else 0)

    # Aplicar el doble
    total = (p_oros * 2 + p_bastos) if datos["doble"] == "oros" else (p_oros + p_bastos * 2)
    tk.Label(v, text="RESUMEN", font=("Arial", 12, "bold")).pack(pady=10)
    tk.Label(v, text=f"Palo Doble: {datos['doble'].upper()}").pack()
    tk.Label(v, text=f"Puntuación:", font=("Arial", 15)).pack(pady=10)
    tk.Label(v, text=str(total), fg="red", font=("Arial", 85, "bold")).pack()

# Ventana Principal
ventana_principal = tk.Tk()
ventana_principal.title("3 Jinetas")
ventana_principal.geometry("600x300")

tk.Label(ventana_principal, text="3 Jinetas", fg="green", font=("Arial", 70, "bold")).pack(pady=60)

# Menu
barra = tk.Menu(ventana_principal)
ventana_principal.config(menu=barra)

m_palos = tk.Menu(barra, tearoff=0)
barra.add_cascade(label="PALOS", menu=m_palos)
m_palos.add_command(label="OROS", command=open_oros)
m_palos.add_command(label="BASTOS", command=open_bastos)

barra.add_command(label="DOBLE", command=open_doble)
barra.add_command(label="RESULTADO", command=open_resultado)

ventana_principal.mainloop()
