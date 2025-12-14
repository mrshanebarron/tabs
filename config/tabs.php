<?php

return [
    'variants' => [
        'default' => [
            'list' => 'flex border-b border-gray-200',
            'tab' => 'px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 border-b-2 border-transparent -mb-px cursor-pointer transition-colors',
            'tab_active' => 'px-4 py-2 text-sm font-medium text-blue-600 border-b-2 border-blue-600 -mb-px cursor-pointer',
        ],
        'pills' => [
            'list' => 'flex gap-2',
            'tab' => 'px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-100 cursor-pointer transition-colors',
            'tab_active' => 'px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg cursor-pointer',
        ],
        'boxed' => [
            'list' => 'flex bg-gray-100 p-1 rounded-lg',
            'tab' => 'px-4 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 cursor-pointer transition-colors',
            'tab_active' => 'px-4 py-2 text-sm font-medium text-gray-900 bg-white rounded-md shadow cursor-pointer',
        ],
    ],
    'panel' => 'mt-4',
];
