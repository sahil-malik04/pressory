<?php
namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\CmsPage;
use App\Models\Admin\CreateMenu;
use App\Http\Requests\CmsPageRequest;
use Illuminate\Support\Str;

class CmsPageController extends Controller
{
    /**
     * Cms page view.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.cms.cms-page.index');
    }
    /**
     * All Cms listing.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cmsPageList()
    {
        $page = CmsPage::all();
        if($page){
            return response()->json($page);
        }
    }
     /**
     * add Cms page view.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addViewPage()
    {
        return view('admin.cms.cms-page.add');  
    }
     /**
     * Insert Cms page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addPage(CmsPageRequest $req)
    {
        $page = new CmsPage();
        $page->title = $req->title;
        $page->meta_content = $req->meta_content;
        $page->meta_description = $req->meta_description;
        $page->meta_keyword = $req->meta_keyword;
        $page->slug = $this->cleanString($req->title);
        $page->page_body = $req->page_body;
        $page->is_activated = $this->setStatus($req->is_activated);
        if($page->save())
        {
            return back()->with("message","Page content inserted successfully");
        }
    }
     /**
     * edit Cms page view.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editCmsPage($id)
    {
        $page = CmsPage::find($id);
        return view('admin.cms.cms-page.edit',compact('page'));
    }
     /**
     * update Cms page .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateCmsPage(CmsPageRequest $req)
    {
        $page = CmsPage::find($req->id);
        $page->title = $req->title;
        $page->meta_content = $req->meta_content;
        $page->meta_description = $req->meta_description;
        $page->meta_keyword = $req->meta_keyword;
        $page->slug = $this->cleanString($req->title);
        $page->page_body = $req->page_body;
        $page->is_activated = $this->setStatus($req->is_activated);
        if($page->save())
        {
            return back()->with("message","Page content updated successfully");
        }
    }
     /**
     * delete Cms page .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deleteCmsPage($id)
    {
        $pagess = CmsPage::find($id);
      
        if($pagess->delete())
        {
            return back()->with("message","Page content deleted successfully ! ");

        }
    }
     /**
     * create Menu.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function createMenu(Request $req){
        if(CreateMenu::where('id',1)->count() > 0){
            $data = CreateMenu::find(1);
            $data->menu_json = $req->data;
            if($data->save()){
                return back()->with("message","Menu inserted successfully ! ");
            }
        }else{

            $data = new CreateMenu();
            $data->menu_json = $req->data;
            if($data->save()){
                return back()->with("message","Menu inserted successfully ! ");
            }
        }
    }
     /**
     * Manage Menu or listing.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function menuManage(){
        $list = CmsPage::all();
        $menu = CreateMenu::find(1);
        return view('admin.cms.menu-editor.index',['list'=>$list,'menu'=>$menu->menu_json]);
    }
     /**
     * set status .
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

    protected function cleanString($string) {
        //Lower case everything
        $string = Str::lower($string);
        //Make alphanumeric (removes all other characters)
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }

}
