<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iPhone Store</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f5f7;
            color: #1d1d1f;
        }

        .navbar {
            background: white;
            padding: 20px 70px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        }

        .navbar h2 {
            font-size: 24px;
        }

        .navbar a {
            margin-left: 28px;
            text-decoration: none;
            color: #1d1d1f;
            font-weight: 500;
        }

        .navbar a:hover {
            color: #0071e3;
        }

        .hero {
            background: linear-gradient(135deg, #000, #1d1d1f, #3a3a3c);
            color: white;
            text-align: center;
            padding: 100px 20px;
        }

        .hero p:first-child {
            color: #9ecbff;
            margin-bottom: 12px;
        }

        .hero h1 {
            font-size: 60px;
            margin-bottom: 16px;
        }

        .hero .subtitle {
            max-width: 650px;
            margin: auto;
            color: #d2d2d7;
            font-size: 18px;
            line-height: 1.6;
        }

        .hero button {
            margin-top: 30px;
            background: #0071e3;
            color: white;
            border: none;
            padding: 14px 28px;
            border-radius: 999px;
            font-size: 16px;
            cursor: pointer;
        }

        .section {
            padding: 70px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 45px;
        }

        .section-title h2 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .section-title p {
            color: #6e6e73;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .product-card {
            background: white;
            border-radius: 28px;
            padding: 35px 25px;
            text-align: center;
            box-shadow: 0 12px 30px rgba(0,0,0,0.08);
            transition: 0.3s;
        }

        .product-card:hover {
            transform: translateY(-8px);
        }

        .product-card img {
            width: 180px;
            height: 220px;
            object-fit: contain;
            margin-bottom: 20px;
        }

        .product-card h3 {
            font-size: 22px;
            margin-bottom: 8px;
        }

        .storage {
            color: #6e6e73;
            margin-bottom: 12px;
        }

        .price {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .stock {
            color: green;
            margin-bottom: 18px;
        }

        .product-card a {
            display: inline-block;
            background: #1d1d1f;
            color: white;
            padding: 12px 24px;
            border-radius: 999px;
            text-decoration: none;
        }

        .product-card a:hover {
            background: #0071e3;
        }

        .footer {
            background: #111;
            color: #ccc;
            text-align: center;
            padding: 25px;
            margin-top: 40px;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <h2>iPhone Store</h2>

        <div>
            <a href="/">Home</a>
            <a href="#">Katalog</a>
            <a href="#">Keranjang</a>
            <a href="/login">Login</a>
        </div>
    </nav>

    <section class="hero">
        <p>New Collection</p>
        <h1>iPhone Store</h1>
        <p class="subtitle">
            Temukan iPhone favoritmu dengan desain premium, performa cepat,
            dan harga terbaik untuk kebutuhan harianmu.
        </p>
        <button>Belanja Sekarang</button>
    </section>

    <section class="section">
        <div class="section-title">
            <h2>Produk Terbaru</h2>
            <p>Pilih iPhone sesuai kebutuhanmu</p>
        </div>

        <div class="product-grid">
            @foreach($iphones as $iphone)
                <div class="product-card">
                    <img src="https://fdn2.gsmarena.com/vv/pics/apple/apple-iphone-15-pro-1.jpg" alt="{{ $iphone->nama }}">

                    <h3>{{ $iphone->nama }}</h3>
                    <p class="storage">{{ $iphone->storage }}</p>
                    <p class="price">Rp {{ number_format($iphone->harga, 0, ',', '.') }}</p>
                    <p class="stock">Stok: {{ $iphone->stok }}</p>

                    <a href="#">Lihat Detail</a>
                </div>
            @endforeach
        </div>
    </section>

    <footer class="footer">
        © 2026 iPhone Store. All Rights Reserved.
    </footer>

</body>
</html>