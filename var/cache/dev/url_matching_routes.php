<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/presentation' => [[['_route' => 'presentation', '_controller' => 'App\\Controller\\HomeController::presentation'], null, null, null, false, false, null]],
        '/equipe' => [[['_route' => 'equipe', '_controller' => 'App\\Controller\\HomeController::equipe'], null, null, null, false, false, null]],
        '/admin' => [[['_route' => 'admin', '_controller' => 'App\\Controller\\HomeController::admin'], null, null, null, false, false, null]],
        '/profile' => [[['_route' => 'profile', '_controller' => 'App\\Controller\\HomeController::profile'], null, null, null, false, false, null]],
        '/products' => [[['_route' => 'products', '_controller' => 'App\\Controller\\HomeController::products'], null, null, null, false, false, null]],
        '/shopping' => [[['_route' => 'shopping', '_controller' => 'App\\Controller\\HomeController::shopping'], null, null, null, false, false, null]],
        '/addProduct' => [[['_route' => 'addProduct', '_controller' => 'App\\Controller\\HomeController::add'], null, null, null, false, false, null]],
        '/registration' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/security' => [[['_route' => 'security', '_controller' => 'App\\Controller\\SecurityController::index'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [
            [['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null],
            [['_route' => 'logout'], null, null, null, false, false, null],
        ],
        '/register' => [[['_route' => 'security_registration', '_controller' => 'App\\Controller\\SecurityController::registration'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/pro(?'
                    .'|duct/([^/]++)(?'
                        .'|(*:192)'
                        .'|/(?'
                            .'|update(*:210)'
                            .'|delete(*:224)'
                        .')'
                    .')'
                    .'|file/([^/]++)/(?'
                        .'|update(?'
                            .'|Address(*:267)'
                            .'|Payment(*:282)'
                        .')'
                        .'|delete(?'
                            .'|Address(*:307)'
                            .'|Payment(*:322)'
                        .')'
                    .')'
                .')'
                .'|/ad(?'
                    .'|d(?'
                        .'|Address/([^/]++)(*:359)'
                        .'|Payment/([^/]++)(*:383)'
                    .')'
                    .'|min/([^/]++)/(?'
                        .'|update(*:414)'
                        .'|delete(*:428)'
                    .')'
                .')'
                .'|/shopping/shop(?'
                    .'|pingAdd/([^/]++)(*:471)'
                    .'|Del/([^/]++)(*:491)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        192 => [[['_route' => 'product', '_controller' => 'App\\Controller\\HomeController::product'], ['id'], null, null, false, true, null]],
        210 => [[['_route' => 'updateProduct', '_controller' => 'App\\Controller\\HomeController::edit'], ['id'], null, null, false, false, null]],
        224 => [[['_route' => 'deleteProduct', '_controller' => 'App\\Controller\\HomeController::delete'], ['id'], null, null, false, false, null]],
        267 => [[['_route' => 'updateAddress', '_controller' => 'App\\Controller\\HomeController::editAddress'], ['id'], null, null, false, false, null]],
        282 => [[['_route' => 'updatePayment', '_controller' => 'App\\Controller\\HomeController::editPayment'], ['id'], null, null, false, false, null]],
        307 => [[['_route' => 'deleteAddress', '_controller' => 'App\\Controller\\HomeController::deleteAddress'], ['id'], null, null, false, false, null]],
        322 => [[['_route' => 'deletePayment', '_controller' => 'App\\Controller\\HomeController::deletePayment'], ['id'], null, null, false, false, null]],
        359 => [[['_route' => 'addAddress', '_controller' => 'App\\Controller\\HomeController::addAddress'], ['id'], null, null, false, true, null]],
        383 => [[['_route' => 'addPayment', '_controller' => 'App\\Controller\\HomeController::addPayment'], ['id'], null, null, false, true, null]],
        414 => [[['_route' => 'updateMember', '_controller' => 'App\\Controller\\HomeController::editMember'], ['id'], null, null, false, false, null]],
        428 => [[['_route' => 'deleteMember', '_controller' => 'App\\Controller\\HomeController::deleteMember'], ['id'], null, null, false, false, null]],
        471 => [[['_route' => 'shoppingAdd', '_controller' => 'App\\Controller\\HomeController::shoppingAdd'], ['id'], null, null, false, true, null]],
        491 => [
            [['_route' => 'shopDel', '_controller' => 'App\\Controller\\HomeController::shopDel'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
