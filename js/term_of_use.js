window.addEventListener('load', disableClickFromGameBrowser, false);

function disableUserInteraction() {
    //Disable web page copy/paste on mobiles
    var styles = '* { -webkit-touch-callout: none;-webkit-user-select: none;pointer-events: none;}';
    var css = document.createElement('style');
    css.type = 'text/css';

    if (css.styleSheet) 
      css.styleSheet.cssText = styles;
    else 
      css.appendChild(document.createTextNode(styles));

    document.getElementsByTagName("head")[0].appendChild(css);
}

function updateViewPort() {
    var viewport = document.querySelector("meta[name=viewport]");
    viewport.setAttribute('content', 'width=640, user-scalable = no');
}

function disableClickFromGameBrowser() {
    var userAgentStr = "" + navigator.userAgent;
    var from_game = false;
    userAgentStr = userAgentStr.toLowerCase();

    //search if string has Version/XX Chrome if so, it's from inside game android
    var regex = /(version\/\d+(\.\d)* chrome)/i;
    if (userAgentStr.match(regex)) {
        from_game = true;
    }
    else {
        //if string ends with Mobile/XXXX, it's from ios game
        var str_splits = userAgentStr.split(" ");
        var last_str = str_splits[str_splits.length - 1];
        regex = /(mobile\/\d+(\.\d)*)/i;

        if (last_str.match(regex)) {
            from_game = true;
        } 
    }

    if (from_game) {
        updateViewPort();
        disableUserInteraction();
    } else {
        var footer_elem = $("#footer_tos");
        var footer_url = "footer.html";

        if (footer_elem.length > 0) {
            footer_elem.load(footer_url);
        } else {
            $("#footer").load(footer_url);
        }
    }
}