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

class Producto(db.Model):
    __tablename__ = 'productos'
    id = db.Column(db.Integer, primary_key=True)
    name = db.Column(db.String(255), nullable=False)
    description = db.Column(db.String(255), nullable=False)
    img = db.Column(db.String(255), nullable=False)
    price = db.Column(db.Float, nullable=False)

    def __init__(self, name, description, img, price):
        self.name = name
        self.description = description
        self.img = img
        self.price = price

class ProductoSchema(ma.SQLAlchemyAutoSchema):
    class Meta:
        model = Producto
        load_instance = True

producto_schema = ProductoSchema()
productos_schema = ProductoSchema(many=True)

@app.route('/', methods=['GET'])
def index():
    return jsonify({'message': 'Welcome to the Flask API!'})

@app.route('/producto', methods=['GET'])
def get_categoria():
    all_categorias = Producto.query.all()
    result = productos_schema.dump(all_categorias)
    return jsonify(result)

@app.route('/producto/<id>', methods=['GET'])
def get_categoriaID(id):
    categoria = Producto.query.get(id)
    return producto_schema.jsonify(categoria)

@app.route('/producto', methods=['POST'])
def add_categoria():
    data = request.get_json(force=True)

    name = data['name']
    description = data['description']
    img = data['img']
    price = data['price']

    new_categoria = Producto(name, description, img, price)

    db.session.add(new_categoria)
    db.session.commit()

    return producto_schema.jsonify(new_categoria)

@app.route('/producto/<id>', methods=['PUT'])
def update_categoria(id):
    data = request.get_json(force=True)

    categoria = Producto.query.get(id)

    name = data['name']
    description = data['description']
    img = data['img']
    price = data['price']

    categoria.name = name
    categoria.description = description
    categoria.img = img
    categoria.price = price
    
    db.session.commit()

    return producto_schema.jsonify(categoria)

@app.route('/producto/<id>', methods=['DELETE'])
def delete_categoria(id):
    categoria = Producto.query.get(id)

    db.session.delete(categoria)
    db.session.commit()

    return producto_schema.jsonify(categoria)


if __name__ == '__main__':
    with app.app_context():
        db.create_all()
        app.run(debug = True)

