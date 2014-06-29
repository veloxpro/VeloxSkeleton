var Velox = {};
Velox.View = {};

$(function() {
    for (var i= 0, len = VeloxView.length; i<len; i++) {
        Velox.View[VeloxView[i]]();
    }
})