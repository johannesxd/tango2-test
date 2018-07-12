
var url = 'mobile.de';
var selector = '#footer';
var page = require('webpage').create();
console.log('Tsst');
phantom.exit();

/*
page.onError = function (msg, trace) {

    phantom.exit();

};

page.onAlert = function( msg ) {

    console.log( msg );

    if( msg == "EXIT" ){
        phantom.exit();
    }
};

page.open(url, function(status) {

    page.includeJs('https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', function() {

        page.evaluate(function(config){

            window.setTimeout(function(){
                setInterval(function(){
                    pullHtmlString(config);
                }, 2000);
            }, 1);

        }, config);
    });

});

function pullHtmlString(config){

    alert($(selector).wrap('<p/>').parent().html());

    alert( "EXIT" );

}
*/