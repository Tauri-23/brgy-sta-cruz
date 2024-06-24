<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}"/>

        <title>Brgy Sta. Cruz Makati | Admin</title>

        {{-- Icon --}}
        <link rel="icon" href="/assets/media/logos/brgy_logo.png" type="image/x-icon" />

        <!-- Fonts -->

        <!-- Css -->
        <link rel="stylesheet" href="/assets/css/app.css">
        <link rel="stylesheet" href="/assets/css/elements.css">
        <link rel="stylesheet" href="/assets/css/nav.css">
        <link rel="stylesheet" href="/assets/css/footer.css">
        <link rel="stylesheet" href="/assets/css/announcements.css">
        <link rel="stylesheet" href="/assets/css/forms.css">

        {{-- Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        {{-- Jquery --}}
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    </head>
    <body>
        {{-- Modals --}}
        <x-modals modalType="success"/>
        <x-modals modalType="error"/>

        {{-- Navs --}}
        <x-navbar navType="admin-page" activeLink="2" pfp="null"/>

        {{-- Content --}}
        <div class="content1 d-flex flex-direction-y gap1">
            <div class="text-l1 fw-bold text-center">
                Edit Announcement
            </div>

            <div class="w-100 mar-top-1">
                <input class="edit-text-1 w-50" type="text" id="announcement-title-in" placeholder="Announcement Title" value="{{$announcement->title}}"/>
            </div>

            <div class="w-100 mar-top-1">
                <label for="announcement-cover" class="text-m1">Announcement Cover</label><br>
                <input type="file" class="edit-text-1" id="announcement-cover" accept="image/*" name="announcement-cover" placeholder="Announcement Title"/>
            </div>

            <div class="w-100 mar-top-1 d-flex flex-direction-y gap3">
                <div class="d-flex justify-content-between align-items-center" >
                    <div class="text-editor-header">
                        <button type="button" class="btn-text-editor" data-element="bold">
                            <i class="bi bi-type-bold"></i>
                        </button>
                        <button type="button" class="btn-text-editor" data-element="italic">
                            <i class="bi bi-type-italic"></i>
                        </button>
                        <button type="button" class="btn-text-editor" data-element="underline">
                            <i class="bi bi-type-underline"></i>
                        </button>

                        <button type="button" class="btn-text-editor" data-element="insertUnorderedList">
                            <i class="bi bi-list-ul"></i>
                        </button>
                        <button type="button" class="btn-text-editor" data-element="insertOrderedList">
                            <i class="bi bi-list-ol"></i>
                        </button>

                        <button type="button" class="btn-text-editor" data-element="createLink">
                            <i class="bi bi-link-45deg"></i>
                        </button>

                        <button type="button" class="btn-text-editor btn-text-editor-active" data-element="justifyLeft">
                            <i class="bi bi-justify-left"></i>
                        </button>
                        <button type="button" class="btn-text-editor" data-element="justifyCenter">
                            <i class="bi bi-text-center"></i>
                        </button>
                        <button type="button" class="btn-text-editor" data-element="justifyRight">
                            <i class="bi bi-justify-right"></i>
                        </button>
                        <button type="button" class="btn-text-editor" data-element="justifyFull">
                            <i class="bi bi-justify"></i>
                        </button>
                    </div>

                    <div class="d-flex justify-content-end gap3 mar-bottom-1">
                        <input type="checkbox" id="featured-checkbox" {{$announcement->featured ? "checked": ""}}/>
                        <label class="text-m1" for="featured-checkbox">Set as Featured.</label>
                    </div>
                </div>

                <div class="text-editor-content" id="text-editor-content" contenteditable="true">
                    {!! $announcement->content !!}
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <div>
                    <div class="primary-btn-blue1" id="save-announcement">Save</div>
                </div>
            </div>


        </div>

        {{-- footer --}}
        <x-footer/>


    </body>
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/text-editor.js"></script>
    <script>
        const annId = {!! json_encode($announcement->id) !!};
        const oldTitle = {!! json_encode($announcement->title) !!};
        const oldContent = {!! json_encode($announcement->content) !!};
        const oldFeatured = {!! json_encode($announcement->featured) !!};
    </script>
    <script src="/assets/js/announcement.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
