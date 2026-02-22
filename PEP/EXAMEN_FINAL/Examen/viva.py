def vivan_los_guarismos():
    try:
        n = int(input("Introduce un número entero payasooo: "))
    
    # Por si algun subnormal se hace el gracioso
    except ValueError:
        print("Que metas el numero bien coño")
        return

    if n <= 1:
        print("TIENE QUE SER UN NUMERO MAYOR QUE 1 para que funcione bien")
        
    # 1 a n y de n a 1

    for i in range(1, n + 1):
        print(i, end="")

    for i in range(n, 0, -1):
        print(i, end="")
    print()  

    # Nº hasta n-1 entere comas
    for i in range(1, n):
        if i < n - 1:
            print(i, end=",")
        else:
            print(i)
    
    # Si n = 1,bucle anterior no imprime nada
    if n <= 1:
        print()

    # Nº Pares desde 1 a n
    for i in range(1, n + 1):
        if i % 2 == 0:
            print(i, end="")
    print()  

    # Multiplos 3 desde rl 1 a n con * *
    x = True
    for i in range(1, n + 1):
        if i % 3 == 0:
            if not x:
                print("*", end="")
            print(i, end="")
            x = False
            print("*") 

# Ejecucioooooooon de la leche
if __name__ == "__main__":
    vivan_los_guarismos()