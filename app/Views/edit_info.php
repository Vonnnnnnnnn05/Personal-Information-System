<!DOCTYPE html>
<html>
<head>
  <title>Edit Info</title>
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
      position: sticky; top:0; z-index:10;
      background: var(--card);
      border-bottom: 1px solid var(--border);
      padding: 12px 16px;
      display:flex; align-items:center; justify-content:space-between;
    }
    .brand{
      display:flex; align-items:center; gap:10px;
      font-weight:700; color:var(--fb-blue); font-size:20px;
    }
    .brand .dot{
      width:36px; height:36px; border-radius:50%;
      background:var(--fb-blue);
      display:inline-flex; align-items:center; justify-content:center;
      color:#fff; font-weight:800; font-size:18px;
    }
    .container{ max-width: 720px; margin: 18px auto; padding: 0 14px; }

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
    }
    .title{ margin:0; font-size:18px; font-weight:800; }
    .subtitle{ margin:6px 0 0 0; color:var(--muted); font-size:13px; font-weight:600; }

    form{ padding:16px; }
    .grid{
      display:grid;
      grid-template-columns: 1fr 1fr;
      gap:12px;
    }
    .field{ display:flex; flex-direction:column; gap:6px; }
    label{ font-size:13px; color:var(--muted); font-weight:700; }
    input, select{
      padding:12px 12px;
      border:1px solid var(--border);
      border-radius: 8px;
      outline:none;
      font-size:14px;
      background:#fff;
    }
    input:focus, select:focus{
      border-color: var(--fb-blue);
      box-shadow: 0 0 0 3px rgba(24,119,242,.15);
    }
    .full{ grid-column: 1 / -1; }

    .actions{
      display:flex;
      gap:10px;
      justify-content:flex-end;
      padding-top: 8px;
    }
    .btn{
      background: var(--fb-blue);
      color:#fff;
      border:none;
      padding:10px 14px;
      border-radius: 8px;
      text-decoration:none;
      font-weight:800;
      font-size:14px;
      cursor:pointer;
      display:inline-flex;
      align-items:center;
      justify-content:center;
    }
    .btn:hover{ filter:brightness(.95); }

    .btn-secondary{
      background:#e4e6eb;
      color:#050505;
      font-weight:800;
    }
    .btn-secondary:hover{ filter:brightness(.98); }

    @media (max-width: 640px){
      .grid{ grid-template-columns: 1fr; }
    }
  </style>
</head>

<body>

  <div class="topbar">
    <div class="brand">
      <span class="dot">f</span>
      <span>Edit Personal Info</span>
    </div>
    <div style="display:flex; gap:10px; align-items:center; flex-wrap:wrap;">
      <a class="btn btn-secondary" href="<?= base_url('/dashboard'); ?>">Dashboard</a>
      <a class="btn" href="<?= base_url('/logout'); ?>" style="background:#e41e3f;">Logout</a>
    </div>
  </div>

  <div class="container">
    <div class="card">
      <div class="card-header">
        <h2 class="title">Edit Info</h2>
        <p class="subtitle">Update the information and click Save</p>
      </div>

      <form action="<?= base_url('/info/update/'.$info['id']); ?>" method="post">
        <?= csrf_field(); ?>

        <div class="grid">
          <div class="field full">
            <label for="full_name">Full Name</label>
            <input type="text" name="full_name" id="full_name" required 
                   value="<?= esc($info['full_name']); ?>" placeholder="Enter full name">
          </div>

          <div class="field">
            <label for="gender">Gender</label>
            <select name="gender" id="gender">
              <option value="">-- Select --</option>
              <option value="Male" <?= ($info['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
              <option value="Female" <?= ($info['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
              <option value="Other" <?= ($info['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
            </select>
          </div>

          <div class="field">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" 
                   value="<?= esc($info['phone']); ?>" placeholder="09xxxxxxxxx">
          </div>

          <div class="field full">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" 
                   value="<?= esc($info['address']); ?>" placeholder="Enter address">
          </div>

          <div class="field full">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" 
                   value="<?= esc($info['email']); ?>" placeholder="example@email.com">
          </div>
        </div>

        <div class="actions">
          <a class="btn btn-secondary" href="<?= base_url('/dashboard'); ?>">Cancel</a>
          <button class="btn" type="submit">Save Changes</button>
        </div>
      </form>

    </div>
  </div>

</body>
</html>
