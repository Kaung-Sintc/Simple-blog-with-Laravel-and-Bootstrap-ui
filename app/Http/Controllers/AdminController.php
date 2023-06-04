<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        return view('admin.index', [
            'articles' => Article::latest()->paginate(5),
        ]);
    }

    public function user()
    {
        return view('admin.users', [
            'users' => User::paginate(5),
        ]);
    }
}
