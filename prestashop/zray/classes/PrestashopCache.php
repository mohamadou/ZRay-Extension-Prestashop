<?php

//namespace ZRayPrestashop;

class PrestashopCache {

    public function beforeExit($context,&$storage){


            $storage['Cache'][] = array(
                                    'Id Module' => 'cache',
                                    'Name' => 111,
                                  );
    }


} 