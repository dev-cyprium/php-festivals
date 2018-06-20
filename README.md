# Serbian festivals
Serbian festivals is a web application used to manage, present and make festivals throughout the Serbian country.

## Technologies
 - PHP 7.2
 - Git
 - HTML 5
 - CSS 3
 - JavaScript (Ecma6)

## Build Process
The server is using a deploy mechanism with `git` powered build process.
When a new push is made against `master` on the build server, a build process is triggered
which will make the `/var/www` folder in sync with the latest code.
Also, in order to use Babel and EC6 in production, an `npm build` task is run which
takes all the `SASS` and `EC6` files and minifies them and transpiles them to the format known to the browsers.