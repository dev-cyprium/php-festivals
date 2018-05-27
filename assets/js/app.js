// Main JS file
import Map from "./map.js";
import Tabs from "./tabs.js";
import alerts from "./alerts";

window.App = {}
App.alerts = alerts

function boot() {
    let map = new Map();
    let tabs = new Tabs();
}

window.addEventListener('DOMContentLoaded', boot);