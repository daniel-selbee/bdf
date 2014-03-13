<?php
/**
 * Created by PhpStorm.
 * User: sulb1210
 * Date: 3/12/14
 * Time: 10:42 PM
 */

class GameViewHtml {

    public function showHeader($pageTitle = '') {
        include "header.inc";

    }

    public function showFooter() {
        include "footer.inc";
    }

    public function showGames($rows){
        include "games.inc";
    }

} 