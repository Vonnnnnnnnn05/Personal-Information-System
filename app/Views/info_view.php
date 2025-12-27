<!DOCTYPE html>
<html>
<head>
  <title>Info List</title>
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
    body{
      margin:0;
      background:var(--bg);
      color:var(--text);
    }

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
    }
    .brand{
      display:flex;
      align-items:center;
      gap:10px;
      font-weight:700;
      color:var(--fb-blue);
      font-size:20px;
      letter-spacing:.2px;
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
      gap:8px;
      cursor:pointer;
    }
    .btn:hover{ filter:brightness(.95); }

    .container{
      max-width: 1100px;
      margin: 18px auto;
      padding: 0 14px;
    }

    /* Flash message */
    .flash{
      background:#e7f3ff;
      border:1px solid #cfe5ff;
      color:#0b5394;
      padding:12px 14px;
      border-radius: var(--radius);
      margin-bottom: 14px;
    }

    /* Card */
    .card{
      background:var(--card);
      border:1px solid var(--border);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      overflow:hidden;
    }
    .card-header{
      padding:14px 16px;
      border-bottom:1px solid var(--border);
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:10px;
    }
    .title{
      margin:0;
      font-size:18px;
      font-weight:800;
    }
    .subtitle{
      margin:0;
      color:var(--muted);
      font-size:13px;
      font-weight:600;
    }

    /* Table */
    .table-wrap{ overflow:auto; }
    table{
      width:100%;
      border-collapse:collapse;
      min-width: 820px;
    }
    thead th{
      text-align:left;
      font-size:12px;
      text-transform:uppercase;
      letter-spacing:.6px;
      color:var(--muted);
      background:#f7f8fa;
      border-bottom:1px solid var(--border);
      padding:12px 14px;
      white-space:nowrap;
    }
    tbody td{
      padding:12px 14px;
      border-bottom:1px solid var(--border);
      font-size:14px;
      white-space:nowrap;
    }
    tbody tr:hover{ background:#f7f8fa; }

    /* Action links */
    .link{
      color:var(--fb-blue);
      text-decoration:none;
      font-weight:700;
      margin-right:10px;
    }
    .link:hover{ text-decoration:underline; }
    .danger{
      color:#e41e3f;
      font-weight:800;
    }

    /* Pagination */
    .pagination{
      display:flex;
      gap:8px;
      padding: 14px 16px;
      justify-content:flex-end;
      flex-wrap:wrap;
      background: #fff;
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

    /* Empty state */
    .empty{
      padding:18px 16px;
      color:var(--muted);
      font-weight:700;
    }
  </style>
</head>

<body>

  <div class="topbar">
    <div class="brand">
      <span class="dot">f</span>
      <span>Personal Info</span>
    </div>
     <div class="actions">
      <a class="btn" href="<?= base_url('dashboard'); ?>">Dashboard</a>
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

    <div class="card">
      <div class="card-header">
        <div>
          <h2 class="title">Personal Info List</h2>
          <p class="subtitle">Manage your saved information (Facebook-style theme)</p>
        </div>
      </div>

      <div class="table-wrap">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Full Name</th>
              <th>Gender</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
          <?php if (!empty($infos)): ?>
            <?php foreach ($infos as $row): ?>
              <tr>
                <td><?= esc($row['id']); ?></td>
                <td><b><?= esc($row['full_name']); ?></b></td>
                <td><?= esc($row['gender']); ?></td>
                <td><?= esc($row['address']); ?></td>
                <td><?= esc($row['phone']); ?></td>
                <td><?= esc($row['email']); ?></td>
                <td>
                  <a class="link" href="<?= base_url('info/edit/'.$row['id']); ?>">Edit</a>
                  <a class="link danger"
                     href="<?= base_url('info/delete/'.$row['id']); ?>"
                     onclick="return confirm('Are you sure you want to delete this?')">
                    Delete
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="7" class="empty">No records found.</td>
            </tr>
          <?php endif; ?>
          </tbody>
        </table>
      </div>

      <?php if ($totalPages > 1): ?>
        <div class="pagination">
          <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a class="page <?= ($i == $currentPage) ? 'active' : '' ?>"
               href="<?= base_url('info?page='.$i); ?>">
              <?= $i; ?>
            </a>
          <?php endfor; ?>
        </div>
      <?php endif; ?>

    </div>
  </div>

</body>
</html>
