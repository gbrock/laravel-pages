<?php

return [
    'view' => 'pages::default',
    'model' => \Gbrock\Pages\Models\Page::class,
    'domains' => [
        // Add your domains here.  $slugToServe => $classToLoad.
        // '/blog' => \App\BlogPage::class,
    ],
];
