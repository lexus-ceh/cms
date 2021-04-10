function drawComments(content, isNotModerated = 1)
{
    let promise = $.ajax({
        url: "/admin/api/comments",
        method: "POST",
        data: {'type': isNotModerated},
        dataType: 'json',
    }).then(data => (
        console.log(data)
    ));
}

function getNumberUnapprovedComments(commentBadge)
{
    let promise = $.ajax({
        url: "/admin/api/num-comments",
        method: "POST",
    });
    promise.then(count => {
        if (Number(count) > 0) {
            commentBadge.innerText = count;
        }
    });
    // promise.then(count => (
    //     console.log(count)
    //     commentBadge.innerText = count
    // ));
}