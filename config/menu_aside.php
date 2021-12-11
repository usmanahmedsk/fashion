<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/',
            'new-tab' => false,
        ],

        // Custom
        [
            'section' => 'Collection Types',
        ],
        [
            'title' => 'Localization',
            'icon' => 'media/svg/icons/Home/Book-open.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Languages',
                    'bullet' => 'dot',
                    'page' => 'language',
                ],
                [
                    'title' => 'Areas',
                    'bullet' => 'dot',
                    'page' => 'area',
                ],
                [
                    'title' => 'Cities',
                    'bullet' => 'dot',
                    'page' => 'city',
                ],
                [
                    'title' => 'States',
                    'bullet' => 'dot',
                    'page' => 'state',
                ],
                [
                    'title' => 'Countries',
                    'bullet' => 'dot',
                    'page' => 'country',
                ],
            ]
        ],
        [
            'title' => 'Item',
            'icon' => 'media/svg/icons/Home/Mirror.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Appearances',
                    'bullet' => 'dot',
                    'page' => 'appearance',
                ],
                [
                    'title' => 'Categories',
                    'bullet' => 'dot',
                    'page' => 'category',
                ],
                [
                    'title' => 'Attributes',
                    'bullet' => 'dot',
                    'page' => 'attribute',
                ],
                [
                    'title' => 'Item Files',
                    'bullet' => 'dot',
                    'page' => 'item_files',
                ],
                [
                    'title' => 'Items',
                    'bullet' => 'dot',
                    'page' => 'item',
                ]
            ]
        ]

    ]

];
