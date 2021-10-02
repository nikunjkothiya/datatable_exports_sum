<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashBoardController extends Controller
{
    public function dashboard()
    {
        try {
            return redirect()->route('admin.forms.index');
        } catch (\Exception $e) {
            throw new \App\Exceptions\CustomException($e->getMessage());
        }
    }
}
