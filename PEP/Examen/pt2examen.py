    print("Opciones:")
    print("1. Sumar")
    print("2. Restar")
    print("3. Multiplicar")
    print("4. Salir")

    opcion = input("Elige una opción: ")

    if opcion == "4":
        print("Fin del programa.")

    elif opcion in ["1", "2", "3"]:
        try:
            n1 = int(input("Introduce el primer número: "))
            n2 = int(input("Introduce el segundo número: "))
            n3 = int(input("Introduce el tercer número: "))

            resultado = 0

            if opcion == "1":
                resultado = n1 + n2 + n3
            elif opcion == "2":
                resultado = n1 - n2 - n3
            elif opcion == "3":
                resultado = n1 * n2 * n3


            print("Resultado decimal:", resultado)

            print("Resultado binario:", bin(resultado))

        except ValueError:
            # Si no introduce un número válido
            print("ERROR: Vuelve atras.")
    
    else:
        # Si no es 1 2 3 4
        print("Opción no reconocida.")