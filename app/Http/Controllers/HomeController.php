<?php

namespace App\Http\Controllers;
use Alert;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Calon;
use App\Models\Voting;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index()
    {
        $calon = Calon::get();

        if (Auth::id()) {
            $role = Auth::user()->role;

            if ($role == "user") {
                $username = Auth::user()->name;
                return view('home', ['calon' => $calon, 'username' => $username]);
            } else if ($role == 'admin') {
                return view('admin.dashboard');
            } else {
                return redirect()->back();
            }
        }
    }

    public function post()
    {
        return view('admin.post');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    public function store(Request $request)
    {
        // Ambil ID calon yang dipilih dari permintaan
        $calonId = $request->input('calons_id');

        $userId = Auth::id();
        // Periksa apakah pengguna telah mengirim post sebelumnya
        $existingVote = Voting::where('users_id', $userId)->first();

        if ($existingVote) {
            // Jika pengguna sudah mengirim post, berikan respons sesuai kebutuhan Anda
            Alert::success('Hore!', 'Post Created Successfully');
            return redirect()->back()->with('error', 'Anda telah mengirim post sebelumnya.');
        }
        Alert::success('Hore!', 'Post Created Successfully');
        // Simpan informasi calon yang dipilih ke dalam tabel database baru
        $voting = new Voting();
        $voting->calons_id = $calonId;
        $voting->users_id = $userId;
        $voting->save();

        // Redirect atau berikan respons sesuai kebutuhan Anda
        return redirect()->back()->with('success', 'Calon berhasil dipilih!');
    }

}