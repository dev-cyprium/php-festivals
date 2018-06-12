export default class Tabs {
    constructor() {
        if(document.querySelectorAll('.tabs').length) {
            this.tab = document.querySelectorAll('.tabs')[0]
            this.tabs = this.tab.querySelectorAll('.tab')
            this.active = 1
            this._listeners()
            this.matchState()
        }
    }

    matchState() {
        this.tab.parentNode.querySelectorAll('.tab-content').forEach((tab) => {
            let id = tab.dataset.tab
            if(id != this.active) tab.style.display = 'none'
            else tab.style.display = 'block'
        })
    }

    handler(ev, btn) {
        ev.preventDefault()
        this.tabs.forEach((tab) => tab.classList.remove('active'))
        this.active = Array.from(this.tabs).indexOf(btn) + 1
        btn.classList.add('active')
        this.matchState()
    }

    _listeners() {
        this.tabs.forEach((tab) => {
            let instance = this
            tab.addEventListener('click', function(e) { instance.handler(e, this) }, false)
        })
    }
}