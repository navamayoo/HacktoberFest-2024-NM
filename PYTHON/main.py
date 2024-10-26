from flask import Flask,render_template
import requests
app=Flask(__name__)

@app.route('/')
def index():
    url="https://newsapi.org/v2/top-headlines?country=in&apiKey=a39a403bda5a4f2ea2f60656d151c669"
    r=requests.get(url).json()

    cases={
        'articles':r['articles']
        }
    return render_template('index.html',cases=cases)


if __name__ == "main":
    app.run(debug=True)