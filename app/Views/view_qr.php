<!DOCTYPE html>
<html>
<head>
  <title>View QR Code</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style>
    :root{
      --fb-blue:#1877f2;
      --bg:#f0f2f5;
      --card:#ffffff;
      --text:#050505;
      --muted:#65676b;
      --border:#dddfe2;
      --shadow: 0 2px 8px rgba(0,0,0,.08);
      --radius: 10px;
    }
    *{ box-sizing:border-box; font-family: Arial, Helvetica, sans-serif; }
    body{ margin:0; background:var(--bg); color:var(--text); }

    .topbar{
      position: sticky;
      top: 0;
      z-index: 10;
      background: var(--card);
      border-bottom: 1px solid var(--border);
      padding: 12px 16px;
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:10px;
      flex-wrap:wrap;
    }
    .brand{
      display:flex;
      align-items:center;
      gap:10px;
      font-weight:700;
      color:var(--fb-blue);
      font-size:20px;
    }
    .brand .dot{
      width:36px;
      height:36px;
      border-radius:50%;
      background:var(--fb-blue);
      display:inline-flex;
      align-items:center;
      justify-content:center;
      color:#fff;
      font-weight:800;
      font-size:18px;
    }
    .btn{
      background: var(--fb-blue);
      color:#fff;
      border:none;
      padding:10px 14px;
      border-radius: 8px;
      text-decoration:none;
      font-weight:700;
      font-size:14px;
      display:inline-flex;
      cursor:pointer;
      white-space:nowrap;
    }
    .btn:hover{ filter:brightness(.95); }
    .btn-secondary{
      background:#e4e6eb;
      color:#050505;
    }

    .container{
      max-width: 700px;
      margin: 30px auto;
      padding: 0 14px;
    }

    .card{
      background:var(--card);
      border:1px solid var(--border);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      overflow:hidden;
    }
    .card-header{
      padding:20px;
      border-bottom:1px solid var(--border);
      text-align:center;
    }
    .avatar{
      width:80px;
      height:80px;
      border-radius:50%;
      background:var(--fb-blue);
      display:inline-flex;
      align-items:center;
      justify-content:center;
      color:#fff;
      font-weight:800;
      font-size:36px;
      margin-bottom:15px;
    }
    .name{
      font-size:24px;
      font-weight:800;
      margin:0;
      color:var(--text);
    }

    .card-body{
      padding:20px;
    }
    .info-grid{
      display:grid;
      grid-template-columns: 1fr;
      gap:12px;
      margin-bottom:20px;
    }
    .info-item{
      padding:10px;
      background:#f7f8fa;
      border-radius:8px;
    }
    .info-label{
      font-size:12px;
      color:var(--muted);
      font-weight:700;
      margin-bottom:4px;
    }
    .info-value{
      font-size:16px;
      font-weight:600;
      color:var(--text);
    }

    .qr-section{
      text-align:center;
      padding:20px;
      background:#f7f8fa;
      border-radius:var(--radius);
      margin-top:20px;
    }
    .qr-title{
      font-size:16px;
      font-weight:800;
      margin:0 0 15px 0;
      color:var(--muted);
    }
    .qr-code{
      display:inline-block;
      padding:20px;
      background:#fff;
      border-radius:var(--radius);
      box-shadow: var(--shadow);
    }
    .qr-info{
      margin-top:15px;
      font-size:13px;
      color:var(--muted);
    }

    .actions{
      display:flex;
      gap:10px;
      justify-content:center;
      padding:20px;
      border-top:1px solid var(--border);
    }

    @media print {
      .topbar, .actions{ display:none; }
      body{ background:#fff; }
    }
  </style>
</head>

<body>

  <div class="topbar">
    <div class="brand">
      <span class="dot">f</span>
      <span>QR Code</span>
    </div>
    <div style="display:flex; gap:10px; align-items:center; flex-wrap:wrap;">
      <a class="btn btn-secondary" href="<?= base_url('/dashboard'); ?>">Dashboard</a>
      <a class="btn btn-secondary" href="<?= base_url('info/qr'); ?>">Back to All</a>
      <button class="btn" onclick="window.print()">Print QR</button>
      <a class="btn" href="<?= base_url('/logout'); ?>" style="background:#e41e3f;">Logout</a>
    </div>
  </div>

  <div class="container">
    <div class="card">
      <div class="card-header">
        <?php
          $name = $info['full_name'] ?? 'Unknown';
          $initial = strtoupper(substr($name, 0, 1));
        ?>
        <div class="avatar"><?= esc($initial); ?></div>
        <h1 class="name"><?= esc($name); ?></h1>
      </div>

      <div class="card-body">
        <div class="info-grid">
          <div class="info-item">
            <div class="info-label">ID Number</div>
            <div class="info-value"><?= esc($info['id']); ?></div>
          </div>
          <div class="info-item">
            <div class="info-label">Gender</div>
            <div class="info-value"><?= esc($info['gender']); ?></div>
          </div>
          <div class="info-item">
            <div class="info-label">Phone</div>
            <div class="info-value"><?= esc($info['phone']); ?></div>
          </div>
          <div class="info-item">
            <div class="info-label">Email</div>
            <div class="info-value"><?= esc($info['email']); ?></div>
          </div>
          <div class="info-item">
            <div class="info-label">Address</div>
            <div class="info-value"><?= esc($info['address']); ?></div>
          </div>
        </div>

        <div class="qr-section">
          <p class="qr-title">PERSONAL INFORMATION QR CODE</p>
          <?php
            // QR DATA: encode all personal information
            $qrData = "Name: " . ($info['full_name'] ?? '') . "\n";
            $qrData .= "ID: " . ($info['id'] ?? '') . "\n";
            $qrData .= "Gender: " . ($info['gender'] ?? '') . "\n";
            $qrData .= "Phone: " . ($info['phone'] ?? '') . "\n";
            $qrData .= "Email: " . ($info['email'] ?? '') . "\n";
            $qrData .= "Address: " . ($info['address'] ?? '');

            // External QR API
            $qrUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=' . urlencode($qrData);
          ?>
          <div class="qr-code">
            <img src="<?= esc($qrUrl); ?>" alt="QR Code" width="300" height="300">
          </div>
          <p class="qr-info">Scan this QR code to view all personal information</p>
        </div>
      </div>

      <div class="actions">
        <a class="btn btn-secondary" href="<?= base_url('info/edit/'.$info['id']); ?>">Edit Info</a>
        <a class="btn" href="<?= base_url('info/qr'); ?>">Back to List</a>
      </div>
    </div>
  </div>

</body>
</html>
