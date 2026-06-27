<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>API Documentation - iPhone</title>

<style>
body {
    font-family: Arial;
    background: #f4f6f9;
    padding: 20px;
}

.container {
    max-width: 900px;
    margin: auto;
}

.card {
    background: white;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 10px;
}

.endpoint {
    font-weight: bold;
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
}

.get { background: green; }
.post { background: blue; }
.put { background: orange; }
.delete { background: red; }

pre {
    background: #222;
    color: #0f0;
    padding: 10px;
    border-radius: 5px;
    overflow-x: auto;
}
</style>
</head>

<body>
<div class="container">

<h1>📱 API Documentation iPhone</h1>

<!-- LOGIN -->
<div class="card">
    <span class="endpoint post">POST</span> /api/login
    <p>Login untuk mendapatkan token</p>

<pre>
{
  "email": "admin@gmail.com",
  "password": "123456"
}
</pre>
</div>

<!-- GET -->
<div class="card">
    <span class="endpoint get">GET</span> /api/iphones
    <p>Ambil semua data iPhone</p>
</div>

<!-- POST -->
<div class="card">
    <span class="endpoint post">POST</span> /api/iphones
    <p>Tambah data iPhone</p>

<pre>
{
  "nama": "iPhone 15",
  "storage": "256GB",
  "harga": 15000000,
  "stok": 10
}
</pre>
</div>

<!-- PUT -->
<div class="card">
    <span class="endpoint put">PUT</span> /api/iphones/{id}
    <p>Update data iPhone</p>
</div>

<!-- DELETE -->
<div class="card">
    <span class="endpoint delete">DELETE</span> /api/iphones/{id}
    <p>Hapus data iPhone</p>
</div>

</div>
</body>
</html>