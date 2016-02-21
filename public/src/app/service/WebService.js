var APP_NAME = 'app';

angular.module(APP_NAME).service('WebService', ["$http", function ($http) {

    this.getWarning = function(parameters,callbackFunc){
        $http({
            url:"/ConsoleWarning/text.txt",
            method:"GET",
            headers:{'Content-Type':'application/x-www-form-urlencoded'},
            data: $.param(parameters)
        }).success(function(data){
            callbackFunc(data);
        }).error(function(data){
            callbackFunc([]);
        })
    }


    this.getIndex = function(callbackFunc){
        $http({
            url:"/api/getIndex",
            method:"POST",
            header:{'Content-Type':'application/x-www-form-urlencoded'}
        }).success(function(data){
            callbackFunc(data);
        }).error(function(data){
            callbackFunc([]);
        })
    };

    this.getHotCat = function(callbackFunc){
        $http({
            url:"/api/getHotCat",
            method:"POST",
            header:{'Content-Type':'application/x-www-form-urlencoded'}
        }).success(function(data){
            callbackFunc(data);
        }).error(function(data){
            callbackFunc([]);
        })
    }

    this.me =  function(callbackFunc) {
        $http({
            url: "/api/showRandomMyPic",
            method: "POST",
            header: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (data) {
            callbackFunc(data);
        }).error(function (data) {
            callbackFunc([]);
        })
    }

    this.diggFeeds = function(callbackFunc) {

        $http({
            url: "/api/getXml",
            method: "GET",
            header: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (data) {
            callbackFunc(data);
        }).error(function (data) {
            callbackFunc([]);
        })
    };
    this.getComments = function(callbackFunc) {

        $http({
            url: "/api/getComments",
            method: "POST",
            header: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (data) {
            callbackFunc(data);
        }).error(function (data) {
            callbackFunc([]);
        })
    }

    this.getFeaturedPosts = function(callbackFunc) {

        $http({
            url: "/api/getFeaturedPosts",
            method: "POST",
            header: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (data) {
            callbackFunc(data);
        }).error(function (data) {
            callbackFunc([]);
        })
    }


    this.getRecentPosts = function(callbackFunc) {

        $http({
            url: "/api/getRecentPosts",
            method: "POST",
            header: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (data) {
            callbackFunc(data);
        }).error(function (data) {
            callbackFunc([]);
        })
    };

    this.getMenuContent = function(parameters,callbackFunc) {
        $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded; charset=UTF-8";
        $http.defaults.transformRequest = function (data) {
            if (data) {
                return $.param(data);
            }
            return null;
        };

        $http({
            url: "/api/getMenuContent",
            method: "POST",
            data: {menu:decodeURIComponent(parameters)},
            header: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (data) {
            callbackFunc(data);
        }).error(function (data) {
            callbackFunc([]);
        })
    };



}]);