<?php

$config=[

'add_article_rules'=>[
[
'field' => 'article_title',
'label' => 'Article Title',
'rules' => 'trim|required'
],
[
'field' => 'article_body',
'label' => 'Article Body',
'rules' => 'trim|required'
]
]

];

?>