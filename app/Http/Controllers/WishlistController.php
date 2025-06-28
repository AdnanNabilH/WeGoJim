<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function toggle(Course $course)
    {
        $user = Auth::user();

        if ($user->wishlist()->where('course_id', $course->id)->exists()) {
            // Jika sudah ada di wishlist, hapus
            $user->wishlist()->detach($course->id);

            return response()->json(['status' => 'removed']);
        } else {
            // Jika belum ada, tambahkan
            $user->wishlist()->attach($course->id);

            return response()->json(['status' => 'added']);
        }
    }
}
