<?php
return [

    //存储方式file|redis
    'driver' => 'file',

    //当driver为file，可以指定存储路径
    'file' => '/runtime/sessions',

    //当driver为redis时，可配置session前缀，注意与redis配置中的前缀不冲突
    'prex' => 'session_',

    //过期时间
    'lifetime' => '3600',
];