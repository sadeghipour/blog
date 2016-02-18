$(document).ready(function(){
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '817948394998506',
            xfbml      : true,
            version    : 'v2.5'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
})

function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);

    if (response.status === 'connected') {

        testAPI();
    } else if (response.status === 'not_authorized') {

        document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
        document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
}

function checkLoginState() {
    FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
    });
}


function testAPI() {
    FB.api('/me', {fields: 'email,first_name,last_name'}, function(response) {
        console.log(response);
        document.getElementById('status').innerHTML =
            'Thanks for logging in, ' + response.first_name + '!';
    });
}