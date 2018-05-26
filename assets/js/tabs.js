export default class Tabs {
    constructor() {
        this.tab = document.querySelectorAll('.tabs')[0]
        this.tabs = this.tab.querySelectorAll('.tab')
        this.active = 1
        this._listeners()
        this.matchState()
    }

    matchState() {
        this.tab.parentNode.querySelectorAll('.tab-content').forEach((tab) => {
            let id = tab.dataset.tab
            if(id != this.active) tab.style.display = 'none'
            else tab.style.display = 'block'
        })
    }

    handler(btn) {
        this.tabs.forEach((tab) => tab.classList.remove('active'))
        this.active = Array.from(this.tabs).indexOf(btn) + 1
        btn.classList.add('active')
        this.matchState()
    }

    _listeners() {
        this.tabs.forEach((tab) => {
            tab.addEventListener('click', (e) => this.handler(e.target))
        })
    }
}