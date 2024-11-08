<?php

$userAkses = include __DIR__.DIRECTORY_SEPARATOR.'users.php';
return array_merge($userAkses, array(
    'top1',
    'top1-detail',
    'top2',
    'top2-detail',
    'more',
    'more-detail',
    'admin',
    'admin-detail',
    'admin_verify',
    'more-restore',
));