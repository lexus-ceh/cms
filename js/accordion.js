// https://www.w3.org/TR/wai-aria-practices/examples/tabs/tabs-1/js/tabs.js

function launchAccording() {
    // var accordionlist = document.querySelectorAll('[role="tablist"]')[0];
    var accordionHeader;
    var accordionText;

    generateArrays();

    function generateArrays () {
        accordionHeader = document.querySelectorAll('.accordion-button');
        accordionText = document.querySelectorAll('.accordion-collapse');
    };


    // Bind listeners
    for (let i = 0; i < accordionHeader.length; ++i) {
        addListeners(i);
    };

    function addListeners (index) {
        accordionHeader[index].addEventListener('click', clickEventListener);

        // Build an array with all tabs (<button>s) in it
        accordionHeader[index].index = index;
    };

    // When a tab is clicked, activateTab is fired to activate it
    function clickEventListener (event) {
        var accordionHeader = event.target;
        activateAccordion(accordionHeader);
    };


    // Activates any given tab panel
    function activateAccordion (accordionHeader) {

        // Deactivate all other tabs
        // deactivateAccordion();

        var controls = accordionHeader.getAttribute('aria-controls');

        // Set the tab as selected
        if (accordionHeader.getAttribute('aria-expanded') === 'false') {
            accordionHeader.setAttribute('aria-expanded', 'true');
            accordionHeader.classList.remove('collapsed');
            document.getElementById(controls).classList.add('show');
        } else {
            accordionHeader.setAttribute('aria-expanded', 'false');
            accordionHeader.classList.add('collapsed');
            document.getElementById(controls).classList.remove('show');
        }

    };

    // Deactivate all tabs and tab panels
    function deactivateTabs () {
        for (t = 0; t < accordionHeader.length; t++) {
            accordionHeader[t].setAttribute('aria-selected', 'false');
            accordionHeader[t].classList.remove('active');
        };

        for (p = 0; p < panels.length; p++) {
            panels[p].classList.remove('show');
            panels[p].classList.remove('active');
        };
    };

};