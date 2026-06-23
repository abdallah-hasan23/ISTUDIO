<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ISTUDIO | Confirm Password</title>
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

      .confirm-card {
        width: 100%;
        max-width: 400px;
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
    <div class="confirm-card">
      <h5 class="fw-bold mb-3 text-center">Secure Area</h5>
      <p class="text-muted small mb-4 text-center">
        This is a secure area. Please confirm your password to continue.
      </p>

      <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="mb-4">
          <label class="form-label small fw-bold">Password</label>
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" 
              placeholder="••••••••" required autocomplete="current-password" />
          @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Confirm Password</button>
        </div>
      </form>
    </div>
  </body>
</html>
