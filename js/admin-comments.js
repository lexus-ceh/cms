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
    promise.then(count => (
        commentBadge.innerText = count
    ));
}