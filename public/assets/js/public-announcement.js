// Inputs
const searchIn = $('#search-in');
const sortIn = $('#sort-in');

// Containers
const announcementCont = $('#announcement-cont');
const resultAnnouncementCont = $('#result-announcement-cont');

searchIn.on('input',function() {
    let value = $(this).val().toLowerCase();

    if(isEmptyOrSpaces(value)) {
        announcementCont.removeClass('d-none');
        resultAnnouncementCont.addClass('d-none');
    }
    else {
        announcementCont.addClass('d-none');
        resultAnnouncementCont.removeClass('d-none');
        processSearch(value);
    }
});

sortIn.change(function() {
    const value = $(this).val();

    if(value == "old-new") {
        announcementCont.addClass('d-none');
        resultAnnouncementCont.removeClass('d-none');
        processSort(value)
    }
    else {
        announcementCont.removeClass('d-none');
        resultAnnouncementCont.addClass('d-none');
    }
})


// Functions render
function processSearch(value) {
    const filteredAnnouncement = announcements.filter(ann => ann.title.toLowerCase().includes(value));

    console.log(filteredAnnouncement);
    
    resultAnnouncementCont.html('');

    if(filteredAnnouncement.length > 0) {
        filteredAnnouncement.forEach(function(element) {
            let featuredBadge = element.featured ? '<span class="badge mar-start-4 bg-yellow1">Featured</span>' : '';
            let createdAtFormatted = moment(element.created_at).format('MMM D, YYYY h:mm a');
            
            let content = `
                <a href="/publicViewAnnouncement/${element.id}" class="announcement-cont d-flex gap1 announcement-column text-decoration-none color-black">
                    <div class="pic-square1 d-flex justify-content-center">
                        <img class="position-absolute h-100" src="/assets/media/announcement/${element.pic}" />
                    </div>

                    <div class="announcement-prev-text">
                        <div>
                            <small class="text-l3 fw-bold">${element.title}</small>
                            ${featuredBadge}
                            <div class="text-m3">${createdAtFormatted}</div>
                        </div>
                        <div class="announcement-prev-content text-m2">${element.content}</div>
                    </div>
                </a>
            `;

            resultAnnouncementCont.append(content);
        });
    }
    else {
        resultAnnouncementCont.append(`
        No Result
        `);
    }

    
}

function processSort() {
    // Sort the announcements by created_at in ascending order (oldest to newest)
    const sortedAnnouncements = announcements.sort((a, b) => {
        return new Date(a.created_at) - new Date(b.created_at);
    });

    // Clear the previous content
    resultAnnouncementCont.html('');

    // Append the sorted announcements to the container
    sortedAnnouncements.forEach(function(element) {
        let featuredBadge = element.featured ? '<span class="badge mar-start-4 bg-yellow1">Featured</span>' : '';
        let createdAtFormatted = moment(element.created_at).format('MMM D, YYYY h:mm a');
        
        let content = `
            <a href="/publicViewAnnouncement/${element.id}" class="announcement-cont d-flex gap1 announcement-column text-decoration-none color-black">
                <div class="pic-square1 d-flex justify-content-center">
                    <img class="position-absolute h-100" src="/assets/media/announcement/${element.pic}" />
                </div>

                <div class="announcement-prev-text">
                    <div>
                        <small class="text-l3 fw-bold">${element.title}</small>
                        ${featuredBadge}
                        <div class="text-m3">${createdAtFormatted}</div>
                    </div>
                    <div class="announcement-prev-content text-m2">${element.content}</div>
                </div>
            </a>
        `;

        resultAnnouncementCont.append(content);
    });
}