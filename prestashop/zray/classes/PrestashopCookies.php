<?php

//namespace ZRayPrestashop;

class PrestashopCookies {

    public function beforeExit($context,&$storage){
            $cookies = Context::getContext()->cookie->getAll();

        foreach($cookies as $cookie => $values)
            $storage['Cookies'][] = array(
                                        'Name' => $cookie,
                                        'value' => $values,
                                       );

    }


} 