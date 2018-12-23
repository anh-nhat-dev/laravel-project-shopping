<?php
namespace App\Composers;

use Illuminate\View\View;
use App\Models\Category;

class CatesComposers {

    const DEFAULT_PARENT_ID = 0;
    const SEGMENT_POSITION = 3; //Vị trí id trên 
    protected $cates;

    protected $hiddenRoute = ['admin.categories.edit']; //Danh sách router ẩn
    protected $currentId;
    protected $currentRoute;

    public function __construct()
    {
        $this->currentRoute = app('router')->currentRouteName(); //Lấy ra router hiện tại
        $this->checkRoute();
        $this->recursiveCates();
    }
    
    public function compose(View $view)
    {
        $view->with('cates', $this->cates);
    }

    public function recursiveCates()
    {
        $cates = Category::where('parent_id', self::DEFAULT_PARENT_ID)->get();
        $this->cates = collect();
        $this->loop($cates);
    }

    public function loop($cates, $parent = 0, $char = '')
    {
        foreach ($cates as $cate) {
            if ($cate->parent_id == $parent) {
                if ($cate->id == $this->currentId) goto next; //Nếu id hủy đệ quy bằng id đang chạy trong foreach thì tiến hành thoát đệ quy tại id đó.
                $cate->name = $char.$cate->name;
                $this->cates->push($cate);
                $this->loop($cate->childrend,$cate->id, $char.'--');
                next:
                unset($cate);
            }
        }
    }

       
    public function checkRoute()
    {
        if (in_array($this->currentRoute, $this->hiddenRoute)) { //Nếu router hiện tại nằm trong danh sách -> Lấy ra ID cần hủy đệ quy
            $this->currentId = app('request')->segment(self::SEGMENT_POSITION);
        }
    }
}