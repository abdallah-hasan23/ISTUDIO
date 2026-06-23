<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ISTUDIO | Verify Email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    
    <style>
      :root {
        --primary-color: #0d6b68;
        --primary-hover: #0a5653;
        --bg-light: #e6f0ef;
        --secondary-bg: #dde9e9;
        --dark-color: #03201f;
        --card-radius: 20px;
        --btn-radius: 12px;
      }

      body {
        font-family: 'Outfit', sans-serif;
        background-color: var(--bg-light);
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
      }

      .verify-card {
        width: 100%;
        max-width: 450px;
        background: #fff;
        border-radius: var(--card-radius);
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
        padding: 2.5rem;
        border: none;
      }

      .btn-primary {
        background-color: var(--primary-color);
        border: none;
        border-radius: var(--btn-radius);
        padding: 0.8rem;
        font-weight: 600;
      }
    </style>
  </head>
  <body>
    <div class="verify-card">
      <div class="text-center mb-4">
        <i class="bi bi-envelope-check fs-1 text-primary" style="color: var(--primary-color) !important;"></i>
      </div>
      <h5 class="fw-bold mb-3 text-center">Verify Your Email</h5>
      <p class="text-muted small mb-4 text-center">
        Thanks for signing up! Before getting started, please verify your email address by clicking the link we just sent to you.
      </p>

      @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success border-0 small mb-4 text-center" role="alert">
          A new verification link has been sent to your email address.
        </div>
      @endif

      <div class="d-grid gap-2">
        <form method="POST" action="{{ route('verification.send') }}">
          @csrf
          <button type="submit" class="btn btn-primary w-100 mb-2">Resend Verification Email</button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="text-center">
          @csrf
          <button type="submit" class="btn btn-link text-muted small text-decoration-none">Log Out</button>
        </form>
      </div>
    </div>
  </body>
</html>
