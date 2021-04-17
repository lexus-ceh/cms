// https://www.w3.org/TR/wai-aria-practices/examples/tabs/tabs-1/js/tabs.js

function approveComment(commentId)
{
    data = {'comment_id': commentId};

    const promise = $.ajax({
        url: "/admin/api/approve-comment",
        method: "POST",
        data: data,
        dataType: 'json',
    })
    promise.then(response => {
        if (response === 'success') {
            document.location.reload();
        }
    });

}

function deleteComment(commentId)
{
    data = {'comment_id': commentId};

    const promise = $.ajax({
        url: "/admin/api/delete-comment",
        method: "POST",
        data: data,
        dataType: 'json',
    })
    promise.then(response => {
        if (response === 'success') {
            document.location.reload();
        }
    });
}

function launchAccording() {
    // var accordionlist = document.querySelectorAll('[role="tablist"]')[0];
    let accordionHeader;
    let accordionText;

    generateArrays();

    function generateArrays () {
        accordionHeader = document.querySelectorAll('.accordion-button');
        accordionText = document.querySelectorAll('.accordion-collapse');
    }


    // Bind listeners
    for (let i = 0; i < accordionHeader.length; ++i) {
        addListeners(i);
    }

    function addListeners (index) {
        accordionHeader[index].addEventListener('click', clickEventListener);

        // Build an array with all tabs (<button>s) in it
        accordionHeader[index].index = index;
    }

    // When a tab is clicked, activateTab is fired to activate it
    function clickEventListener (event) {
        let accordionHeader = event.target;
        activateAccordion(accordionHeader);
    }


    // Activates any given tab panel
    function activateAccordion (accordionHeader) {

        // Deactivate all other tabs
        // deactivateAccordion();

        let controls = accordionHeader.getAttribute('aria-controls');

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

    }

}