$(document).ready(() => {
    animateMap();
});

function Markers() {
    this.markers = $(".circle-star");
    this.position = 0;
}

Markers.prototype.next = function() {
    return $(this.markers[this.position++]);
}


function animateMap() {
    var markers = new Markers();
    animateMarker(markers.next());
}

function animateMarker(marker) {
    if(!marker) return;

    marker.addClass('active');

    setTimeout(() => animateMarker(marker.next()), 100);
}