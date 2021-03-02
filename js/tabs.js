// https://www.w3.org/TR/wai-aria-practices/examples/tabs/tabs-1/js/tabs.js

function launchTabs() {
    var tablist = document.querySelectorAll('[role="tablist"]')[0];
    var tabs;
    var panels;

    generateArrays();

    function generateArrays () {
        tabs = document.querySelectorAll('[role="tab"]');
        panels = document.querySelectorAll('[role="tabpanel"]');
    };


    // Bind listeners
    for (i = 0; i < tabs.length; ++i) {
        addListeners(i);
    };

    function addListeners (index) {
        tabs[index].addEventListener('click', clickEventListener);

        // Build an array with all tabs (<button>s) in it
        tabs[index].index = index;
    };

    // When a tab is clicked, activateTab is fired to activate it
    function clickEventListener (event) {
        var tab = event.target;
        activateTab(tab, false);
    };


    // Activates any given tab panel
    function activateTab (tab, setFocus) {
        setFocus = setFocus || true;
        // Deactivate all other tabs
        deactivateTabs();

        // Set the tab as selected
        tab.setAttribute('aria-selected', 'true');
        tab.classList.add('active');

        // Get the value of aria-controls (which is an ID)
        var controls = tab.getAttribute('aria-controls');

        // Remove hidden attribute from tab panel to make it visible
        document.getElementById(controls).classList.add('show');
        document.getElementById(controls).classList.add('active');

    };

    // Deactivate all tabs and tab panels
    function deactivateTabs () {
        for (t = 0; t < tabs.length; t++) {
            tabs[t].setAttribute('aria-selected', 'false');
            tabs[t].classList.remove('active');
        };

        for (p = 0; p < panels.length; p++) {
            panels[p].classList.remove('show');
            panels[p].classList.remove('active');
        };
    };

};