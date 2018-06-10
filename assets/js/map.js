const SPEED = 75
const ANIMATE_SPEED = 500
const INIT_SAMPLE = 6

const times = x => f => {
    if(x > 0) {
        f()
        times (x - 1) (f)
    }
}


class Arr {
    constructor(lst=[]) {
        this.position = 0
        this.list = lst
    }

    next() { return this.list[this.position++] }
    push(item) { this.list.push(item) }
    splice(index, length) { this.list.splice(index, length) }
    sample() {
        let randIndex = Math.floor(Math.random() * this.list.length)
        let item = this.list[randIndex]
        this.list.splice(randIndex, 1)
        return item
    }
}

export default class Map {
    constructor() {
        if (document.querySelectorAll('.circle-star').length) {
            let nodes = document.querySelectorAll('.circle-star')
            this.markers = new Arr([...nodes])
            this.samples = new Arr()
            this._sample(INIT_SAMPLE)
            this._animateSample(this.samples.next())
        }
    }

    next() {
        return this.markers.list[this.position++]
    }

    animate(marker) {
        if(!marker) return;

        marker.classList.add('active');

        setTimeout(() => this.animate(this.next()), SPEED)
    }

    _animateRecurse() {
        let vanish = this.samples.sample()
        vanish.classList.remove('active')
        let next = this.markers.sample()
        setTimeout(() => next.classList.add('active'), ANIMATE_SPEED)
        this.markers.push(vanish)
        this.samples.push(next)
        setTimeout(this._animateRecurse.bind(this), SPEED + 2*ANIMATE_SPEED)
    }

    _animateSample(sample) {
        if(!sample) {
            setTimeout(() => {
                this._animateRecurse()
            }, ANIMATE_SPEED)
            return
        }
        sample.classList.add('active')
        setTimeout(() => this._animateSample(this.samples.next()), SPEED)
    }

    _sample(size) {
        times(size) (() => this.samples.push(this.markers.sample()))
    }
}