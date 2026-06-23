<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ISTUDIO | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!--begin::Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!--end::Fonts-->

    <!--begin::Required Plugin(Bootstrap 5)-->
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

      .login-card {
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
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--primary-color);
        text-decoration: none;
        letter-spacing: -1px;
      }

      .form-label {
        font-weight: 500;
        color: var(--dark-color);
        margin-bottom: 0.5rem;
      }

      .form-control {
        border-radius: var(--btn-radius);
        padding: 0.75rem 1rem;
        border: 1px solid var(--secondary-bg);
        background-color: #fcfdfd;
        transition: all 0.3s ease;
      }

      .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px rgba(13, 107, 104, 0.1);
        background-color: #fff;
      }

      .input-group-text {
        background-color: transparent;
        border: 1px solid var(--secondary-bg);
        border-radius: var(--btn-radius);
        color: var(--text-muted);
      }

      .btn-primary {
        background-color: var(--primary-color);
        border: none;
        border-radius: var(--btn-radius);
        padding: 0.8rem;
        font-weight: 600;
        transition: all 0.3s ease;
      }

      .btn-primary:hover {
        background-color: var(--primary-hover);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(13, 107, 104, 0.2);
      }

      .footer-links {
        text-align: center;
        margin-top: 1.5rem;
      }

      .footer-links a {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 500;
        font-size: 0.9rem;
      }

      .footer-links a:hover {
        text-decoration: underline;
      }

      .alert {
        border-radius: var(--btn-radius);
        border: none;
        font-size: 0.9rem;
      }
    </style>
  </head>
  <body>
    <div class="login-card">
      <div class="login-logo">
        <a href="{{ url('/') }}">ISTUDIO</a>
      </div>

      <h4 class="text-center fw-bold mb-4" style="color: var(--dark-color);">Welcome Back</h4>

      @if (session('status'))
        <div class="alert alert-success border-0 shadow-sm mb-4" role="alert">
          {{ session('status') }}
        </div>
      @endif

      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
          <label class="form-label">Email Address</label>
          <div class="input-group">
             <span class="input-group-text border-end-0"><i class="bi bi-envelope"></i></span>
             <input type="email" class="form-control border-start-0 @error('email') is-invalid @enderror" 
                 placeholder="name@example.com" name="email" value="{{ old('email') }}" required autofocus />
             @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
             @enderror
          </div>
        </div>

        <div class="mb-3">
          <div class="d-flex justify-content-between align-items-center">
             <label class="form-label">Password</label>
             @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="small text-decoration-none" style="color: var(--primary-color); margin-bottom: 0.5rem;">Forgot?</a>
             @endif
          </div>
          <div class="input-group">
            <span class="input-group-text border-end-0"><i class="bi bi-lock"></i></span>
            <input type="password" class="form-control border-start-0 @error('password') is-invalid @enderror" 
                placeholder="••••••••" name="password" required />
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="mb-4 d-flex justify-content-between align-items-center">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} />
            <label class="form-check-label small" for="remember"> Remember me </label>
          </div>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Sign In to Dashboard</button>
        </div>
      </form>

      <div class="footer-links">
        @if (Route::has('register'))
          <p class="mb-0 text-muted small">
            Don't have an account? <a href="{{ route('register') }}">Create Account</a>
          </p>
        @endif
      </div>
    </div>
  </body>
</html>
