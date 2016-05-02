<?php use Illuminate\Routing\Router as Routing;

Route::group([ 'prefix' => 'api', 'namespace' => 'Api' ], function(Routing $route) {

    /*
     * Version 1 API Routing
     */

    $route->group([ 'prefix' => 'v1', 'namespace' => 'V1', 'middleware' => 'api.v1' ], function (Routing $route) {

        $route->resources([
            'creators' => 'CreatorController',
        ]);

        $route->group([ 'prefix' => 'creators/{creatorId}' ], function (Routing $route) {
            $route->resources([
                'issues' => 'IssueController',
            ]);

            $route->group([ 'prefix' => 'issues/{issueId}' ], function (Routing $route) {
                $route->resources([
                    'pages' => 'PageController',
                ]);
            });

        });

    });

});


Route::get('/', function () {
    return view('welcome');
});
