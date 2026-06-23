<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ISTUDIO | Forgot Password</title>
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
        max-width: 400px;
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

      <h5 class="fw-bold mb-3">Forgot Password?</h5>
      <p class="text-muted small mb-4">
        Enter your email address and we'll send you a link to reset your password.
      </p>

      @if (session('status'))
        <div class="alert alert-success border-0 small mb-4" role="alert">
          {{ session('status') }}
        </div>
      @endif

      <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-4">
          <label class="form-label small fw-bold">Email Address</label>
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
              placeholder="name@example.com" value="{{ old('email') }}" required autofocus />
          @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="d-grid gap-2">
          <button type="submit" class="btn btn-primary">Send Reset Link</button>
          <a href="{{ route('login') }}" class="btn btn-light border-0 small text-muted">Back to Login</a>
        </div>
      </form>
    </div>
  </body>
</html>
