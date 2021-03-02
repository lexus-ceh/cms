/* globals Chart:false, feather:false */

(function () {
  'use strict'

  feather.replace()

})()

const sidebarMenu = document.querySelector('#sidebarMenu');
let navItem = sidebarMenu.getElementsByClassName('nav-link');







function setAllInactive()
{
  const sidebarMenu = document.querySelector('#sidebarMenu');
  let navItem = sidebarMenu.getElementsByClassName('nav-link');
  for (var i = 0; i < navItem.length; i++) {
    navItem[i].classList.remove('active');
  }
}

callbackClickOnItem = function () {
  setAllInactive();
  this.classList.add('active');
  let adminHeader = document.getElementById('adminPanelHeader');
  adminHeader.innerText = this.innerText;
  const content = document.getElementById('admin-content');

  if (this.innerText === 'Менеджер пользователей') {
    drawAllUsers(content);
  }

  if (this.innerText === 'Общие настройки') {
    let tabs = '<nav>\n' +
        '    <div class="nav nav-tabs" id="nav-tab" role="tablist">\n' +
        '        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>\n' +
        '        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>\n' +
        '        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>\n' +
        '    </div>\n' +
        '</nav>\n' +
        '<div class="tab-content" id="nav-tabContent">\n' +
        '    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">Home</div>\n' +
        '    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">Profile</div>\n' +
        '    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">Contact</div>\n' +
        '</div>';
    content.innerHTML = tabs;
  }

}

for (var i = 0; i < navItem.length; i++) {
  navItem[i].onclick = callbackClickOnItem; // addEventListener('click', callbackFunction(), false);
}



// console.log(navItem);
// let navItem = sidebarMenu.getElementsByClassName('nav-link');

// navItem.forEach(item => addEventListener('click', (e) => {
//   alert(e.target.innerText);
// }))

// navItem.addEventListener('click', evt => {
//   evt.preventDefault();
//   alert(evt);
// })

// function navlinkClick(evt)
// {
//   alert(evt.target.innerText);
// }


