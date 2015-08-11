<?php

//namespace ZRayPrestashop;

class PrestashopJsfiles {

    public function beforeExit($context,&$storage){

        if (isset(Context::getContext()->controller))
            $_controller = Context::getContext()->controller;
        else
        {
            $_controller = new FrontController();
        }

        foreach($_controller->js_files as  $values) {
            $storage['Js'][] = array(
                'File Name' => $values,
            );
        }
    }


} 