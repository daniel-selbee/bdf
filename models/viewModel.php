<?php

class viewModel{

    public function getView($pagename=' ', $data=array()){
        include $pagename;
    }
}

?>