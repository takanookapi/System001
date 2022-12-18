<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MemberStatus;

class MemberStatusController extends Controller
{
    //
    public function index(Request $request)
    {
        // 'tests/test'にアクセスするとここの処理が実行される
        $member = MemberStatus::all();
        return response()->json($member, 200);
    }
}
