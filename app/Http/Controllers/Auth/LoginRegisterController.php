<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Buku; // Pastikan model Buku diimport
use Illuminate\Support\Facades\Storage; // Import class Storage
use App\Mail\UserRegisteredMail;
use Illuminate\Support\Facades\Mail;

class LoginRegisterController extends Controller
{
    // Instantiate a new LoginRegisterController instance
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'dashboard']);
    }

    // Display the registration form
    public function register()
    {
        return view('auth.register');
    }

    // Store a new user
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed',
            'photo' => 'image|nullable|max:1999', // Tambahkan validasi untuk foto
        ]);

        if ($request->hasFile('photo')) {
            // Ambil nama file
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('photo')->storeAs('public/photos', $filenameSimpan);
        } else {
            $path = 'public/photos/default.jpg';
        }

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => $path
        ]);
        // Kirim email ke pengguna yang baru terdaftar
        $userData = [
            'name' => $user->name,
            'email' => $user->email,
        ];
        Mail::to($user->email)->send(new UserRegisteredMail($userData));

        // Authenticate the user
        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);


        // Redirect dengan pesan sukses
        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan cek email Anda.');
    }


    // Display the login form
    public function login()
    {
        return view('auth.login');
    }

    // Authenticate the user
    public function authenticate(Request $request)
    {
        // Validate the incoming credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')
                ->withSuccess('You have successfully logged in!');
        }

        // Redirect back with an error if authentication fails
        return back()->withErrors([
            'email' => 'Your provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Display the dashboard to authenticated users
    public function dashboard()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Ambil data buku dari database
            $data_buku = Buku::all();
            $total_buku = $data_buku->count();
            $total_harga = $data_buku->sum('harga');

            // Kirim data buku dan total ke view dashboard
            return view('auth.dashboard', compact('data_buku', 'total_buku', 'total_harga'));
        }

        // Redirect to the login page if not authenticated
        return redirect()->route('login')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ]);
    }


    // Logout the user from the application
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');
    }
}