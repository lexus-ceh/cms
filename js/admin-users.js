function submitUser(userId)
{
    let roles = document.querySelectorAll('.form-check-input');
    // console.log('User ID', ':', userId);
    // roles.forEach(item => {
    //     console.log(item.id, ':', item.checked);
    // });

    data = {'user_id': userId};
    roles.forEach(item => {
        data[item.id] = item.checked;
    });
    // console.log(data);

    const promise = $.ajax({
        url: "/admin/api/user-change",
        method: "POST",
        data: data,
        dataType: 'json',
    })
    promise.then(response => {
        if (response === 'success') {
            drawAllUsers(document.getElementById('admin-content'));
        }
    });

}

function getUser(id)
{
    let promiseUsers = getAllUsers(id);
    let promiseRoles = getAllRoles();
    promiseUsers.then(dataUsers => {
        promiseRoles.then(dataRoles => {
            let adminDisabled = dataUsers[0].name === 'Администратор' ? 'disabled' : '';
            let isBanned = dataUsers[0].is_banned === 1 ? 'checked' : '';
            let userTabs = '<nav>\n' +
                '    <div class="nav nav-tabs" id="nav-tab" role="tablist">\n' +
                '        <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="true">Профиль пользователя</button>\n' +
                '        <button class="nav-link" id="nav-roles-tab" data-bs-toggle="tab" data-bs-target="#nav-roles" type="button" role="tab" aria-controls="nav-roles" aria-selected="false">Роли пользователя</button>\n' +
                '    </div>\n' +
                '</nav>\n' +
                '<div class="tab-content" id="nav-tabContent">\n' +
                '    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">' +
                '    <img src="' + dataUsers[0].avatar + '" height="200" alt="Avatar" class="my-3">' +
                '    <table class="table table-borderless">\n' +
                '       <tbody>' +
                '         <tr><th>Имя:</th><td>' + dataUsers[0].name + '</td></tr>' +
                '         <tr><th>Email:</th><td>' + dataUsers[0].email + '</td></tr>' +
                '         <tr><th>Пароль:</th><td>' + dataUsers[0].password + '</td></tr>' +
                '         <tr><th>О себе:</th><td>' + dataUsers[0].about + '</td></tr>' +
                '           <tr><th>Заблокирован:</th><td>Нет<div class="form-check form-switch d-inline-flex mx-2"><input class="form-check-input" type="checkbox" id="is-banned"' + adminDisabled + ' ' + isBanned + '></div>Да</td></tr>' +
                '       </tbody>' +
                '     </table>' +
                '     <button type="button" id="save-user-change" class="btn btn-dark mb-2" onclick="submitUser(' + dataUsers[0].id + ')" >Сохранить</button>' +
                '     </div>\n' +
                '    <div class="tab-pane fade" id="nav-roles" role="tabpanel" aria-labelledby="nav-roles-tab">';
            dataRoles.forEach(role => {
                let userRoleChecked = (dataUsers[0].role != null && dataUsers[0].role.includes(role.name)) ? 'checked' : '';
                let userDisabled = (dataUsers[0].name === 'Администратор' && role.name === 'administrator') ? 'disabled' : '';
                userTabs += '<div class="form-check">\n' +
                    '         <input class="form-check-input" type="checkbox" value="" id="role_' + role.id + '"' + userRoleChecked + ' ' + userDisabled + '>\n' +
                    '         <label class="form-check-label" for="check' + role.id + '">' + role.name + ' -- ' + role.description + '\n' +
                    '         </label>' +
                    '       </div>';
            });
            userTabs += '<button type="button" id="save-user-change" class="btn btn-dark mb-2" onclick="submitUser(' + dataUsers[0].id + ')" >Сохранить</button>' +
                '     </div>\n' +
                '</div>';
            const content = document.getElementById('admin-content');
            content.innerHTML = userTabs;
            launchTabs();
        });
    });
}

function getAllRoles()
{
    const promise = $.ajax({
        url: "/admin/api/roles",
        method: "POST",
        dataType: 'json',
    })
    return promise;
}

function getAllUsers(id)
{
    let data = {'id' : id};
    const promise = $.ajax({
        url: "/admin/api/users",
        method: "POST",
        data: data,
        dataType: 'json',
        // contentType: "application/json; charset=utf-8",
        // contentType: false,
        // processData: false,
    })
    return promise;
}

function drawAllUsers(content) {
    let promise = getAllUsers(0);
    promise.then(data => {

        let userTable = '<table id="table-users" class="table table-hover">\n' +
            '                    <thead>\n' +
            '                    <tr>\n' +
            '                        <th scope="col">id</th>\n' +
            '                        <th scope="col">Name</th>\n' +
            '                        <th scope="col">Email</th>\n' +
            '                        <th scope="col">Role</th>\n' +
            '                        <th scope="col">Is Banned?</th>\n' +
            '                    </tr>\n' +
            '                    </thead>\n' +
            '                    <tbody>';
        data.forEach(item => {
            let isBanned = item.is_banned === 1 ? 'Yes' : 'No';
            userTable += '<tr onclick="getUser(' + item.id + ')">\n' +
                '                        <th scope="row">' + item.id + '</th>\n' +
                '                        <td>' + item.name + '</td>\n' +
                '                        <td>' + item.email + '</td>\n' +
                '                        <td>' + item.role + '</td>\n' +
                '                        <td>' + isBanned + '</td>\n' +
                '                    </tr>';
        });
        userTable += '</tbody>\n' +
            '                </table>';
        content.innerHTML = userTable;
    });
}