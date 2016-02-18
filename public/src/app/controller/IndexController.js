IndexController = ['$scope', '$http', '$location','AppData',"WebService","$sce", function ($scope, $http, $location,AppData,WebService,$sce) {

    var msg = {msg:"Don't Worry Baby :D"};
    WebService.getWarning(msg,function(data){
       console.log(data,'background: #222; color: #aba');
        console.info('Welcome to my Blog in Console, I hope you enjoy it!');
    });
    $scope.lastPost = [];
    WebService.getIndex(function(data){
        if(data){
            $scope.lastPost.title = data.success["title"];
            $scope.lastPost.content = $sce.trustAsHtml(data.success["body"]);
        }
        else{

        }
    });


}];