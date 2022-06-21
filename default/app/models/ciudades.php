<?php

class Ciudades extends ActiveRecord{



    public function getdatos($page, $ppage=20)
    {
        return $this->paginate("page: $page", "per_page: $ppage", 'order: id desc');
    }

    
}