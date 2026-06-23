<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ISTUDIO | Register</title>
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
        --card-radius: 24px;
        --btn-radius: 12px;
      }

      body {
        font-family: 'Outfit', sans-serif;
        background-color: var(--bg-light);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
        padding: 2rem 0;
      }

      .register-card {
        width: 100%;
        max-width: 480px;
        background: #fff;
        border-radius: var(--card-radius);
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.05);
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
        font-size: 0.95rem;
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
        color: #7a8a89;
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
        font-weight: 600;
      }

      .footer-links a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <div class="register-card">
      <div class="login-logo">
        <a href="{{ url('/') }}">ISTUDIO</a>
      </div>

      <h4 class="text-center fw-bold mb-4" style="color: var(--dark-color);">Join Our Workspace</h4>

      <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
          <label class="form-label">Full Name</label>
          <div class="input-group">
            <span class="input-group-text border-end-0"><i class="bi bi-person"></i></span>
            <input type="text" name="name" class="form-control border-start-0 @error('name') is-invalid @enderror" 
                placeholder="John Doe" value="{{ old('name') }}" required autofocus />
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Email Address</label>
          <div class="input-group">
            <span class="input-group-text border-end-0"><i class="bi bi-envelope"></i></span>
            <input type="email" name="email" class="form-control border-start-0 @error('email') is-invalid @enderror" 
                placeholder="john@example.com" value="{{ old('email') }}" required />
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Password</label>
            <div class="input-group">
                <span class="input-group-text border-end-0"><i class="bi bi-lock"></i></span>
                <input type="password" name="password" class="form-control border-start-0 @error('password') is-invalid @enderror" 
                    placeholder="••••••••" required />
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
          </div>
          <div class="col-md-6">
            <label class="form-label">Confirm</label>
            <div class="input-group">
                <span class="input-group-text border-end-0"><i class="bi bi-shield-check"></i></span>
                <input type="password" name="password_confirmation" class="form-control border-start-0" 
                    placeholder="••••••••" required />
            </div>
          </div>
        </div>

        <div class="d-grid mt-4">
          <button type="submit" class="btn btn-primary">Create Your Account</button>
        </div>
      </form>

      <div class="footer-links">
        <p class="mb-0 text-muted small">
          Already have an account? <a href="{{ route('login') }}">Sign In</a>
        </p>
      </div>
    </div>
  </body>
</html>
