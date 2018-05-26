const SPEED = 150

export default class Map {
    constructor() {
        this.markers = document.querySelectorAll('.circle-star')
        this.position = 0
        if(this.markers.length > 0) {
            this.animate(this.next())
        }
    }

    next() {
        return this.markers[this.position++]
    }

    animate(marker) {
        if(!marker) return;

        marker.classList.add('active');

        setTimeout(() => this.animate(this.next()), SPEED)
    }
}