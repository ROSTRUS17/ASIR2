import tkinter as tk
from tkinter import messagebox, Toplevel
import datetime
import random

class ParqueAtraccionesApp:
    def __init__(self, root):
        self.root = root
        self.root.title("ATRACCIONES")
        self.root.geometry("600x400")

        # --- VARIABLES DE DATOS (Inicializadas en None o valores vacíos) ---
        self.edad = tk.StringVar()
        self.altura = tk.StringVar()
        self.es_socio = tk.BooleanVar()
        self.provincia = tk.StringVar(value="Madrid") # Default visual según PDF
        self.grupo = tk.StringVar()
        self.tipo_dia = tk.StringVar()
        
        # Lógica del 80% socio al iniciar la app (Fuente 132)
        if random.random() <= 0.80:
            self.es_socio.set(True)
        else:
            self.es_socio.set(False)

        # --- MENÚ SUPERIOR (Fuente 121-127) ---
        menubar = tk.Menu(self.root)
        self.root.config(menu=menubar)

        # Menú Calcular
        menu_calcular = tk.Menu(menubar, tearoff=0)
        menubar.add_cascade(label="Calcular", menu=menu_calcular)
        menu_calcular.add_command(label="Persona", command=self.abrir_ventana_persona)
        menu_calcular.add_command(label="Grupo", command=self.abrir_ventana_grupo)
        menu_calcular.add_command(label="Tipo de día", command=self.abrir_ventana_tipo_dia)

        # Menú Ver Resultado
        menubar.add_command(label="Ver Resultado", command=self.calcular_y_mostrar)

        # Menú Salir
        menubar.add_command(label="Salir", command=self.root.quit)

    # --- VENTANA: PERSONA (Fuente 132-143) ---
    def abrir_ventana_persona(self):
        win = Toplevel(self.root)
        win.title("Persona")
        win.geometry("400x300")
        
        tk.Label(win, text="Edad:").pack(pady=5)
        entry_edad = tk.Entry(win, textvariable=self.edad)
        entry_edad.pack(pady=5)

        tk.Label(win, text="Altura (cm):").pack(pady=5)
        entry_altura = tk.Entry(win, textvariable=self.altura)
        entry_altura.pack(pady=5)
        
        tk.Frame(win, height=2, bd=1, relief=tk.SUNKEN).pack(fill=tk.X, padx=20, pady=10)

        chk_socio = tk.Checkbutton(win, text="Es socio", variable=self.es_socio)
        chk_socio.pack(pady=5)

        frame_prov = tk.Frame(win)
        frame_prov.pack(pady=5)
        tk.Label(frame_prov, text="Provincia: ").pack(side=tk.LEFT)
        tk.Radiobutton(frame_prov, text="Madrid", variable=self.provincia, value="Madrid").pack(anchor=tk.W)
        tk.Radiobutton(frame_prov, text="Otra provincia", variable=self.provincia, value="Otra provincia").pack(anchor=tk.W)

        tk.Button(win, text="Guardar", command=win.destroy).pack(pady=20)

    # --- VENTANA: GRUPO (Fuente 147-158) ---
    def abrir_ventana_grupo(self):
        win = Toplevel(self.root)
        win.title("Grupo")
        win.geometry("300x250")

        tk.Label(win, text="Tipo de grupo:", font=("Arial", 12)).pack(pady=10)

        listbox = tk.Listbox(win, height=4)
        opciones = ["Familiar", "Colegio", "Individual"]
        for op in opciones:
            listbox.insert(tk.END, op)
        listbox.pack(pady=5)

        # Seleccionar valor actual si existe
        if self.grupo.get() in opciones:
            index = opciones.index(self.grupo.get())
            listbox.selection_set(index)

        def guardar_grupo():
            seleccion = listbox.curselection()
            if seleccion:
                self.grupo.set(listbox.get(seleccion[0]))
            win.destroy()

        tk.Button(win, text="Usar selección", command=guardar_grupo).pack(pady=20)

    # --- VENTANA: TIPO DE DÍA (Fuente 159-166) ---
    def abrir_ventana_tipo_dia(self):
        win = Toplevel(self.root)
        win.title("Tipo de día")
        win.geometry("400x250")

        tk.Radiobutton(win, text="LABORAL", variable=self.tipo_dia, value="Laboral", 
                       font=("Arial", 16, "bold")).pack(pady=20)
        tk.Radiobutton(win, text="FIN DE SEMANA", variable=self.tipo_dia, value="Fin de semana", 
                       font=("Arial", 16, "bold")).pack(pady=10)

        tk.Button(win, text="Guardar", command=win.destroy).pack(pady=20)

    # --- LÓGICA DE CÁLCULO (Reglas Navarredonda) ---
    def obtener_dia_semana(self, usando_defaults):
        # Si estamos usando los defaults (porque faltaban datos), el PDF dice que es Sábado.
        if usando_defaults:
            return "sábado"
        
        # Si no, tomamos el del sistema (Fuente 189)
        dias = ["lunes", "martes", "miércoles", "jueves", "viernes", "sábado", "domingo"]
        return dias[datetime.datetime.today().weekday()]

    def calcular_precio_final(self, datos):
        # Desempaquetar datos
        edad = datos['edad']
        altura_m = datos['altura'] / 100.0  # Convertir cm a m
        socio = datos['socio']
        provincia = datos['provincia'].lower()
        grupo = datos['grupo'].lower()
        tipo_dia = datos['tipo_dia'].lower()
        dia_semana = datos['dia_semana'].lower()

        precio_base = 45.00
        
        # Aplicación de reglas por prioridad (1 es la más alta)
        # Fuente: Navarredonda PDF Pag 1 y 2
        
        # 1. Socio + Edad > 65 -> Gratis
        if socio and edad > 65:
            return 0.00
        
        # 2. Socio + Madrid -> 50% descuento
        if socio and provincia == "madrid":
            return precio_base * 0.50

        # 3. Altura < 1.20 O Edad < 4 -> 45% descuento
        if altura_m < 1.20 or edad < 4:
            return precio_base * (1 - 0.45)

        # 4. Colegio + (Lunes o Viernes) -> 35% descuento
        if grupo == 'colegio' and dia_semana in ['lunes', 'viernes']:
            return precio_base * (1 - 0.35)

        # 5. Jueves + Laboral -> 30% descuento
        if dia_semana == 'jueves' and tipo_dia == 'laboral':
            return precio_base * (1 - 0.30)

        # 6. Menor 18 + Laboral -> 25% descuento
        if edad < 18 and tipo_dia == 'laboral':
            return precio_base * (1 - 0.25)

        # 7. Familiar + Otra provincia -> 20% descuento
        if grupo == 'familiar' and provincia == 'otra provincia':
            return precio_base * (1 - 0.20)

        # 8. Edad 18-25 + NO socio -> 10% descuento
        if 18 <= edad <= 25 and not socio:
            return precio_base * (1 - 0.10)

        # 9. (Sabado o Domingo) + Familiar -> Recargo 5%
        if dia_semana in ['sábado', 'domingo'] and grupo == 'familiar':
            return precio_base * 1.05

        # 10. Miercoles + NO Madrid -> Recargo 10%
        if dia_semana == 'miércoles' and provincia != 'madrid':
            return precio_base * 1.10

        # 11. Fin de semana + Individual + Otra provincia -> +8 Euros
        if tipo_dia == 'fin de semana' and grupo == 'individual' and provincia == 'otra provincia':
            return precio_base + 8.00

        # 12. Tarifa Base
        return precio_base

    # --- VENTANA: VER RESULTADO (Fuente 169-175) ---
    def calcular_y_mostrar(self):
        # Verificar si faltan datos y aplicar defaults (Fuente 171)
        usando_defaults = False
        
        try:
            v_edad = int(self.edad.get())
        except ValueError:
            v_edad = 21 # Default
            usando_defaults = True

        try:
            v_altura = float(self.altura.get())
        except ValueError:
            v_altura = 155.0 # Default (1.55m -> 155cm)
            usando_defaults = True

        v_socio = self.es_socio.get()
        
        v_provincia = self.provincia.get()
        if not v_provincia:
            v_provincia = "Madrid"
            usando_defaults = True
            
        v_grupo = self.grupo.get()
        if not v_grupo:
            v_grupo = "Familiar"
            usando_defaults = True
            
        v_tipo_dia = self.tipo_dia.get()
        if not v_tipo_dia:
            v_tipo_dia = "Fin de semana"
            usando_defaults = True

        # Determinar día de la semana
        v_dia_semana = self.obtener_dia_semana(usando_defaults)

        datos = {
            'edad': v_edad,
            'altura': v_altura,
            'socio': v_socio,
            'provincia': v_provincia,
            'grupo': v_grupo,
            'tipo_dia': v_tipo_dia,
            'dia_semana': v_dia_semana
        }

        precio_final = self.calcular_precio_final(datos)

        # Crear ventana de resultado
        win = Toplevel(self.root)
        win.title("Resultado")
        win.geometry("500x300")
        win.configure(bg="#e1e1e1") # Gris claro como en la imagen

        # Texto resumen
        resumen_texto = (
            f"Edad: {v_edad} | Altura: {v_altura} cm | Socio: {'Si' if v_socio else 'No'} | Provincia: {v_provincia}\n"
            f"Grupo: {v_grupo} | Tipo de día: {v_tipo_dia} | Día de la semana: {v_dia_semana}"
        )
        
        tk.Label(win, text=resumen_texto, bg="#e1e1e1", justify=tk.CENTER, wraplength=480).pack(pady=20)

        # Precio Gigante (Fuente 175)
        # En la imagen se ve azul grande.
        tk.Label(win, text=f"{precio_final:.1f}€", fg="blue", bg="#e1e1e1", 
                 font=("Arial", 60, "bold")).pack(expand=True)

# --- INICIO DE LA APLICACIÓN ---
if __name__ == "__main__":
    root = tk.Tk()
    app = ParqueAtraccionesApp(root)
    root.mainloop()