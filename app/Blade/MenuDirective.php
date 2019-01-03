<?php
namespace App\Blade;

class MenuDirective {

    protected $menu;
    protected $arrays;
    
    public function show($agument)
    {   
        $this->loop($agument);
       return $this->menu;
    }

    public function loop($arrays, $parent = 0)
    {
        $arrays->each(function($item, $key) use ($parent, &$arrays){
            if ($item->parent_id == $parent) {
            if ($parent == 0) {
                $this->menu .= $this->openMenuTags();
                $this->menu .= $this->parentMenu($item->name,$key, $item->id);
                $this->menu .= $this->openTagsChild($key);
                $this->loop($arrays, $item->id);
                $this->menu .= $this->closeTagsChild();
                $this->closeMenuTags();
            }
            if ($parent != 0 ) {
                $this->menu .= $this->childrenItem($item->name, $item->id);
                $this->loop($arrays, $item->id);
            }
            
            $arrays->forget($key);
        }
        });
    }

    public function openMenuTags()
    {
        return '<div class="panel panel-default">';
    }

    public function closeMenuTags()
    {
        return '</div>';
    }
    
    public function parentMenu($name,$key, $id)
    {
        return '<div class="panel-heading" role="tab" id="heading'.$key.'">
                <h4 class="panel-title">
                <a data-toggle="collapse" data-id="'.$id.'" data-parent="#accordion" href="#collapse'.$key.'" aria-expanded="false" aria-controls="collapse'.$key.'">
                '.$name.'
                </a>
                </h4>
                </div>';
    }

    public function closeTagsChild()
    {
        return '</ul></div></div></div>';
    }

    public function openTagsChild($key)
    {
        return '<div id="collapse'.$key.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$key.'">
                <div class="panel-body">
                <ul>';
    }

    public function childrenItem($name, $id)
    {
        return '<li><a data-id="'.$id.'" href="#">'.$name.'</a></li>';
    }

}