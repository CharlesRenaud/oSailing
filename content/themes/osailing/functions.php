<?php

// On vérifie que la fonction n'existe pas déjà
// utile dans le cas d'un child-thème par exemple

if (!function_exists('osailing_enqueue')) {

    function osailing_enqueue() {

        // On souhaite déclarer à WordPress 2 choses
        // 1 feuille de style
        // 1 fichier js

        wp_enqueue_style(
            'main-style', // le nom de la stylesheet (doit être unique)
            get_theme_file_uri('public/css/style.css'), // l'URL du fichier
            [], // Au besoin, on peut charger des dépendances
            '20200310', // Version de la stylesheet
            'all' // Contexte (media) de chargement de la stylesheet
        );

        wp_enqueue_script(
            'app', // Le nom de notre fichier js (doit être unique)
            get_theme_file_uri('public/js/app.js'), // URL du fichier
            [], // dépendances
            '20200310', // version
            true // permet d'inclure le script avant la fermeture de <body>
        );

    }

}

// On accroche la fonction "osailing_enqueue" au hook "wp_enqueue_scripts"
add_action('wp_enqueue_scripts', 'osailing_enqueue');

if (!function_exists('osailing_setup')) {

    function osailing_setup() {

        // On va ajouter des fonctionnalités à notre thème

        // Gestion du title tag par WP
        add_theme_support('title-tag');

        // Prise en charge des images mises en avant
        add_theme_support('post-thumbnails');

        // Création d'emplacement(s) de menu
        register_nav_menus([
            'home' => 'Menu latéral de la home',
            'page' => 'Menu des pages'
            //...
        ]);
    }

}

add_action('after_setup_theme', 'osailing_setup');