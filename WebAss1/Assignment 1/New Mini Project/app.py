from flask import Flask, render_template, request, redirect, jsonify, flash
from flask_sqlalchemy import SQLAlchemy

# Initialize Flask App
app = Flask(__name__)
app.secret_key = 'your_secret_key'

# Configure MySQL Database
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+pymysql://root:SSmrh@25@localhost/wine_project'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

# Initialize Database
db = SQLAlchemy(app)

# Define Wine Model
class Wine(db.Model):
    __tablename__ = 'wine_data'
    id = db.Column(db.Integer, primary_key=True)
    fixed_acidity = db.Column(db.Float, nullable=False)
    volatile_acidity = db.Column(db.Float, nullable=False)
    citric_acid = db.Column(db.Float, nullable=False)
    residual_sugar = db.Column(db.Float, nullable=False)
    chlorides = db.Column(db.Float, nullable=False)
    quality_score = db.Column(db.Integer, nullable=False)

# Create tables if they don't exist
with app.app_context():
    db.create_all()

# Routes
@app.route('/')
def index():
    wines = Wine.query.all()
    return render_template('index.html', content=wines)

@app.route('/add_wine', methods=['GET', 'POST'])
def add_wine():
    if request.method == 'POST':
        try:
            wine = Wine(
                fixed_acidity=request.form['fixed_acidity'],
                volatile_acidity=request.form['volatile_acidity'],
                citric_acid=request.form['citric_acid'],
                residual_sugar=request.form['residual_sugar'],
                chlorides=request.form['chlorides'],
                quality_score=request.form['quality_score'],
            )
            db.session.add(wine)
            db.session.commit()
            flash('Wine added successfully!', 'success')
            return redirect('/')
        except Exception as e:
            db.session.rollback()
            flash(f'Error: {e}', 'error')
    return render_template('add_wine.html')

@app.route('/delete/<int:id>', methods=['DELETE'])
def delete(id):
    wine = Wine.query.get(id)
    if not wine:
        return jsonify({'message': 'Wine not found'}), 404
    try:
        db.session.delete(wine)
        db.session.commit()
        return jsonify({'message': 'Wine deleted successfully'}), 200
    except Exception as e:
        db.session.rollback()
        return jsonify({'message': f'Error: {e}'}), 500

@app.route('/update/<int:id>', methods=['GET', 'POST'])
def update(id):
    wine = Wine.query.get_or_404(id)
    if request.method == 'POST':
        try:
            wine.fixed_acidity = request.form['fixed_acidity']
            wine.volatile_acidity = request.form['volatile_acidity']
            wine.citric_acid = request.form['citric_acid']
            wine.residual_sugar = request.form['residual_sugar']
            wine.chlorides = request.form['chlorides']
            wine.quality_score = request.form['quality_score']
            db.session.commit()
            flash('Wine updated successfully!', 'success')
            return redirect('/')
        except Exception as e:
            db.session.rollback()
            flash(f'Error: {e}', 'error')
    return render_template('update.html', wine=wine)

@app.route('/contact', methods=['GET', 'POST'])
def contact():
    if request.method == 'POST':
        name = request.form['name']
        email = request.form['email']
        message = request.form['message']
        flash('Your message has been sent successfully!', 'success')
    return render_template('contact.html')

# Run Flask App
if __name__ == '__main__':
    app.run(debug=True)
