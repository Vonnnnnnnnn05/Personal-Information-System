<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Personal Info</title>

  <!-- Bootstrap CSS (optional, you can remove if you want) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    :root{
      --fb-blue:#1877f2;
      --bg:#f0f2f5;
      --card:#ffffff;
      --text:#050505;
      --muted:#65676b;
      --border:#dddfe2;
      --shadow: 0 2px 8px rgba(0,0,0,.10);
      --radius: 12px;
      --danger:#e41e3f;
      --success:#42b72a;
    }

    *{ box-sizing:border-box; font-family: Arial, Helvetica, sans-serif; }
    body{
      margin:0;
      background: var(--bg);
      color: var(--text);
      min-height:100vh;
    }

    /* Layout */
    .fb-container{
      min-height:100vh;
      display:flex;
      align-items:center;
      justify-content:center;
      padding:20px;
    }

    .fb-wrap{
      width:100%;
      max-width: 980px;
      display:grid;
      grid-template-columns: 1.1fr .9fr;
      gap: 28px;
      align-items:center;
    }

    /* Left branding */
    .fb-brand{
      padding: 10px;
    }
    .fb-logo{
      font-size: 56px;
      font-weight: 900;
      color: var(--fb-blue);
      letter-spacing: -1px;
      margin: 0;
      line-height: 1;
    }
    .fb-tagline{
      margin-top: 14px;
      font-size: 22px;
      color: var(--text);
      font-weight: 700;
    }
    .fb-sub{
      margin-top: 10px;
      color: var(--muted);
      font-weight: 600;
      font-size: 14px;
      line-height:1.5;
    }

    /* Card */
    .fb-card{
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      overflow:hidden;
    }
    .fb-card-header{
      padding: 16px 18px;
      border-bottom: 1px solid var(--border);
      display:flex;
      align-items:center;
      gap:10px;
    }
    .dot{
      width:38px;
      height:38px;
      border-radius:50%;
      background: var(--fb-blue);
      display:flex;
      align-items:center;
      justify-content:center;
      color:#fff;
      font-weight: 900;
      font-size: 18px;
    }
    .header-text{
      display:flex;
      flex-direction:column;
      gap:2px;
    }
    .header-title{
      margin:0;
      font-size: 16px;
      font-weight: 900;
    }
    .header-subtitle{
      margin:0;
      font-size: 12px;
      color: var(--muted);
      font-weight: 700;
    }

    .fb-card-body{
      padding: 18px;
    }

    /* Alerts */
    .alertx{
      border-radius: 10px;
      padding: 12px 14px;
      font-weight: 700;
      font-size: 14px;
      margin-bottom: 12px;
      border: 1px solid transparent;
    }
    .alertx-danger{
      color: var(--danger);
      background: rgba(228, 30, 63, .08);
      border-color: rgba(228, 30, 63, .25);
    }
    .alertx-success{
      color: var(--success);
      background: rgba(66, 183, 42, .10);
      border-color: rgba(66, 183, 42, .25);
    }

    /* Inputs */
    .form-label{
      font-size: 12px;
      font-weight: 900;
      color: var(--muted);
      text-transform: uppercase;
      letter-spacing: .6px;
      margin-bottom: 6px;
    }
    .form-control{
      background: #fff;
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 12px 12px;
      font-size: 14px;
      font-weight: 700;
      color: var(--text);
      transition: .2s ease;
    }
    .form-control:focus{
      border-color: var(--fb-blue) !important;
      box-shadow: 0 0 0 3px rgba(24,119,242,.15) !important;
      outline: none;
    }
    .form-control::placeholder{
      color: #9aa0a6;
      font-weight: 600;
    }

    /* Buttons */
    .btn-fb{
      width:100%;
      border:none;
      border-radius: 10px;
      padding: 12px 14px;
      font-weight: 900;
      font-size: 15px;
      cursor:pointer;
      transition: .2s ease;
    }
    .btn-fb-primary{
      background: var(--fb-blue);
      color:#fff;
    }
    .btn-fb-primary:hover{
      filter: brightness(.95);
      transform: translateY(-1px);
    }
    .btn-fb-primary:active{
      transform: translateY(0);
    }

    .btn-fb.loading{
      position: relative;
      color: transparent !important;
      pointer-events:none;
      opacity:.9;
    }
    .btn-fb.loading::before{
      content:'';
      position:absolute;
      top:50%;
      left:50%;
      width:18px;
      height:18px;
      margin:-9px 0 0 -9px;
      border-radius:50%;
      border:2px solid rgba(255,255,255,.35);
      border-top-color:#fff;
      animation: spin .7s linear infinite;
    }
    @keyframes spin{ to{ transform: rotate(360deg); } }

    .divider{
      margin: 14px 0;
      height:1px;
      background: var(--border);
    }

    .mini{
      text-align:center;
      font-size: 12px;
      color: var(--muted);
      font-weight: 700;
      margin-top: 10px;
    }
    .mini a{
      color: var(--fb-blue);
      text-decoration:none;
      font-weight: 900;
    }
    .mini a:hover{ text-decoration: underline; }

    @media (max-width: 900px){
      .fb-wrap{
        grid-template-columns: 1fr;
        max-width: 520px;
      }
      .fb-brand{
        text-align:center;
      }
      .fb-logo{
        font-size: 48px;
      }
      .fb-tagline{
        font-size: 18px;
      }
    }
  </style>
</head>

<body>
  <div class="fb-container">
    <div class="fb-wrap">

     
      <!-- RIGHT SIDE (LOGIN CARD) -->
      <div class="fb-card">

        <div class="fb-card-header">
          <div class="dot">f</div>
          <div class="header-text">
            <p class="header-title">Login</p>
            <p class="header-subtitle">Sign in to continue</p>
          </div>
        </div>

        <div class="fb-card-body">

          <!-- Error / Success Messages -->
          <?php if(session()->getFlashdata('error')): ?>
            <div class="alertx alertx-danger"><?= session()->getFlashdata('error') ?></div>
          <?php endif; ?>

          <?php if(session()->getFlashdata('success')): ?>
            <div class="alertx alertx-success"><?= session()->getFlashdata('success') ?></div>
          <?php endif; ?>

          <?php if (isset($_GET['logout']) && $_GET['logout'] == '1'): ?>
            <div class="alertx alertx-success">Successfully logged out</div>
          <?php endif; ?>

          <?php if(isset($validation) && $validation->hasError('username')): ?>
            <div class="alertx alertx-danger"><?= $validation->getError('username') ?></div>
          <?php endif; ?>

          <?php if(isset($validation) && $validation->hasError('password')): ?>
            <div class="alertx alertx-danger"><?= $validation->getError('password') ?></div>
          <?php endif; ?>

          <form action="<?= base_url('/login') ?>" method="post" id="loginForm">

            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input
                type="text"
                name="username"
                id="username"
                class="form-control"
                required
                placeholder="Email or username"
                autocomplete="username"
              >
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input
                type="password"
                name="password"
                id="password"
                class="form-control"
                required
                placeholder="Password"
                autocomplete="current-password"
              >
            </div>

            <button type="submit" class="btn-fb btn-fb-primary" id="loginButton">
              Log In
            </button>

            <div class="divider"></div>

            <div class="mini">
              Need help? <a href="#">Contact Support</a>
            </div>

          </form>

        </div>
      </div>

    </div>
  </div>

  <script>
    document.getElementById('loginForm').addEventListener('submit', function() {
      const button = document.getElementById('loginButton');
      button.classList.add('loading');
      button.disabled = true;

      setTimeout(() => {
        button.classList.remove('loading');
        button.disabled = false;
      }, 3000);
    });
  </script>
</body>
</html>
