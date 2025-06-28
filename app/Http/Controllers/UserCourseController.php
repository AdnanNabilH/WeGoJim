<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserCourseController extends Controller
{
    // Untuk halaman /user/course
    public function courseList()
    {
        $category = request()->get('category', 'weight');
        $courses = Course::where('category', $category)->get();

        $user = Auth::user();
        $savedCourseIds = $user ? $user->myLearning->pluck('id')->toArray() : [];

        return view('user_course', compact('courses', 'category', 'savedCourseIds'));
    }



    // Untuk halaman /my-learning (masih kosong)
   public function myLearning()
{
    $user = auth()->user();
    $courses = $user->myLearning; // Course yang disimpan user

    return view('mylearning', compact('courses')); // PASTIKAN view-nya "mylearning", bukan "user_course"
}

public function saveCourse($id)
{
    $user = auth()->user();
    $course = Course::findOrFail($id);

    // Cek apakah course sudah disimpan
    if ($user->myLearning()->where('course_id', $id)->exists()) {
        // Jika sudah disimpan, hapus (toggle)
        $user->myLearning()->detach($id);
    } else {
        // Jika belum, simpan
        $user->myLearning()->attach($id);
    }

    return back(); // Kembali ke halaman sebelumnya
}

public function unsaveCourse($id)
{
    $user = Auth::user();
    $user->myLearning()->detach($id); // hapus relasi course dari user

    return redirect()->back()->with('success', 'Course berhasil dihapus dari My Learning.');
}

}
