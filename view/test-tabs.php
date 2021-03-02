<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/header.php';
?>



<!--<ul class="nav nav-tabs" id="myTab" role="tablist">-->
<!--    <li class="nav-item" role="presentation">-->
<!--        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>-->
<!--    </li>-->
<!--    <li class="nav-item" role="presentation">-->
<!--        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>-->
<!--    </li>-->
<!--    <li class="nav-item" role="presentation">-->
<!--        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>-->
<!--    </li>-->
<!--</ul>-->
<!--<div class="tab-content" id="myTabContent">-->
<!--    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">Home</div>-->
<!--    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Profile</div>-->
<!--    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Contact</div>-->
<!--</div>-->


<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
    </div>
</nav>
<div class="tab-content row justify-content-center col-3" id="nav-tabContent">
    <div class="tab-pane col-3 fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">Home</div>
    <div class="tab-pane col-3 fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">Profile
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="check1">
            <label class="form-check-label" for="check1">
                administrator
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="check2">
            <label class="form-check-label" for="check2">
                moderator
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="check3">
            <label class="form-check-label" for="check3">
                registered
            </label>
        </div>
        <button type="button" class="btn btn-dark mb-4">Dark</button>
    </div>
    <div class="tab-pane col-3 fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">Contact</div>
</div>

<script src="/js/tabs.js" ></script>
<script>launchTabs();</script>


<div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="is-banned"></div>