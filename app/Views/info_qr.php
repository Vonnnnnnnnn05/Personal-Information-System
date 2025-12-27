<!DOCTYPE html>
<html>
<head>
  <title>Info Cards + QR</title>
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
      --danger:#e41e3f;
    }
    *{ box-sizing:border-box; font-family: Arial, Helvetica, sans-serif; }
    body{ margin:0; background:var(--bg); color:var(--text); }

    /* Navbar */
    .topbar{
      position: sticky; top: 0; z-index: 10;
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
      display:flex; align-items:center; gap:10px;
      font-weight:700; color:var(--fb-blue); font-size:20px;
      letter-spacing:.2px; white-space:nowrap;
    }
    .brand .dot{
      width:36px; height:36px; border-radius:50%;
      background:var(--fb-blue);
      display:inline-flex; align-items:center; justify-content:center;
      color:#fff; font-weight:800; font-size:18px;
    }
    .actions{ display:flex; gap:10px; align-items:center; }
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

    .container{ max-width: 1100px; margin: 18px auto; padding: 0 14px; }

    .flash{
      background:#e7f3ff;
      border:1px solid #cfe5ff;
      color:#0b5394;
      padding:12px 14px;
      border-radius: var(--radius);
      margin-bottom: 14px;
      font-weight:700;
    }

    /* Cards grid */
    .grid{
      display:grid;
      grid-template-columns: repeat(3, 1fr);
      gap:14px;
    }
    .card{
      background:var(--card);
      border:1px solid var(--border);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      overflow:hidden;
    }
    .cover{
      height:64px;
      background: linear-gradient(135deg, #1877f2, #9bbcff);
      position:relative;
    }
    .avatar{
      width:52px; height:52px; border-radius:50%;
      background:#fff;
      border:3px solid #fff;
      position:absolute;
      left:14px; bottom:-26px;
      display:flex; align-items:center; justify-content:center;
      font-weight:900; color:var(--fb-blue);
      box-shadow: 0 2px 6px rgba(0,0,0,.15);
      font-size:18px;
    }
    .body{
      padding:36px 14px 14px;
    }
    .name{
      margin:0;
      font-size:15px;
      font-weight:900;
    }
    .meta{
      margin:6px 0 0 0;
      color:var(--muted);
      font-weight:700;
      font-size:12px;
      line-height:1.45;
      word-break:break-word;
    }
    .row{
      display:flex;
      gap:12px;
      align-items:flex-start;
      margin-top:12px;
    }
    .qr{
      flex:0 0 auto;
      width:110px;
      height:110px;
      border:1px dashed var(--border);
      border-radius: 10px;
      background:#fff;
      display:flex;
      align-items:center;
      justify-content:center;
      overflow:hidden;
    }
    .qr img{
      width:110px;
      height:110px;
      object-fit:contain;
      image-rendering: pixelated;
    }
    .actions2{
      display:flex;
      gap:8px;
      margin-top:12px;
    }
    .linkbtn{
      flex:1;
      text-align:center;
      padding:9px 10px;
      border-radius:8px;
      font-weight:900;
      font-size:12px;
      text-decoration:none;
      border:1px solid var(--border);
      background:#f7f8fa;
      color:var(--text);
    }
    .linkbtn.primary{
      background:var(--fb-blue);
      border-color:var(--fb-blue);
      color:#fff;
    }
    .linkbtn.danger{
      background:#fff;
      border-color:#ffd6de;
      color:var(--danger);
    }

    /* Pagination */
    .pagination{
      margin-top: 14px;
      display:flex;
      gap:8px;
      justify-content:flex-end;
      flex-wrap:wrap;
    }
    .page{
      border:1px solid var(--border);
      background:#fff;
      color:var(--text);
      padding:8px 12px;
      border-radius: 999px;
      text-decoration:none;
      font-weight:700;
      font-size:13px;
    }
    .page:hover{ background:#f0f2f5; }
    .page.active{
      background: var(--fb-blue);
      border-color: var(--fb-blue);
      color:#fff;
    }

    .empty{
      padding:18px 16px;
      color:var(--muted);
      font-weight:700;
      background:var(--card);
      border:1px solid var(--border);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
    }

    @media (max-width: 980px){
      .grid{ grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 620px){
      .grid{ grid-template-columns: 1fr; }
    }
  </style>
</head>

<body>

  <!-- NAVBAR (YOUR FORMAT) -->
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

    <?php if (session()->getFlashdata('message')): ?>
      <div class="flash"><?= session()->getFlashdata('message'); ?></div>
    <?php endif; ?>

    <?php if (empty($infos)): ?>
      <div class="empty">No records found.</div>
    <?php else: ?>

      <div class="grid">
        <?php foreach ($infos as $row): ?>
          <?php
            $name = $row['full_name'] ?? 'Unknown';
            $initial = strtoupper(substr($name, 0, 1));

            // QR DATA: encode all personal information
            $qrData = "Name: " . ($row['full_name'] ?? '') . "\n";
            $qrData .= "ID: " . ($row['id'] ?? '') . "\n";
            $qrData .= "Gender: " . ($row['gender'] ?? '') . "\n";
            $qrData .= "Phone: " . ($row['phone'] ?? '') . "\n";
            $qrData .= "Email: " . ($row['email'] ?? '') . "\n";
            $qrData .= "Address: " . ($row['address'] ?? '');

            // External QR API (no library needed)
            $qrUrl  = 'https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=' . urlencode($qrData);
          ?>

          <div class="card">
            <div class="cover">
              <div class="avatar"><?= esc($initial); ?></div>
            </div>

            <div class="body">
              <p class="name"><?= esc($name); ?></p>

              <p class="meta"><b>ID:</b> <?= esc($row['id']); ?></p>
              <p class="meta"><b>Gender:</b> <?= esc($row['gender']); ?></p>
              <p class="meta"><b>Phone:</b> <?= esc($row['phone']); ?></p>
              <p class="meta"><b>Email:</b> <?= esc($row['email']); ?></p>
              <p class="meta"><b>Address:</b> <?= esc($row['address']); ?></p>

              <div class="row">
                <div class="qr">
                  <img src="<?= esc($qrUrl); ?>" alt="QR Code">
                </div>
                <div style="flex:1">
                  <p class="meta" style="margin-top:0;">
                    <b>QR Content:</b><br>
                    <span style="font-weight:800; color:#111;"><?= esc($qrData); ?></span>
                  </p>
                  <p class="meta">
                    Scan the QR to open profile QR page.
                  </p>
                </div>
              </div>

              <div class="actions2">
                <a class="linkbtn primary" href="<?= base_url('info/edit/'.$row['id']); ?>">Edit</a>
                <a class="linkbtn" href="<?= base_url('info/qr/'.$row['id']); ?>">View QR</a>
                <a class="linkbtn danger"
                   href="<?= base_url('info/delete/'.$row['id']); ?>"
                   onclick="return confirm('Are you sure you want to delete this?')">
                  Delete
                </a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <?php if (($totalPages ?? 0) > 1): ?>
        <div class="pagination">
          <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a class="page <?= ($i == $currentPage) ? 'active' : '' ?>"
               href="<?= base_url('info?page='.$i); ?>">
              <?= $i; ?>
            </a>
          <?php endfor; ?>
        </div>
      <?php endif; ?>

    <?php endif; ?>

  </div>

</body>
</html>
