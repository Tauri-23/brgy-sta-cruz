<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}"/>

        <title>Brgy Sta. Cruz Makati</title>

        {{-- Icon --}}
        <link rel="icon" href="/assets/media/logos/brgy_logo.png" type="image/x-icon" />

        <!-- Fonts -->

        <!-- Css -->
        <link rel="stylesheet" href="/assets/css/app.css">
        <link rel="stylesheet" href="/assets/css/elements.css">
        <link rel="stylesheet" href="/assets/css/nav.css">
        <link rel="stylesheet" href="/assets/css/footer.css">
        <link rel="stylesheet" href="/assets/css/landing-page.css">

        {{-- Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        {{-- Jquery --}}
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    </head>
    <body>
        {{-- modals --}}
        <x-modals modalType="success"/>
        <x-modals modalType="error"/>

        {{-- Navs --}}
        <x-navbar navType="resident-page" activeLink="6" pfp="{{$resident->pfp}}"/>
        <x-nav_small_option/>

        {{-- Content --}}
        <div class="d-flex flex-direction-y gap1">
            <div class="banner-cont">

                <div class="about-us-banner-text-cont">
                    <div class="d-flex justify-content-center position-relative">
                        <img src="/assets/media/logos/brgy_logo.png" style="width: 100px; height: 100px; border-radius: 100%;" alt="">
                    </div>
                    <div class="text-xl2 color-white text-center">Welcome to Barangay Santa Cruz!</div>
                    <div class="text-l3 color-white text-center">
                        Barangay Sta. Cruz is predominantly classified as a residential area until the year 2000 when small and medium-sized businesses 
                        began to be located in the barangay. Barangay Sta. Cruz is within the jurisdiction of the First District of Makati and inclusive 
                        in the Cluster 3 or the Northwest Cluster. The Barangay is a 10-minute drive from the Makati Central Business District. Prominent 
                        landmarks such as Makati Medical Center, Makati Central Fire Station and the Makati Central Police Station which are accessible by foot. 
                        Strategically located businesses, more particularly at the corner of Pasong Tamo and Vito Cruz Street, are supermarket, food chains and alike. 
                        Found in the community are various religious and educational institutions, notable the soon to rise the home of Mapua Institute of Technology, 
                        one of the leading universities in the country. Barangay Sta. Cruz has no wet market, however its proximity to Tejeros and Olympia that has wet markets, 
                        are also accessible by foot and public conveniences such as jeepneys or tricycles.
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="/assets/media/home-cover/brgy_hall.png" class='banners'>
                </div>
                <div class="mySlides fade">
                    <img src="/assets/media/home-cover/2.jpg" class='banners'>
                </div>
                <div class="mySlides fade">
                    <img src="/assets/media/home-cover/3.jpg" class='banners'>
                </div>
            </div>

            <div class="content2 d-flex gap1">
                <div class="long-cont w-50 d-flex flex-direction-y gap1">
                    <div class="text-xl3 bg-blue3 color-white-2 text-center">MISSION</div>
                    <div class="text-l3 text-center">
                        We envision Barangay Santa Cruz to be a disaster resilient, healthy, peace loving community with aspirations centered in the trust in God, 
                        whose officials and citizens have great value for education and cultural heritage and working together for the economic uplifment of a 
                        just and humane society.
                    </div>
                </div>
                <div class="long-cont w-50 d-flex flex-direction-y gap1">
                    <div class="text-xl3 bg-blue3 color-white-2 text-center">VISION</div>
                    <div class="text-l3 text-center">
                        Guided by its Vision, Barangay Santa Cruz will continue to endeavor towards disaster preparedness, 
                        generate opportunities for economic improvement, continue to instill appreciation for education and culture 
                        and deliver other necessary services for its constituents.
                    </div>
                </div>
            </div>



            <div class="content2">
                <div class="d-flex flex-direction-y">
                    <div class="text-xl3 bg-blue3 color-white-2 mar-bottom-1 text-center">BARANGAY OFFICIALS</div>

                    <div class="d-flex gap3">
                        <div class="d-flex w-100 centered-ofc gap3">
                            <div class="d-flex flex-direction-y align-items-center" style="padding: 50px">
                                <img src="/assets/media/icons/official_icon.png" style="width: 100px; height: 100px;">
                                <div class="text-l3 text-center">Kit H. Taguiang</div>
                                <div class="text-m3 text-center">Punong Barangay - Peace & Order</div>
                            </div>
                        </div>

                        <div class="d-flex w-100 centered-ofc gap3">
                            <div class="d-flex flex-direction-y align-items-center" style="padding: 50px">
                                <img src="/assets/media/icons/official_icon.png" style="width: 100px; height: 100px;">
                                <div class="text-l3 text-center">Enrico S. Evangelista</div>
                                <div class="text-m3 text-center">Kagawad - Finance, Social Service, Infrastracture</div>
                            </div>
                        </div>
                        <div class="d-flex w-100 centered-ofc gap3">
                            <div class="d-flex flex-direction-y align-items-center" style="padding: 50px">
                                <img src="/assets/media/icons/official_icon.png" style="width: 100px; height: 100px;">
                                <div class="text-l3 text-center">John Yland M. De Ocampo</div>
                                <div class="text-m3 text-center">Kagawad - Livelihood</div>
                            </div>
                        </div>
                        <div class="d-flex w-100 centered-ofc gap3">
                            <div class="d-flex flex-direction-y align-items-center" style="padding: 50px">
                                <img src="/assets/media/icons/official_icon.png" style="width: 100px; height: 100px;">
                                <div class="text-l3 text-center">Maria Katrina P. Alicando</div>
                                <div class="text-m3 text-center">Kagawad - Health and Sanitation</div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap3">
                        <div class="d-flex w-100 centered-ofc gap3">
                            <div class="d-flex flex-direction-y align-items-center" style="padding: 50px">
                                <img src="/assets/media/icons/official_icon.png" style="width: 100px; height: 100px;">
                                <div class="text-l3 text-center">Noel Elijah Salega</div>
                                <div class="text-m3 text-center">Kagawad - Education and Culture</div>
                            </div>
                        </div>

                        <div class="d-flex w-100 centered-ofc gap3">
                            <div class="d-flex flex-direction-y align-items-center" style="padding: 50px">
                                <img src="/assets/media/icons/official_icon.png" style="width: 100px; height: 100px;">
                                <div class="text-l3 text-center">Flordeliza R. Ambrosio</div>
                                <div class="text-m3 text-center">Kagawad - BDRRM</div>
                            </div>
                        </div>
                        <div class="d-flex w-100 centered-ofc gap3">
                            <div class="d-flex flex-direction-y align-items-center" style="padding: 50px">
                                <img src="/assets/media/icons/official_icon.png" style="width: 100px; height: 100px;">
                                <div class="text-l3 text-center">Liza Flor G. Castor</div>
                                <div class="text-m3 text-center">Kagawad - Clean and Green</div>
                            </div>
                        </div>
                        <div class="d-flex w-100 centered-ofc gap3">
                            <div class="d-flex flex-direction-y align-items-center" style="padding: 50px">
                                <img src="/assets/media/icons/official_icon.png" style="width: 100px; height: 100px;">
                                <div class="text-l3 text-center">Nilo Jann Basada</div>
                                <div class="text-m3 text-center">Kagawad - BADAC, Waste and Means and Co-Chairman Livelihood</div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-ofc justify-content-center">
                        <div class="d-flex gap3">
                            <div class="d-flex flex-direction-y align-items-center" style="padding: 50px">
                                <img src="/assets/media/icons/official_icon.png" style="width: 100px; height: 100px;">
                                <div class="text-l3 text-center">Ma. Victoria S. Abergos</div>
                                <div class="text-m3 text-center">Treasurer</div>
                            </div>
                        </div>

                        <div class="d-flex gap3">
                            <div class="d-flex flex-direction-y align-items-center" style="padding: 50px">
                                <img src="/assets/media/icons/official_icon.png" style="width: 100px; height: 100px;">
                                <div class="text-l3 text-center">Bayani G. Olegario</div>
                                <div class="text-m3 text-center">Secretary</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="content2">
                <div class="long-cont d-flex flex-direction-y gap1">
                    <div class="text-xl3 bg-yellow1 color-white-2 text-center">HISTORY
                    </div>
                    <div class="text-l3 text-justify">                        
                        Barangay Sta. Cruz was formerly a part of Brgy. Olympia and was known as Sitio Paltok (a higher place). 
                        This place was once a vast rice field that most of its early inhabitants were farmers. 
                        Although Paltok was a sitio of Olympia, it has its own "Tinyente del Barrio" in the person of Mr. Bayani Robles. 
                        On June 20, 1959, Republic Act 2370 otherwise known as the Barrio Charter Act was passed by Congress. 
                        The following year, Barangay Olympia held its first barrio election and Mr. Bayani Robles was elected Barrio Lieutenant and Mr. Marcelo Angeles as Vice Barrio Lieutenant. 
                        Banking on Article II Section 3 of the Revised Barrio Charter, then incumbent Vice Barrio Lieutenant Marcelo Angeles, together with some leaders of Sitio Sta Cruz, appealed to then Mayor Maximo Estrella to make Sitio Sta Cruz an independent barrio. 
                        The appeal was recognized and approved in 1964 by the Municipal Council and finally, by the Provincial Board of Rizal. Mr. Marcelo Angeles became the first elected Barrio Captain from 1964 to 1972. He was succeeded by Morita Estrella from 1972 to 1976. 
                        Amado Aluquin followed him until his son, Arthur, took over in 1982. Mr. Severino 0. Victorino took over the reign as Barangay Captain in 1986 until 2002 which made him the longest serving Barangay Captain of Sta Cruz. 
                        Due to health concerns and old age, Barangay Captain Victorino opted not to run in the 2002 Barangay and SK Elections. It was won by Victor P. Del Prado who served for two (2) terms until 2010. 
                        In the following barangay elections, his opponent First Kagawad Virginia V. Salenga won by a slim margin of 68 votes. An election protest was filed by Mr. Del Prado but Ms. Salenga won in the Municipal Court. 
                        However, the decision was reversed by the COMELEC. Thus, Del Prado was proclaimed winner of the 2010 Barangay and SK Elections and affirmed by the Supreme Court in 2013. In the election of the same year, Ms. Salenga emerged victorious winning against Enrico Evangelista. 
                        She assumed office on December 1, 2013 and replicated her win in the October 2018 Barangay and SK Elections.
                    </div>
                </div>
            </div>
        </div>



        
        

        {{-- footer --}}
        <x-footer/>

        
    </body>
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/landing-page.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
