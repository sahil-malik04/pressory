<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\BlockedIp;
use DataTables;


class BlockedipController extends Controller
{
    /**
     * Display All blockip Using Datatable.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.ip.index');
    }
    
    public function indexTable(){
        $data = BlockedIp::latest()->get();
        return response()->json($data);
        
    }
    /**
     * Add blockip.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addBlockedIp(Request $req)
    {
        $req->validate([
            "ip"=>"required",

        ]);
       $blockedip = new BlockedIp();
       $blockedip->ip = $req->ip;
       if($blockedip->save())
       {
           return back()->with('message',"Blocked ip inserted SuccessFully");
       }
    }
    /**
     * blockip edit page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editBlockedIp($id)
    {
        $blockedip = BlockedIp::findOrFail($id);
        return view('admin.ip.update',compact('blockedip'));
    }
     /**
     * blockip update page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateBlockedIp(Request $req)
    {
        $req->validate([
            "ip"=>"required",

        ]);
       $blockedip = BlockedIp::findOrFail($req->id);
       $blockedip->ip = $req->ip;
       if($blockedip->save())
       {
           return back()->with('message',"Blocked ip updated successFully");
       }
    }
     /**
     * blockip delete.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deleteBlockedIp($id)
    {
        $blockedip = BlockedIp::findOrFail($id);
        if($blockedip->delete())
        {
            return back()->with("message","Blocked ip deleted successfully");

        }
    }


}
