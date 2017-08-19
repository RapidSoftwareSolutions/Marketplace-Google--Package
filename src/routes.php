<?php
$routes = [
    'metadata',
    'getAccessToken',
    'getUser',
    'getUsersBySearchQuery',
    'getUsersByActivityId',
    'getComment',
    'getCommentsByActivityId',
    'getActivitiesByUserId',
    'getActivity',
    'getActivitiesBySearchQuery',
    'refreshToken'

];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}
