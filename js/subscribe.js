function changeSubscription(mode, email = null)
{
    data = {'subscription': mode, 'email': email};
    // console.log(data);

    const promise = $.ajax({
        url: "/api/subscription-change",
        method: "POST",
        data: data,
        dataType: 'json',
    })

    return promise;
}