<?php
    require_once './resource/php/conf_session.php';
    require_once './resource/php/loginviewer.php';
    require_once './resource/php/searcher.php';
    roleLock();
    $head_desc = htmlspecialchars("Search Page of Wang Scent PH" ?? '');
    $head_title = htmlspecialchars("Wang Scent PH | Search" ?? '');
    $head_class = htmlspecialchars("" ?? '');
    $js_locs = array();
    include('resource/template/html/html_head.html');
    userLoginDisplay();
?>
<main class="search-cont my-5 py-5">
<?php
    include('./resource/template/search/search.html');
    search_Stuff();
?>
</main>
<?php
    include('./resource/template/footer/footer.html'); 
    include('./resource/template/html/html_foot.html');
?>