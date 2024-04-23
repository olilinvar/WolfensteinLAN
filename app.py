from flask import Flask, render_template, request, redirect, url_for
import csv

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/register', methods=['POST'])
def register():
    if request.method == 'POST':
        userdata = request.form
        with open('registrations.csv', 'a', newline='') as csvfile:
            writer = csv.writer(csvfile)
            writer.writerow([userdata['usernfrom flask import Flask, render_template, request, redirect, url_for
import csv

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/register', methods=['GET', 'POST'])
def register():
    if request.method == 'POST':
        userdata = request.form
        with open('registrations.csv', 'a', newline='') as csvfile:
            fieldnames = ['username', 'email']
            writer = csv.DictWriter(csvfile, fieldnames=fieldnames)
            writer.writerow({'username': userdata['username'], 'email': userdata['email']})
        return redirect(url_for('confirmation'))
    return render_template('signup.html')

@app.route('/confirmation')
def confirmation():
    return render_template('confirmation.html')

if __name__ == '__main__':
    app.run(debug=True)
ame'], userdata['email']])
        return redirect(url_for('index'))

if __name__ == '__main__':
    app.run(debug=True)

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>LAN Event Registration</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Register for Wolfenstein LAN Party</h1>
    <form action="{{ url_for('register') }}" method="post">
      <div class
