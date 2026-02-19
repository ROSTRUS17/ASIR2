from flask import Flask, jsonify, request

app= Flask(__name__)

poblado=
{
    "nombre": "Sotana del Marqués",
    "habitantes": {"mujeres": 26, "hombres":24},
    "num_bares":0

}

#ruta principal
@app.route("/")
def inicio():
    return "Servidor del poblado funcionando"
#ruta para obetener todo el poblado
@app.route("/poblado", methods={"GET"})
def obtener_poblado():
    return jsonify(poblado)

#ruta para obetener todo el poblado
@app.route("/nuevo_bar", methods={"POST"})
def aumentarBar():
    poblado["num_bares"] += 1
    return jsonify(poblado)

#ruta para obetener todo el poblado
@app.route("/nuevo_barES", methods={"POST"})
def aumentarBar():
    datos = request.get_json
    cantidad = datos.get("cantidad")
    poblado["num_bares"] = poblado["num_bares"] + cantidad
    return jsonify(poblado)

# Inicio servidor

if __name__ == "__main__"
    app.run(host="0.0.0.0",port=5000,debug=True)