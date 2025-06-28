<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Cek apakah user yang login adalah admin
    public function ensureAdmin()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses hanya untuk admin.');
        }
    }

    // Menampilkan halaman utama admin
    public function index()
    {
        $this->ensureAdmin();

        $users = User::all();
        $courses = Course::all(); 
        return view('adminPage', compact('users', 'courses'));
    }

    // Menyimpan user baru
    public function store(Request $request)
    {
        $this->ensureAdmin();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('default123'),
            'role' => 'user'
        ]);

        return redirect()->back()->with('success', 'User berhasil ditambahkan.');
    }

    // Update user
    public function update(Request $request, $id)
    {
        $this->ensureAdmin();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->back()->with('success', 'User berhasil diupdate.');
    }

    // Hapus user
    public function destroy($id)
    {
        $this->ensureAdmin();

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus.');
    }

    // Menyimpan course baru
    public function storeCourse(Request $request)
    {
        $this->ensureAdmin();

        $request->validate([
            'title' => 'required',
            'youtube_url' => 'required|url',
            'category' => 'required|in:weight,bodyweight',
        ]);

        Course::create([
            'title' => $request->title,
            'youtube_url' => $request->youtube_url,
            'category' => $request->category,
            'instructor' => 'WeGoJim',
        ]);

        return redirect()->route('admin.course')->with('success', 'Course berhasil ditambahkan.');
    }

    // Hapus course
    public function destroyCourse($id)
    {
        $this->ensureAdmin();

        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->back()->with('success', 'Course berhasil dihapus.');
    }
}
