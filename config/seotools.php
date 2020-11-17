<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "AnarchyNetwork", // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'AnarchyNetwork , un serveur ouvert depuis 2016 vous proposant plusieurs modes de jeux !', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['minecraft', 'minecraft serveur', 'serveur minecraft', 'serveur fr', 'serveur français', 'prison', 'serveur prison', 'serveur opprison', 'serveur op prison', 'oitb', 'serveur oitb', 'farmrun', 'serveur farmrun', 'serveur farm run', 'opprison server', 'prison server', 'oitb server', 'farmrun server', 'minecraft france', 'minecraft pvp', 'minecraft multijoueur', 'minecraft voter'],
            'canonical'    => null, // Set null for using Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'AnarchyNetwork', // set false to total remove
            'description' => 'AnarchyNetwork , un serveur ouvert depuis 2016 vous proposant plusieurs modes de jeux !', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'AnarchyNetwork', // set false to total remove
            'description' => 'AnarchyNetwork , un serveur ouvert depuis 2016 vous proposant plusieurs modes de jeux !', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
