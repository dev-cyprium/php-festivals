// Main JS file
import Map from "./map.js";
import Tabs from "./tabs.js";
import alerts from "./alerts";
import Contact from "./contact.js";

window.App = {}
App.alerts = alerts

function boot() {
    let map = new Map();
    let tabs = new Tabs();
    let contact = new Contact();
}

window.addEventListener('DOMContentLoaded', boot);