<?php
include('functions_forum.php');
include('functions_topic.php');
include('functions_messages.php');

function messages_route(){
    include(ROOT . 'mod_gci/messages.php');
}

function forum_route(){
    include(ROOT . 'mod_gci/forum.php');
}

function topic_route(){
   include(ROOT.'mod_gci/topic.php');
}
