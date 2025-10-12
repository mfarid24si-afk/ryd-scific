<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
            max-width: 450px;
            width: 100%;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 30px;
            text-align: center;
            color: white;
        }

        .logo {
            width: 70px;
            height: 70px;
            background: white;
            border-radius: 50%;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            font-weight: bold;
            color: #667eea;
        }

        .header h1 {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .header p {
            font-size: 13px;
            opacity: 0.9;
        }

        .form-container {
            padding: 35px 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #333;
            font-size: 13px;
        }

        .form-group input {
            width: 100%;
            padding: 11px 14px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s;
            font-family: 'Poppins', sans-serif;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102,126,234,0.1);
        }

        .form-group.error input {
            border-color: #e74c3c;
        }

        .error-message {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
            display: block;
        }

        .btn-register {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
            font-family: 'Poppins', sans-serif;
            margin-top: 10px;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102,126,234,0.3);
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: #666;
        }

        .login-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .alert {
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert-error {
            background: #fee;
            color: #c33;
            border: 1px solid #fcc;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">A</div>
            <h1>Registrasi Admin</h1>
            <p>Buat akun admin baru</p>
        </div>

        <div class="form-container">
            @if($errors->any())
                <div class="alert alert-error">
                    <strong>Terjadi kesalahan:</strong>
                    <ul style="margin: 8px 0 0 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('auth.register') }}" method="POST">
                @csrf
                
                <div class="form-group @error('nama') error @enderror">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap" required>
                    @error('nama')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('alamat') error @enderror">
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}" placeholder="Masukkan alamat (maks. 300 karakter)" required>
                    @error('alamat')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('tanggal_lahir') error @enderror">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                    @error('tanggal_lahir')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('username') error @enderror">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Masukkan username" required>
                    @error('username')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('password') error @enderror">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Min. 8 karakter, huruf kapital & angka" required>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('confirm_password') error @enderror">
                    <label for="confirm_password">Konfirmasi Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Ulangi password" required>
                    @error('confirm_password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn-register">Daftar</button>
            </form>

            <div class="login-link">
                Sudah punya akun? <a href="{{ route('auth.login') }}">Login di sini</a>
            </div>
        </div>
    </div>
</body>
</html>