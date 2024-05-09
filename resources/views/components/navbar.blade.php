@if ($navType == "landing-page")
    <div class="nav1">
        <div class="nav1-logo">
            <img src="/assets/media/logos/brgy_logo.png" class="position-absolute w-100 h-100" alt="logo">
        </div>
        <div class="nav1-links">
            <a class="nav1-link {{$activeLink == 1 ? "active" : ""}}">Home</a>
            <a class="nav1-link {{$activeLink == 2 ? "active" : ""}}">Announcements</a>
            <a class="nav1-link {{$activeLink == 3 ? "active" : ""}}">Services</a>
            <a class="nav1-link {{$activeLink == 4 ? "active" : ""}}">Policies and Ordinances</a>
            <a class="nav1-link {{$activeLink == 5 ? "active" : ""}}">About</a>
            <a class="nav1-link {{$activeLink == 6 ? "active" : ""}}">Contact</a>
        </div>

        <div class="nav1-link color-white-2">Signin</div>
    </div>
@else
    
@endif