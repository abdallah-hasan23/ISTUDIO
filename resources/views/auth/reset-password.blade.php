<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ISTUDIO | Reset Password</title>
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

      .reset-card {
        width: 100%;
        max-width: 420px;
        background: #fff;
        border-radius: var(--card-radius);
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
        padding: 2.5rem;
        border: none;
      }

      .login-logo {
        text-align: center;
        margin-bottom: 2rem;
      }

      .login-logo a {
        font-size: 2rem;
        font-weight: 800;
        color: var(--primary-color);
        text-decoration: none;
      }

      .form-control {
        border-radius: var(--btn-radius);
        padding: 0.75rem 1rem;
        border: 1px solid var(--secondary-bg);
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
    <div class="reset-card">
      <div class="login-logo">
        <a href="{{ url('/') }}">ISTUDIO</a>
      </div>

      <h5 class="fw-bold mb-4">Set New Password</h5>

      <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="mb-3">
          <label class="form-label small fw-bold">Email Address</label>
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
              value="{{ old('email', $request->email) }}" required readonly />
          @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label small fw-bold">New Password</label>
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" 
              placeholder="••••••••" required autofocus autocomplete="new-password" />
          @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-4">
          <label class="form-label small fw-bold">Confirm New Password</label>
          <input type="password" name="password_confirmation" class="form-control" 
              placeholder="••••••••" required autocomplete="new-password" />
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Update Password</button>
        </div>
      </form>
    </div>
  </body>
</html>
