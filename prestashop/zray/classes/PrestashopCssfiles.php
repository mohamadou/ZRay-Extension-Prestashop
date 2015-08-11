<?php

//namespace ZRayPrestashop;

class PrestashopCssfiles {

    public function beforeExit($context,&$storage){

        if (isset(Context::getContext()->controller))
            $_controller = Context::getContext()->controller;
        else
        {
            $_controller = new FrontController();
        }

        foreach($_controller->css_files as $key => $values) {
            $storage['Css'][] = array(
                'File Name' => $key,
            );
        }
    }


} 