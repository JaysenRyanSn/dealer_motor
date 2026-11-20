from flask import Flask, render_template
import requests
import matplotlib.pyplot as plt
from collections import Counter
import os

app = Flask(__name__)

@app.route('/')
def index():
    # Ambil data dari PHP
    url = 'http://localhost/tugas_mtk/fetch_motor_data.php'
    response = requests.get(url)

    if response.status_code == 200:
        motor_names = response.json()
        
        # Hitung frekuensi setiap jenis motor
        motor_counts = Counter(motor_names)

        # Persiapkan data untuk diagram lingkaran
        labels = motor_counts.keys()
        sizes = [count / sum(motor_counts.values()) * 100 for count in motor_counts.values()]

        # Buat diagram lingkaran
        plt.figure(figsize=(8, 8))
        plt.pie(sizes, labels=labels, autopct='%1.1f%%', startangle=140)
        plt.title('Distribusi Jenis Motor')

        # Simpan gambar sebagai file
        plt.savefig('static/diagram_motor.png')
        plt.close()
        
        return render_template('index.html')

    return "Gagal mengambil data dari server.", 500

if __name__ == '__main__':
    app.run(debug=True)
