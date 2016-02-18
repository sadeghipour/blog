LayoutController = ['$scope', '$http', '$location','AppData','WebService', function ($scope, $http, $location,AppData,WebService) {

    $scope.lastNews = [];
    $scope.comments = [];

    WebService.getFeaturedPosts(function (result) {
        if(result.success){
            $scope.featured = result.success;
        }
    });
    WebService.getHotCat(function(result){
        if(result){
            $scope.hotCat = result.success;
        }
    });

    WebService.me(function(result){
        if(result){
            $scope.me = result.me;
        }
    });

    WebService.diggFeeds(function (result) {
        for (var i = 0; i < 5; i++) {
            $scope.lastNews.push(result.channel.item[i]);
        }
    });

    WebService.getComments(function (result) {
        for (var i = 0; i < result.success.length; i++) {
            $scope.comments.push(result.success[i]);
        }
    });

    WebService.getRecentPosts(function (result) {

        if(result.success){
            $scope.recentPosts = result.success;
        }
    });

}];