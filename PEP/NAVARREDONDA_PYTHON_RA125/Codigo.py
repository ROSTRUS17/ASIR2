#EJERCICIO NAVARREDONDA_PYTHON
import random
import datetime

# Definimos el mapeo de números a los nombres de días que necesitas
# 0: Lunes 1: Martes 2: Miércoles 3: Jueves 4: Viernes 5: Sábado 6: Domingo
DIAS_SEMANA = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo']

#Hago que pregunte los datos que tiene que introducir el usuario
#---------------------------------------------------------------#
edad = int(input("Dime tu edad = "))
print(f"Tu edad es {edad}")
#---------------------------------------------------------------#
tipo_dia = input("'laboral' o 'fin de semana'= ")
if (tipo_dia == "laboral" or tipo_dia == "Laboral" or tipo_dia == "LABORAL"):
  print ("Tipo de día es " + tipo_dia)
elif (tipo_dia == "fin de semana" or tipo_dia == "Fin de semana" or tipo_dia == "FIN DE SEMANA"):
  print ("Tipo de día es" + tipo_dia)
else:
  print("Error en los datos, empiece de nuevo.")
#---------------------------------------------------------------#
tipo_grupo = input("familiar , colegio , individual ")
if (tipo_grupo == "familiar" or tipo_grupo == "Familiar" or tipo_grupo == "FAMILIAR"):
  print ("Tipo de grupo es " + tipo_grupo)
elif (tipo_grupo == "colegio" or tipo_grupo == "Colegio" or tipo_grupo == "COLEGIO"):
  print ("Tipo de grupo es " + tipo_grupo)
elif (tipo_grupo == "individual" or tipo_grupo == "Individual" or tipo_grupo == "INDIVIDUAL"):
  print ("Tipo de grupo es " + tipo_grupo)
else:
  print("Error en los datos, empiece de nuevo.")
#---------------------------------------------------------------#
residencia = input("'madrid','otra provincia'")
if (residencia == "Madrid" or residencia == "madrid" or residencia ==  "MADRID"):
  print ("eres de " + residencia)
elif (residencia == "otra provincia" or residencia == "Otra provincia" or residencia == "OTRA PROVINCIA" ):
  print ("eres de " + residencia)
else:
  print("Error en los datos, empiece de nuevo.")
#--------------------------------------------------------------------------------#
# Pillar día de la semana
today = datetime.date.today() # Obtiene la fecha actual del sistema
dia_semana_index = today.weekday() # Devuelve un número según el día de la semana:
dia_semana = DIAS_SEMANA[dia_semana_index]# Lunes es 0, Domingo es 6, referenciado antes
print(f"Hoy es {dia_semana}")
#--------------------------------------------------------------------------------#
socio = random.choices(["Sí","No"], weights=[80,20],k=1)[0] #con el [0] evitamos que coja la lista entera es decir ["si"] y se quede en un "si"
print("Eres socio? " + socio)
#--------------------------------------------------------------------------------#
altura = float(input("Dime tu altura = "))
print(f"Tu altura es {altura}")
#--------------------------------------------------------------------------------#

#calculo el precio final en vase a condiciones

#--------------------------------------------------------------------------------#
if (socio == "Sí" and edad > 65):
  print("El precio final son de:\n")
  print("""
  0000
 0    0
 0    0
 0    0   € EUROS
 0    0
 0    0
  0000
""")
#--------------------------------------------------------------------------------#
elif socio == "Sí" and residencia == "Madrid":
  print("El precio final son de:\n")
  print("""
22222   
    2   
    2   
  22    
 2      
2       
222222  

22222   
    2   
    2   
  22    
 2      
2       
222222  

   .    

55555   
5       
5555    
    5   
    5   
5   5   
 555     € EUROS
""")
#---------------------------------------------------------------------------------#
elif altura < 1.20 or edad < 4:
  print("El precio final son de:\n")
  print("""
22222   
    2   
    2   
  22    
 2      
2       
222222  

4   4   
4   4   
4   4   
444444  
    4   
    4   
    4   

   .    

77777   
    7   
   7    
  7     
 7      
7       
7       

55555   
5       
5555    
    5   
    5   
5   5   
 555     € EUROS
""")
#--------------------------------------------------------------------------------------#
elif (tipo_grupo == "colegio" and (dia_semana == "lunes" or dia_semana == "viernes")):
  print("El precio final son de:\n")
  print("""
22222   
    2   
    2   
  22    
 2      
2       
222222  

99999   
9   9   
9   9   
 9999   
    9   
    9   
    9   

   ,    

22222   
    2   
    2   
  22    
 2      
2       
222222  

55555   
5       
5555    
    5   
    5   
5   5   
 555     € EUROS
""")
#--------------------------------------------------------------------#
elif (dia_semana == "jueves" and tipo_dia == "laboral"):
  print("El precio final son de:\n")
  print("""
33333   
    3   
    3   
  333   
    3   
    3   
33333   

11111   
   1    
   1    
   1    
   1    
   1    
11111   

   ,    

55555   
5       
5555    
    5   
    5   
5   5   
 555    

0000    
0   0   
0   0   
0   0   
0   0   
0   0   
0000     € EUROS
""")
#---------------------------------------------------------------#
elif (edad < 18 and tipo_dia =="laboral"):
  print("El precio final son de:\n")
  print("""
33333   
    3   
    3   
  333   
    3   
    3   
33333   

33333   
    3   
    3   
  333   
    3   
    3   
33333   

   ,    

77777   
    7   
   7    
  7     
 7      
7       
7       

55555   
5       
5555    
    5   
    5   
5   5   
 555     € EUROS
""")

#---------------------------------------------------------------#
elif (tipo_grupo == "familiar" and residencia == "otra provincia"):
  print("El precio final son de:\n")
  print("""
33333   
    3   
    3   
  333   
    3   
    3   
33333   

66666   
6       
6       
6666    
6   6   
6   6   
6666     € EUROS
""")

#---------------------------------------------------------------#
elif (edad > 18 and edad < 25):
  print("El precio final son de:\n")
  print("""
4   4   
4   4   
4   4   
444444  
    4   
    4   
    4   

0000    
0   0   
0   0   
0   0   
0   0   
0   0   
0000    

   ,    

55555   
5       
5555    
    5   
    5   
5   5   
 555    

 000    
0   0   
0   0   
0   0   
0   0   
0   0   
 000     € EUROS
""")

#---------------------------------------------------------------#
elif ((dia_semana == "sábado" or dia_semana == "domingo") and tipo_grupo == "familiar"):
  print("El precio final son de:\n")
  print("""
4   4   
4   4   
4   4   
444444  
    4   
    4   
    4   

77777   
    7   
   7    
  7     
 7      
7       
7       

   ,    

22222   
    2   
    2   
  22    
 2      
2       
222222  

55555   
5       
5555    
    5   
    5   
5   5   
 555     € EUROS
""")

#---------------------------------------------------------------#
elif (dia_semana == "miercoles" and residencia == "otra provincia"):
  print("El precio final son de:\n")
  print("""
4   4   
4   4   
4   4   
444444  
    4   
    4   
    4   

99999   
9   9   
9   9   
 9999   
    9   
    9   
    9   

   ,    

55555   
5       
5555    
    5   
    5   
5   5   
 555     € EUROS
""")

#---------------------------------------------------------------#
elif (dia_semana == "sábado" or dia_semana == "domingo" and tipo_grupo == "individual" and residencia == "otra provincia" ):
  print("El precio final son de:\n")
  print("""
55555   
5       
5555    
    5   
    5   
5   5   
 555    

33333   
    3   
    3   
  333   
    3   
    3   
33333    € EUROS
""")

#---------------------------------------------------------------#
else:
  print("El precio final son de:\n")
  print("""
4   4   
4   4   
4   4   
444444  
    4   
    4   
    4   

55555   
5       
5555    
    5   
    5   
5   5   
 555     € EUROS
""")