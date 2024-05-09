@if ($navType == "landing-page")
    <div class="nav1">
        <div class="nav1-logo">

        </div>
        <div class="nav1-links">
            <a class="nav1-link {{$activeLink == 1 ? "active" : ""}}">Home</a>
            <a class="nav1-link">Announcements</a>
            <a class="nav1-link">Services</a>
            <a class="nav1-link">Policies and Ordinances</a>
            <a class="nav1-link">About</a>
            <a class="nav1-link">Contact</a>
        </div>

        <div class="nav1-link color-white-2">Signin</div>
    </div>
@else
    
@endif