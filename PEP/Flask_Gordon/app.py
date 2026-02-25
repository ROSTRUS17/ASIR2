from flask import Flask, render_template, request, jsonify

app = Flask(__name__)

# El coche comienza apagado y con velocidad inicial 
car_state = {
    "engine_on": False,
    "speed": 0,
    "blinker_left": False,
    "blinker_right": False,
    "honk": False
}

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/action', methods=['POST'])
def action():
    global car_state
    data = request.json
    action_type = data.get('action')
    increment = int(data.get('increment', 10))

    car_state['honk'] = False # Resetea el claxon en cada pulsación

    # Arranque y apagado
    if action_type == 'arrancar':
        car_state['engine_on'] = True
    elif action_type == 'apagar':
        # Al apagar: velocidad vuelve a 0 y todo se deshabilita
        car_state['engine_on'] = False
        car_state['speed'] = 0
        car_state['blinker_left'] = False
        car_state['blinker_right'] = False

    # Hasta que no se arranca, no funciona ninguna acción 
    if car_state['engine_on']:
        if action_type == 'acelerar':
            car_state['speed'] += increment # Aumenta de n en n 
            car_state['blinker_left'] = False # Al acelerar los intermitentes se paran 
            car_state['blinker_right'] = False
        elif action_type == 'frenar':
            car_state['speed'] = max(0, car_state['speed'] - increment) # Nunca negativa
            car_state['blinker_left'] = False
            car_state['blinker_right'] = False
        elif action_type == 'girar_izq':
            car_state['blinker_left'] = True # Activa automáticamente el intermitente izquierdo 
            car_state['blinker_right'] = False # El derecho se apaga
        elif action_type == 'girar_der':
            car_state['blinker_right'] = True # Activa automáticamente el intermitente derecho
            car_state['blinker_left'] = False # El izquierdo se apaga
        elif action_type == 'pitar':
            car_state['honk'] = True # Solo funciona si el coche está encendido

    return jsonify(car_state)

@app.route('/state', methods=['GET'])
def state():
    return jsonify(car_state)

if __name__ == '__main__':
    app.run(debug=True)
