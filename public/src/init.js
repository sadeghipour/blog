var app = angular.module('app', ['ngSanitize', 'ngRoute', 'ngAnimate']);
app.factory("AppData", function () {
    return {};
});

app.factory("EVENTS", function () {
    return {
        TODO_ADDED: "todo_added",
        TODO_DELETED: "todo_added"
    };
});
