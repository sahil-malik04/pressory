<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Faq;
use App\Http\Requests\FaqRequest;
class FaqController extends Controller
{
     /**
     * View faq page in cms.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('admin.cms.faq.index');
    }
     /**
     * listing faq  in cms.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function faqTable()
    {
        $data = Faq::all();
        return response()->json($data);
    }
     /**
     * create or add new faq  in cms.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addFaq(FaqRequest $req)
    {
        $data = new Faq();
        $data->fquestion = $req->fquestion;
        $data->fanswer = $req->fanswer;
        $data->status = $this->setStatus($req->status);
        if($data->save())
        {
            return back()->with('message','Faq inserted successfully');
        }
    }
     /**
     * edit faq page in cms.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editFaq($id)
    {
        $faq = Faq::find($id);
        return view('admin.cms.faq.edit',['faq'=>$faq]);
    }

     /**
     * update faq  in cms.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateFaq(FaqRequest $req)
    {
        $data = Faq::find($req->id);
        $data->fquestion = $req->fquestion;
        $data->fanswer = $req->fanswer;
        $data->status = $this->setStatus($req->status);
        if($data->save())
        {
            return back()->with('message','Faq updated successfully');
        }else{
            return back()->with('failed','Faq updated Failed');
            
        }
    }
     /**
     * remove faq  in cms.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function removeFaq($id)
    {
        $data = Faq::find($id);
        if($data->delete())
        {
            return back()->with('message','Faq deleted successfully');
        }
    }
     /**
     * set Status .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function setStatus($data)
    {
        if($data == 'on'){
            return 1;
        }
        if($data != 'on'){
            return 0;
        }
    }
}
