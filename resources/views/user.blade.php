<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard User</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
            min-height: 100vh;
        }

        .navbar {
            background: white;
            padding: 20px 25px;
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .navbar h3 {
            color: #333;
            font-size: 22px;
            font-weight: 600;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 12px 48px rgba(0, 0, 0, 0.15);
        }

        .container h3 {
            color: #333;
            margin-bottom: 25px;
            font-size: 24px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .table-wrapper {
            overflow-x: auto;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead tr {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        th {
            color: white;
            padding: 16px 15px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tbody tr {
            border-bottom: 1px solid #e8ecf1;
            transition: all 0.3s ease;
        }

        tbody tr:hover {
            background: linear-gradient(90deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
            box-shadow: inset 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        tbody tr:last-child {
            border-bottom: none;
        }

        td {
            padding: 16px 15px;
            color: #555;
            font-size: 14px;
        }

        td:first-child {
            font-weight: 600;
            color: #667eea;
        }

        .nama-cell {
            font-weight: 500;
            color: #333;
        }

        .storage-cell {
            background: #f0f4ff;
            color: #667eea;
            font-weight: 500;
            padding: 8px 12px;
            border-radius: 6px;
            display: inline-block;
        }

        .harga-cell {
            font-weight: 600;
            color: #26a65b;
            font-size: 15px;
        }

        .stok-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 13px;
        }

        .stok-tinggi {
            background: #d4edda;
            color: #155724;
        }

        .stok-sedang {
            background: #fff3cd;
            color: #856404;
        }

        .stok-rendah {
            background: #f8d7da;
            color: #721c24;
        }

        .alert {
            margin-bottom: 20px;
            padding: 16px;
            background: #f8d7da;
            color: #721c24;
            border-left: 4px solid #f5c6cb;
            border-radius: 6px;
            font-weight: 500;
        }

        .empty {
            text-align: center;
            padding: 40px 20px;
            color: #999;
            font-size: 16px;
        }

        button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(102, 126, 234, 0.5);
        }

        button:active {
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            th, td {
                padding: 12px 8px;
                font-size: 13px;
            }

            th {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>

<div class="navbar">
    <h3>👤 Dashboard User</h3>
    <button onclick="logout()">Logout</button>
</div>

<div id="alert"></div>

<div class="container">
    <h3><i class="fas fa-mobile-alt"></i> Daftar iPhone</h3>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th><i class="fas fa-hashtag"></i> ID</th>
                    <th><i class="fas fa-tag"></i> Nama</th>
                    <th><i class="fas fa-database"></i> Storage</th>
                    <th><i class="fas fa-tag"></i> Harga</th>
                    <th><i class="fas fa-boxes"></i> Stok</th>
                </tr>
            </thead>
            <tbody id="data"></tbody>
        </table>
    </div>
</div>

<script>
const api = "http://127.0.0.1:8000/api/iphones";

// ================= AUTH =================
const token = localStorage.getItem("token");
const role = localStorage.getItem("role");

if (!token || role !== "user") {
    window.location.href = "/login";
}

// ================= ALERT =================
function showAlert(message) {
    document.getElementById("alert").innerHTML =
        `<div class="alert">${message}</div>`;
}

// ================= LOAD DATA =================
function loadData() {
    fetch(api, {
        headers: {
            "Authorization": "Bearer " + token,
            "Accept": "application/json"
        }
    })
    .then(res => {
        if (res.status === 401) logout();
        return res.json();
    })
    .then(data => {
        let html = "";

        if (!data || data.length === 0) {
            html = `<tr><td colspan="5" class="empty"><i class="fas fa-inbox"></i> Tidak ada data</td></tr>`;
        } else {
            data.forEach(item => {
                // Tentukan badge status stok
                let stokBadge = "stok-tinggi";
                let stokIcon = "fa-check-circle";
                
                if (item.stok <= 2) {
                    stokBadge = "stok-rendah";
                    stokIcon = "fa-exclamation-circle";
                } else if (item.stok <= 5) {
                    stokBadge = "stok-sedang";
                    stokIcon = "fa-alert-circle";
                }

                // Format harga dengan titik ribuan
                const hargaFormat = new Intl.NumberFormat('id-ID').format(item.harga);

                html += `
                <tr>
                    <td>#${item.id}</td>
                    <td class="nama-cell">${item.nama}</td>
                    <td><span class="storage-cell">${item.storage}</span></td>
                    <td class="harga-cell">Rp ${hargaFormat}</td>
                    <td><span class="stok-badge ${stokBadge}"><i class="fas ${stokIcon}"></i> ${item.stok} pcs</span></td>
                </tr>`;
            });
        }

        document.getElementById("data").innerHTML = html;
    })
    .catch(() => showAlert("Gagal memuat data"));
}

// ================= LOGOUT =================
function logout() {
    localStorage.removeItem("token");
    localStorage.removeItem("role");
    window.location.href = "/login";
}

// ================= INIT =================
document.addEventListener("DOMContentLoaded", loadData);
</script>

</body>
</html>