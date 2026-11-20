from flask import Flask, jsonify
import matplotlib
matplotlib.use('Agg')  # Set backend to avoid GUI warnings
import matplotlib.pyplot as plt
import requests
from collections import Counter

app = Flask(__name__)

@app.route('/update_diagram', methods=['GET'])
def update_diagram():
    try:
        # Mengambil data motor dari server PHP
        url = 'http://localhost/tugas_mtk/fetch_motor_data.php'
        response = requests.get(url)

        if response.status_code == 200:
            motor_names = response.json()
            motor_counts = Counter(motor_names)

            labels = list(motor_counts.keys())
            sizes = [count / sum(motor_counts.values()) * 100 for count in motor_counts.values()]

            # Membuat diagram pie
            plt.figure(figsize=(8, 8))
            plt.pie(sizes, labels=labels, autopct='%1.1f%%', startangle=140)

            # Simpan gambar diagram di folder static
            plt.savefig('C:/xampp/htdocs/tugas_mtk/static/diagram_motor.png')
            plt.close()  # Tutup plot setelah disimpan

            return jsonify({'status': 'Diagram berhasil dibuat'})
        else:
            return jsonify({'status': 'Gagal mengambil data motor'}), 500

    except Exception as e:
        return jsonify({'status': f'Error: {str(e)}'}), 500

if __name__ == '__main__':
    app.run(debug=False, host='127.0.0.1', port=5000)
