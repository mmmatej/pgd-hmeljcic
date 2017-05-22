function addWidget (cw, cid) {
    if (typeof cw == 'undefined' ) cw = false;

    try {
        objIFrame = document.createElement('<iframe frameborder="0" src="" scrolling="no" marginheight="0" marginwidth="0" name="_widget_if" id="_widget_if">');
    } catch (e) {
        objIFrame = document.createElement('iframe');
        objIFrame.name = '_widget_if';
    }

    w = (cw) ? '/' + cw.toString() : '';

    if (typeof cid == 'undefined') {
        objIFrame.src = 'http://gradnik.dobrodelen.si/sl/?host='+location.hostname;
    } else {
        objIFrame.src = 'http://gradnik.dobrodelen.si/sl/?hash_id='+cid+'&host='+location.hostname;
    }

    objIFrame.height = "580px";
    objIFrame.width = (w != '') ? cw.toString() + "px" : "260px";
    objIFrame.scrolling = 'no';
    objIFrame.frameBorder = '0';
    objIFrame.marginHeight = 0;
    objIFrame.marginWidth = 0;
    objIFrame.id = '_widget_if';

    document.write('<div id="_widget_data"></div>');
    document.getElementById ('_widget_data').appendChild (objIFrame);
}

function setDimensions(h) {
    try {
        var iframe = document.getElementById('_widget_if');
        if (parseInt(h) == 0) {
            document.getElementById ('_sellchat_data').removeChild (iframe);
        } else {
            iframe.style.height = parseInt(h) + "px";
        }
    } catch(e) {

    }
}