<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Grooves Black Theme Configuration
    |--------------------------------------------------------------------------
    |
    | A curated vinyl collector's archive with warm beige and gold aesthetic.
    | Design extracted from Figma.
    |
    */

    'name' => 'Grooves Black',
    'description' => 'Curating the Extraordinary - A digital sanctuary for serious collectors',

    /*
    |--------------------------------------------------------------------------
    | Site Information
    |--------------------------------------------------------------------------
    */
    'site' => [
        'name' => 'Grooves Black',
        'tagline' => 'Curating the Extraordinary',
        'description' => 'A digital sanctuary for serious collectors and lovers of pure sound.',
        'email' => 'hello@groovesblack.com',
        'phone' => '+1 (555) 123-4567',
        'locations' => 'LONDON / NEW YORK / TOKYO',
    ],

    /*
    |--------------------------------------------------------------------------
    | Color Palette (from Figma)
    |--------------------------------------------------------------------------
    */
    'colors' => [
        'surface' => '#fbf9f4',
        'surface-alt' => '#f5f3ee',
        'surface-card' => '#e4e2dd',
        'surface-dark' => '#292a2e',
        'text-primary' => '#292a2e',
        'text-secondary' => '#5e5e63',
        'accent' => '#745b25',
        'accent-light' => '#e4c282',
        'badge-bg' => '#c6e7ff',
        'badge-text' => '#104c68',
    ],

    /*
    |--------------------------------------------------------------------------
    | Typography (from Figma)
    |--------------------------------------------------------------------------
    */
    'fonts' => [
        'serif' => 'Playfair Display',
        'sans' => 'Inter',
        'display' => 'Manrope',
    ],

    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */
    'navigation' => [
        'main' => [
            ['label' => 'Vinyl', 'route' => 'collection'],
            ['label' => 'Equipment', 'route' => 'collection', 'params' => ['category' => 'equipment']],
            ['label' => 'Artists', 'route' => 'collection', 'params' => ['category' => 'artists']],
            ['label' => 'Journal', 'route' => 'about'],
            ['label' => 'Archives', 'route' => 'collection'],
        ],
        'footer' => [
            'marketplace' => [
                ['label' => 'Vinyl Hub', 'route' => 'collection'],
                ['label' => 'Sell Music', 'route' => 'contact'],
                ['label' => 'Rare Finds', 'route' => 'collection', 'params' => ['filter' => 'rare']],
            ],
            'community' => [
                ['label' => 'Journal', 'route' => 'about'],
                ['label' => 'Archives', 'route' => 'collection'],
                ['label' => 'Events', 'route' => 'contact'],
            ],
            'support' => [
                ['label' => 'Privacy Policy', 'route' => 'privacy'],
                ['label' => 'Terms of Service', 'route' => 'terms'],
                ['label' => 'Shipping', 'route' => 'shipping'],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Cart & Checkout
    |--------------------------------------------------------------------------
    */
    'cart' => [
        'max_quantity' => 10,
        'free_shipping_threshold' => 150,
        'shipping_cost' => 12.99,
    ],

    /*
    |--------------------------------------------------------------------------
    | Currency
    |--------------------------------------------------------------------------
    */
    'currency' => [
        'code' => 'USD',
        'symbol' => '$',
        'position' => 'before',
    ],
];
