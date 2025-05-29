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
    category_id = db.Column(db.Integer, nullable=False)

    def __init__(self, name, description, img, price, category_id):
        self.name = name
        self.description = description
        self.img = img
        self.price = price
        self.category_id = category_id

class ProductoSchema(ma.SQLAlchemyAutoSchema):
    class Meta:
        model = Producto
        load_instance = True

producto_schema = ProductoSchema()
productos_schema = ProductoSchema(many=True)

@app.route('/', methods=['GET'])
def index():
    return jsonify({'message': 'Welcome to the Flask API!'})

@app.route('/productos', methods=['GET'])
def get_producto():
    all_productos = Producto.query.all()
    result = productos_schema.dump(all_productos)
    return jsonify(result)

@app.route('/producto/<id>', methods=['GET'])
def get_productoID(id):
    producto = Producto.query.get(id)
    return producto_schema.jsonify(producto)

@app.route('/producto', methods=['POST'])
def add_producto():
    data = request.get_json(force=True)

    name = data['name']
    description = data['description']
    img = data['img']
    price = data['price']
    category_id = data['category_id']

    new_producto = Producto(name, description, img, price, category_id)

    db.session.add(new_producto)
    db.session.commit()

    return producto_schema.jsonify(new_producto)

@app.route('/producto/<id>', methods=['PUT'])
def update_producto(id):
    data = request.get_json(force=True)

    producto = Producto.query.get(id)

    name = data['name']
    description = data['description']
    img = data['img']
    price = data['price']
    category_id = data['category_id']

    producto.name = name
    producto.description = description
    producto.img = img
    producto.price = price
    producto.category_id = category_id
    
    db.session.commit()

    return producto_schema.jsonify(producto)

@app.route('/producto/<id>', methods=['DELETE'])
def delete_producto(id):
    producto = Producto.query.get(id)

    db.session.delete(producto)
    db.session.commit()

    return producto_schema.jsonify(producto)


if __name__ == '__main__':
    with app.app_context():
        db.create_all()
        app.run(debug = True)

