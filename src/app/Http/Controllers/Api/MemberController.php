<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    //一覧を表示する
    public function index(Request $request)
    {
        $keyword = $request->input('MemberName', '');

        $members = Member::
                    select  (
                                'Member.*',
                                'MemberStatus.Caption AS MemberStatusCaption',
                                'MemberClass.Caption AS MemberClassCaption',
                            )
                    ->join  (
                                'MemberClass', 
                                'MemberClass.MemberClassID', 
                                '=', 
                                'Member.MemberClassID'
                            )
                    ->join  (
                                'MemberStatus', 
                                'MemberStatus.StatusID', 
                                '=', 
                                'Member.StatusID'
                            )
                    ->where (
                                'MemberName', 'LIKE' , "%{$keyword}%"
                            )
                    ->get()
                    ->all();
        return response()->json($members, 200);
    }

    //新規入力する際に優先順位が空でもデフォルトで数値が入るようにする
    public function maxPriority()
    {
        $sql = <<< SQL
            SELECT  MAX(Member.Priority) AS Priority
            FROM    Member
SQL;
        $obj = DB::select($sql);

        foreach ($obj[0] as $key => $val) {  

            $res = $val;
        }
        return $res;
    }

    //会員作成
    public function create(Request $request)
    {
        $priority = self::maxPriority();

        $member = new Member;
        $member->MemberName     = $request->MemberName;
        $member->MemberClassID  = $request->MemberClassID;
        $member->StatusID       = $request->StatusID;
        $member->Priority       = $priority? $priority + 10: $request->Priority;
        $member->Created        = date("Y/m/d H:i:s");
        $member->CreatedBy      = "Default"; //$_SESSION[APP_NAME][Member][MemberName]
        $member->Updated        = date("Y/m/d H:i:s");
        $member->UpdatedBy      = "Default"; //$_SESSION[APP_NAME][Member][MemberName]
        $member->save();

        $member = Member::
                    select  (
                                'Member.*',
                                'MemberStatus.Caption AS MemberStatusCaption',
                                'MemberClass.Caption AS MemberClassCaption',
                            )
                    ->join  (
                                'MemberClass', 
                                'MemberClass.MemberClassID', 
                                '=', 
                                'Member.MemberClassID'
                            )
                    ->join  (
                                'MemberStatus', 
                                'MemberStatus.StatusID', 
                                '=', 
                                'Member.StatusID'
                            )
                    ->where('MemberID', '=', $member->MemberID)
                    ->get();
        return response()->json($member, 200);
    }

    //編集するデータを一行見つける
    public function edit(Request $request)
    {
        $member = Member::find($request->id);
        return $member;
    }

   //データを更新するためのアクション
    public function update(Request $request)
    {
        $member = Member::find($request->MemberID);

        $member->MemberName     = $request->MemberName;
        $member->MemberClassID  = $request->MemberClassID;
        $member->StatusID       = $request->StatusID;
        $member->Priority       = $request->Priority;
        $member->Created        = $request->Created;
        $member->CreatedBy      = $request->CreatedBy;
        $member->Updated        = $request->Updated;
        $member->UpdatedBy      = $request->UpdatedBy;
        $member->update();
        $members = Member::all();
        return response()->json($members, 200);;

    }

    //会員削除
    public function delete(Request $request)
    {
        $member = Member::find($request->MemberID);
        $member->delete();
        return response()->json($member, 200);;
    }
}
