/**
 * AllPage
 * @type {{init: AllPage.init}}
 */
const AllPage = function () {
    /**
     * Plugin
     */
    const pluginStart = function () {

	}

    /**
     * Header
     */
    const Header = function () {

    }

    /**
     * Sidebar
     */
    const Sidebar = function () {

    }

    /**
     * Init
     */
    return {
        init: function () {
            pluginStart();
            Header();
            Sidebar();
        }
    };

}();

/**
 * AllPage
 * @type {{init: AllPage.init}}
 */
const HomePage = function () {
    /**
     * Init
     */
    return {
        init: function () {
            Slider();
        }
    };

}();

/**
 * ready
 */
jQuery(document).ready(function() {
    AllPage.init();
    HomePage.init();
});


