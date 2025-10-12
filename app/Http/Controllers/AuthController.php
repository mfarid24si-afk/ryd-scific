<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        return view('pages.login');
    }

    // Handle logika form login
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('success', 'Selamat Datang Admin!');
        }

        return back()->with('error', 'Username atau Password salah!');
    }

    // Handle logika form register
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:300',
            'tanggal_lahir' => 'required|date',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:8|regex:/[A-Z]/|regex:/[0-9]/',
            'confirm_password' => 'required|same:password'
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'alamat.max' => 'Alamat maksimal 300 karakter',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
            'tanggal_lahir.date' => 'Tanggal lahir harus bertipe Date',
            'username.required' => 'Username tidak boleh kosong',
            'username.unique' => 'Username sudah digunakan',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 8 karakter',
            'password.regex' => 'Password harus mengandung huruf kapital dan angka',
            'confirm_password.required' => 'Konfirmasi password tidak boleh kosong',
            'confirm_password.same' => 'Password tidak sama'
        ]);

        // Simpan user baru
        User::create([
            'name' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('auth.login')->with('success', 'Registrasi berhasil! Silakan Login');
    }

     /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('alamat', 300);
            $table->date('tanggal_lahir');
            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }

     use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'alamat',
        'tanggal_lahir',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'tanggal_lahir' => 'date',
            'password' => 'hashed',
        ];
    }

    /**
     * Override username untuk autentikasi
     */
    public function getAuthIdentifierName()
    {
        return 'username';
    }
}