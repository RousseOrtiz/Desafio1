<?php

class Abogados extends ActiveRecord{



    public function getdatoos($page, $ppage=20)
    {
        return $this->paginate("page: $page", "per_page: $ppage", 'order: id desc');
    }

    
}