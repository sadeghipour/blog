app.controller("MenuController",function ($scope, $http, $location,AppData,WebService,$window) {

    //TODO: at this I must migrate to Angular2 but........................... WE WILL CONTINUE ON ANGULARJS ON THIS BLOG!

    var menu = $location.absUrl().split("/menu/")[1];
    WebService.getMenuContent(menu,function(result){
        if(result && result.success!=null){
         $scope.menu = result.success;
        }
        else{
            $window.location.href = "/error/show404";
        }
    });
});