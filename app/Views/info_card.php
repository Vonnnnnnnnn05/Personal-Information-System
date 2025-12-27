<!DOCTYPE html>
<html>
<head>
    <title>Info Cards</title>
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

        .container{ max-width:1200px; margin:20px auto; padding:0 14px; }
        h2{ font-size:24px; font-weight:800; margin-bottom:20px; }

        .grid{
          display:grid;
          grid-template-columns:repeat(auto-fill, minmax(300px, 1fr));
          gap:16px;
        }
        .card {
            background:var(--card);
            border: 1px solid var(--border);
            padding: 20px;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }
        .card h3 {
            margin: 0 0 15px 0;
            color:var(--fb-blue);
            font-size:18px;
        }
        .card p{
          margin:8px 0;
          font-size:14px;
          color:var(--text);
        }
        .card-actions{
          margin-top:15px;
          padding-top:15px;
          border-top:1px solid var(--border);
          display:flex;
          gap:10px;
        }
        .link{
          color:var(--fb-blue);
          text-decoration:none;
          font-weight:700;
          font-size:14px;
        }
        .link:hover{ text-decoration:underline; }
        .danger{ color:#e41e3f; }
    </style>
</head>
<body>

<div class="topbar">
  <div class="brand">
    <span class="dot">f</span>
    <span>Personal Info Cards</span>
  </div>
  <div style="display:flex; gap:10px; align-items:center; flex-wrap:wrap;">
    <a class="btn" href="<?= base_url('/dashboard'); ?>">Dashboard</a>
    <a class="btn" href="<?= base_url('info/analytics'); ?>">Analytics</a>
    <a class="btn" href="<?= base_url('info/qr'); ?>">Profile QRCode</a>
    <a class="btn" href="<?= base_url('info/add'); ?>">+ Add Info</a>
    <a class="btn" href="<?= base_url('/logout'); ?>" style="background:#e41e3f;">Logout</a>
  </div>
</div>

<div class="container">
  <h2>Personal Info Cards</h2>

  <?php if (!empty($infos)): ?>
    <div class="grid">
      <?php foreach ($infos as $row): ?>
          <div class="card">
              <h3><?= esc($row['full_name']); ?></h3>
              <p><b>ID:</b> <?= esc($row['id']); ?></p>
              <p><b>Gender:</b> <?= esc($row['gender']); ?></p>
              <p><b>Address:</b> <?= esc($row['address']); ?></p>
              <p><b>Phone:</b> <?= esc($row['phone']); ?></p>
              <p><b>Email:</b> <?= esc($row['email']); ?></p>

              <div class="card-actions">
                <a class="link" href="<?= base_url('info/edit/'.$row['id']); ?>">Edit</a>
                <a class="link danger" href="<?= base_url('info/delete/'.$row['id']); ?>"
                   onclick="return confirm('Are you sure you want to delete this?')">
                   Delete
                </a>
              </div>
          </div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
      <p>No records found.</p>
  <?php endif; ?>
</div>

</body>
</html>
