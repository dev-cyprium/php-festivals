exports.config = {
    files: {
        javascripts: {
            joinTo: "js/app.js"
        },
        stylesheets: {
            joinTo: "css/app.css"
        },
        templates: {
            joinTo: "js/app.js"
        }
    },
    paths: {
        watched: ["css", "js", "vendor", "scss"],
        public: "../public/assets"
    },
    plugins: {
        babel: {
            ignore: [/vendor/]
        },
        sass: {
            mode: "native"
        }
    },
    modules: {
        autoRequire: {
            "js/app.js": ["js/app"]
        }
    },
    npm: {
        enabled: true
    }
}