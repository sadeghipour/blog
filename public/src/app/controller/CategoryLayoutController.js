app.controller("CategoryLayoutController", function ($scope, $http, $location,AppData,WebService) {
    WebService.getHotCat(function(result){
        if(result){
            console.log(result);
            $scope.hotCat = result.success;
        }
    })

});