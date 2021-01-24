<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    'home' => [[], ['_controller' => 'App\\Controller\\HomeController::index'], [], [['text', '/']], [], []],
    'products' => [[], ['_controller' => 'App\\Controller\\HomeController::products'], [], [['text', '/products']], [], []],
    'product' => [['id'], ['_controller' => 'App\\Controller\\HomeController::product'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/product']], [], []],
    'shopping' => [[], ['_controller' => 'App\\Controller\\HomeController::shopping'], [], [['text', '/shopping']], [], []],
    'shoppingAdd' => [['id'], ['_controller' => 'App\\Controller\\HomeController::shoppingAdd'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/shopping/shoppingAdd']], [], []],
    'shopDel' => [['id'], ['_controller' => 'App\\Controller\\HomeController::shopDel'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/shopping/shopDel']], [], []],
    'addProduct' => [[], ['_controller' => 'App\\Controller\\HomeController::add'], [], [['text', '/addProduct']], [], []],
    'updateProduct' => [['id'], ['_controller' => 'App\\Controller\\HomeController::edit'], [], [['text', '/update'], ['variable', '/', '[^/]++', 'id', true], ['text', '/product']], [], []],
    'deleteProduct' => [['id'], ['_controller' => 'App\\Controller\\HomeController::delete'], [], [['text', '/delete'], ['variable', '/', '[^/]++', 'id', true], ['text', '/product']], [], []],
    'app_register' => [[], ['_controller' => 'App\\Controller\\RegistrationController::register'], [], [['text', '/registration']], [], []],
    'security' => [[], ['_controller' => 'App\\Controller\\SecurityController::index'], [], [['text', '/security']], [], []],
    'app_login' => [[], ['_controller' => 'App\\Controller\\SecurityController::login'], [], [['text', '/login']], [], []],
    'app_logout' => [[], ['_controller' => 'App\\Controller\\SecurityController::logout'], [], [['text', '/logout']], [], []],
    'security_registration' => [[], ['_controller' => 'App\\Controller\\SecurityController::registration'], [], [['text', '/register']], [], []],
    'logout' => [[], [], [], [['text', '/logout']], [], []],
];
