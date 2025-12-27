<!DOCTYPE html>
<html>
<head>
  <title>Analytics</title>
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

    /* Topbar */
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
      letter-spacing:.2px;
      white-space:nowrap;
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
    .actions{
      display:flex;
      gap:10px;
      align-items:center;
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
      align-items:center;
      cursor:pointer;
      white-space:nowrap;
    }
    .btn:hover{ filter:brightness(.95); }

    .container{
      max-width: 1100px;
      margin: 18px auto;
      padding: 0 14px;
    }

    /* Cards */
    .card{
      background:var(--card);
      border:1px solid var(--border);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      overflow:hidden;
      margin-bottom:16px;
    }
    .card-header{
      padding:14px 16px;
      border-bottom:1px solid var(--border);
    }
    .title{ margin:0; font-size:18px; font-weight:800; }
    .subtitle{ margin:6px 0 0 0; color:var(--muted); font-size:13px; font-weight:600; }

    /* Stats Grid */
    .stats-grid{
      display:grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap:14px;
      margin-bottom:20px;
    }
    .stat-card{
      background:var(--card);
      border:1px solid var(--border);
      border-radius: var(--radius);
      padding:20px;
      box-shadow: var(--shadow);
      text-align:center;
    }
    .stat-value{
      font-size:32px;
      font-weight:800;
      color:var(--fb-blue);
      margin:0;
    }
    .stat-label{
      font-size:14px;
      color:var(--muted);
      font-weight:700;
      margin:8px 0 0 0;
    }

    /* Chart */
    .chart-container{
      padding:20px;
    }
    .bar-chart{
      display:flex;
      align-items:flex-end;
      justify-content:space-around;
      height:300px;
      gap:20px;
      padding:20px 0;
    }
    .bar{
      flex:1;
      background:var(--fb-blue);
      border-radius:8px 8px 0 0;
      position:relative;
      display:flex;
      flex-direction:column;
      justify-content:flex-end;
      align-items:center;
      transition: all 0.3s;
    }
    .bar:hover{ filter:brightness(.9); }
    .bar-value{
      position:absolute;
      top:-30px;
      font-size:18px;
      font-weight:800;
      color:var(--text);
    }
    .bar-label{
      margin-top:10px;
      font-size:14px;
      font-weight:700;
      color:var(--muted);
      text-align:center;
    }
    .male-bar{ background:#1877f2; }
    .female-bar{ background:#e91e63; }
    .other-bar{ background:#9c27b0; }
  </style>
</head>

<body>

  <!-- NAVBAR -->
  <div class="topbar">
    <div class="brand">
      <span class="dot">f</span>
      <span>Personal Info</span>
    </div>

    <div class="actions">
      <a class="btn" href="<?= base_url('/dashboard'); ?>">Dashboard</a>
    </div>

    <div class="actions">
      <a class="btn" href="<?= base_url('info/analytics'); ?>">Analytics</a>
    </div>

    <div class="actions">
      <a class="btn" href="<?= base_url('info/qr'); ?>">Profile QRCode</a>
    </div>

    <div class="actions">
      <a class="btn" href="<?= base_url('info/add'); ?>">+ Add Info</a>
    </div>

    <div class="actions">
      <a class="btn" href="<?= base_url('/logout'); ?>" style="background:#e41e3f;">Logout</a>
    </div>
  </div>

  <div class="container">

    <!-- Stats Overview -->
    <div class="stats-grid">
      <div class="stat-card">
        <p class="stat-value"><?= $totalInfos ?? 0; ?></p>
        <p class="stat-label">Total Records</p>
      </div>
      <div class="stat-card">
        <p class="stat-value"><?= $maleCount ?? 0; ?></p>
        <p class="stat-label">Male</p>
      </div>
      <div class="stat-card">
        <p class="stat-value"><?= $femaleCount ?? 0; ?></p>
        <p class="stat-label">Female</p>
      </div>
      <div class="stat-card">
        <p class="stat-value"><?= $otherCount ?? 0; ?></p>
        <p class="stat-label">Other</p>
      </div>
    </div>

    <!-- Gender Distribution Chart -->
    <div class="card">
      <div class="card-header">
        <h2 class="title">Gender Distribution</h2>
        <p class="subtitle">Visual breakdown of records by gender</p>
      </div>
      <div class="chart-container">
        <div class="bar-chart">
          <?php
            $maxCount = max($maleCount ?? 0, $femaleCount ?? 0, $otherCount ?? 0);
            $maxCount = $maxCount > 0 ? $maxCount : 1;
            
            $maleHeight = (($maleCount ?? 0) / $maxCount) * 100;
            $femaleHeight = (($femaleCount ?? 0) / $maxCount) * 100;
            $otherHeight = (($otherCount ?? 0) / $maxCount) * 100;
          ?>
          <div style="flex:1; display:flex; flex-direction:column; align-items:center;">
            <div class="bar male-bar" style="height:<?= $maleHeight; ?>%; width:80%;">
              <span class="bar-value"><?= $maleCount ?? 0; ?></span>
            </div>
            <p class="bar-label">Male</p>
          </div>
          <div style="flex:1; display:flex; flex-direction:column; align-items:center;">
            <div class="bar female-bar" style="height:<?= $femaleHeight; ?>%; width:80%;">
              <span class="bar-value"><?= $femaleCount ?? 0; ?></span>
            </div>
            <p class="bar-label">Female</p>
          </div>
          <div style="flex:1; display:flex; flex-direction:column; align-items:center;">
            <div class="bar other-bar" style="height:<?= $otherHeight; ?>%; width:80%;">
              <span class="bar-value"><?= $otherCount ?? 0; ?></span>
            </div>
            <p class="bar-label">Other</p>
          </div>
        </div>
      </div>
    </div>

  </div>

</body>
</html>