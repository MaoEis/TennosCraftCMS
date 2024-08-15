<?php

use craft\elements\Entry;
use craft\elements\Asset;
use craft\helpers\UrlHelper;

return [
    'endpoints' => [
        '/api/rackets' => function() {
            return [
                'elementType' => Entry::class,
                'criteria' => ['section' => 'rackets'],
                'cache' => false,
                'serializer' => 'jsonFeed',
                'transformer' => function(Entry $entry) {
                    return [
                        'id' => $entry->id,
                        'title' => $entry->title,
                        'price' => $entry->price,
                        'description' => $entry->description,
                        'colour' => $entry->colour,
                        'colorhex' => $entry->colorhex,
                        'racketImg' => str_replace("https", "http", $entry->racketImg->one()->getUrl('')),
                    ];
                },
            ];
        },
        '/api/rackets/<entryId:\d+>' => function($entryId) {
            return [
                'elementType' => Entry::class,
                'criteria' => ['id' => $entryId],
                'one' => true,
                'cache' => false,
                'serializer' => 'jsonFeed',
                'transformer' => function(Entry $entry) {
                  return [
                    // 'id' =>'test',
                        'id' => $entry->id,
                        'title' => $entry->title,
                        'price' => $entry->price,
                        'description' => $entry->description,
                        'colour' => $entry->colour,
                        'colorhex' => $entry->colorhex,
                        'racketImg' => str_replace("https", "http", $entry->racketImg->one()->getUrl('')),
                  ];
              },
            ];
        },
        '/api/whyUs' => function() {
            return [
                'elementType' => Entry::class,
                'criteria' => ['section' => 'whyUs'],
                'cache' => false,
                'serializer' => 'jsonFeed',
                'transformer' => function(Entry $entry) {
                    return [
                        'id' => $entry->id,
                        'iconimg' => str_replace("https", "http", $entry->iconimg->one()->getUrl('')),
                        'title' => $entry->title,
                        'description' => $entry -> description
                    ];
                },
            ];
        },
    ]
];