const sidebarMenu = document.querySelector('#sidebarMenu');
let navItem = sidebarMenu.getElementsByClassName('nav-link');

let commentBadge = document.getElementById('comment-badge');
getNumberUnapprovedComments(commentBadge);

