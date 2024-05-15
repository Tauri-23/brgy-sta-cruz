@if ($navType == "landing-page")
    <div class="nav1">
        <div class="nav1-logo">
            <img src="/assets/media/logos/brgy_logo.png" class="position-absolute w-100 h-100" alt="logo">
        </div>
        <div class="nav1-links">
            <a href="/" class="nav1-link {{$activeLink == 1 ? "active" : ""}}">Home</a>
            <a href="/announcementsPublic" class="nav1-link {{$activeLink == 2 ? "active" : ""}}">Announcements</a>
            <a href="/servicesPublic" class="nav1-link {{$activeLink == 3 ? "active" : ""}}">Services</a>
            <a href="/policiesPublic" class="nav1-link {{$activeLink == 4 ? "active" : ""}}">Policies and Ordinances</a>
            <a href="/aboutPublic" class="nav1-link {{$activeLink == 5 ? "active" : ""}}">About</a>
            <a href="/contactPublic" class="nav1-link {{$activeLink == 6 ? "active" : ""}}">Contact</a>
        </div>

        <a href="/signin" class="nav1-link {{$activeLink == 7 ? "active" : ""}}">Signin</a>
    </div>

@elseif($navType == "resident-page")
    <div class="nav1">
        <div class="nav1-logo">
            <img src="/assets/media/logos/brgy_logo.png" class="position-absolute w-100 h-100" alt="logo">
        </div>
        <div class="nav1-links">
            <a href="/ResidentDashboard" class="nav1-link {{$activeLink == 1 ? "active" : ""}}">Home</a>
            <a href="/ResidentAnnouncement" class="nav1-link {{$activeLink == 2 ? "active" : ""}}">Announcements</a>
            <a href="/ResidentDocuments" class="nav1-link {{$activeLink == 3 ? "active" : ""}}">Documents</a>
            <a href="/ResidentServices" class="nav1-link {{$activeLink == 4 ? "active" : ""}}">Services</a>
            <a href="/ResidentAbout" class="nav1-link {{$activeLink == 5 ? "active" : ""}}">About</a>
            <a href="/ResidentContact" class="nav1-link {{$activeLink == 6 ? "active" : ""}}">Contact</a>
        </div>

        <div class="nav1-pfp">
            <img class="position-absolute h-100" src="/assets/media/pfp/{{$pfp}}" alt="">
        </div>
    </div>

@elseif($navType == "admin-page")
    <div class="nav1">
        <div class="nav1-logo">
            <img src="/assets/media/logos/brgy_logo.png" class="position-absolute w-100 h-100" alt="logo">
        </div>
        <div class="nav1-links">
            <a href="/AdminDashboard" class="nav1-link {{$activeLink == 1 ? "active" : ""}}">Home</a>
            <a href="/AdminAnnouncements" class="nav1-link {{$activeLink == 2 ? "active" : ""}}">Announcements</a>
            <a href="/AdminDocuments" class="nav1-link {{$activeLink == 3 ? "active" : ""}}">Documents</a>
            <a href="/AdminResidents" class="nav1-link {{$activeLink == 4 ? "active" : ""}}">Residents</a>
        </div>

        <a class="primary-btn-red1" href="/signout">Sign out</a>
    </div>
@endif