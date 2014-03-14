<?php

class viewModel{

    public function __construct(){

    }

    public function getView($pagename=' ', $data=array()){
        include $pagename;
    }
}

?>