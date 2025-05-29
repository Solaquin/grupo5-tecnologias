from flask import Flask, render_template, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_marshmallow import Marshmallow
from flask_cors import CORS
from dotenv import load_dotenv
import os


# Load environment variables from .env file
load_dotenv()
user_db = os.getenv('DB_USER')
password_db = os.getenv('DB_PASSWORD')
host_db = os.getenv('DB_HOST')
port_db = os.getenv('DB_PORT')
name_db = os.getenv('DB_NAME')

app = Flask(__name__)
CORS(app)

app.config['SQLALCHEMY_DATABASE_URI'] = f"mysql+pymysql://{user_db}:{password_db}@{host_db}:{port_db}/{name_db}"
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)
ma = Marshmallow(app)

class Tarjeta(db.Model):
    __tablename__ = 'tarjeta'
    id = db.Column(db.Integer, primary_key=True)
    name = db.Column(db.String(255), nullable=False)
    description = db.Column(db.String(255), nullable=False)
    img = db.Column(db.String(255), nullable=False)

    def __init__(self, name, description, img):
        self.name = name
        self.description = description
        self.img = img

class TarjetaSchema(ma.SQLAlchemyAutoSchema):
    class Meta:
        model = Tarjeta
        load_instance = True

tarjeta_schema = TarjetaSchema()
tarjetas_schema = TarjetaSchema(many=True)

@app.route('/', methods=['GET'])
def index():
    return jsonify({'message': 'Welcome to the Flask API!'})

@app.route('/tarjetas', methods=['GET'])
def get_categoria():
    all_categorias = Tarjeta.query.all()
    result = tarjetas_schema.dump(all_categorias)
    return jsonify(result)

@app.route('/tarjetas/<id>', methods=['GET'])
def get_categoriaID(id):
    categoria = Tarjeta.query.get(id)
    return tarjeta_schema.jsonify(categoria)

@app.route('/tarjetas', methods=['POST'])
def add_categoria():
    data = request.get_json(force=True)
    name = data['name']
    description = data['description']
    img = data['img']

    new_categoria = Tarjeta(name, description, img)

    db.session.add(new_categoria)
    db.session.commit()

    return tarjeta_schema.jsonify(new_categoria)

@app.route('/tarjetas/<id>', methods=['PUT'])
def update_categoria(id):
    data = request.get_json(force=True)

    categoria = Tarjeta.query.get(id)

    name = data['name']
    description = data['description']
    img = data['img']

    categoria.name = name
    categoria.description = description
    categoria.img = img
    
    db.session.commit()

    return tarjeta_schema.jsonify(categoria)

@app.route('/tarjetas/<id>', methods=['DELETE'])
def delete_categoria(id):
    categoria = Tarjeta.query.get(id)

    db.session.delete(categoria)
    db.session.commit()

    return tarjeta_schema.jsonify(categoria)


if __name__ == '__main__':
    with app.app_context():
        db.create_all()
        app.run(debug = True)

