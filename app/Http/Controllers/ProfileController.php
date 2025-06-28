<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
   public function uploadPhoto(Request $request)
{
    $request->validate([
        'profile_photo' => 'required|image|max:1024', // max 1MB
    ]);

    $user = Auth::user();

    // Hapus file lama kalau ada
    if ($user->profile_photo) {
        Storage::disk('public')->delete($user->profile_photo);
    }

    // Simpan file baru ke storage/app/public/profile_photos
    $path = $request->file('profile_photo')->store('profile_photos', 'public');

    logger("PATH TERSIMPAN: " . $path);

    $user->profile_photo = $path;

    if (!$user->joined_at) {
        $user->joined_at = now();
    }

    if ($user->save()) {
        logger("USER BERHASIL DISIMPAN");
    } else {
        logger("GAGAL SIMPAN USER");
    }

    return back()->with('success', 'Profile photo updated!');
}
}