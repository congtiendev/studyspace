<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Snap Study</title>
    <link rel="icon" type="/assets/default/image/x-icon"
        href="/assets/default//assets/default/image/icons/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@400;500;600;700&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    

    <link rel="stylesheet" href="/assets/default/css/global.css">
</head>

<body>
    <!-- Navigation Bar -->
    z
    <?php if(!empty($authUser)): ?>
        <nav class="w-100 navbar navbar-expand navbar-light bg-light fixed-top border-bottom">


            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="#">
                    <img src="/assets/default/image/snaps-logo.png" alt="Logo" />
                </a>
                <?php echo $__env->make('web.default.includes.top_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </nav>
    <?php else: ?>
        <nav class="w-100 navbar navbar-expand navbar-light bg-light fixed-top border-bottom">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="#">
                    <img src="/assets/default/image/snaps-logo.png" alt="Logo" />
                </a>

                <form class="d-flex flex-lg-row align-items-lg-center">
                    <a href="/login" class="btn px-4 text-button">Login</a>
                </form>
            </div>
        </nav>
    <?php endif; ?>


    <!-- Hero Section with Carousel -->
    <section id="hero-section" class="w-100">
        <div id="hero-banner" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#hero-banner" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#hero-banner" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#hero-banner" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div id="gallery" class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/assets/default/image/hero-banner-1.jpeg" class="d-block w-100" alt="hero-banner-1" />
                </div>
                <!-- <div class="carousel-item">
                    <img src="/assets/default/image/hero-banner-2.jpeg" class="d-block w-100" alt="hero-banner-3" />
                </div>
                -->
                <div class="carousel-item">
                    <img src="/assets/default/image/hero-banner-3.jpg" class="d-block w-100" alt="hero-banner-3" />
                </div>
            </div>
            <button class="carousel-control-prev" style="width: 6%" type="button" data-bs-target="#hero-banner"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" style="width: 6%" type="button" data-bs-target="#hero-banner"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <div class="row">
        <div class="col-12 col-md-9">
            <!-- Search Document -->
            <section id="search-section"
                class="d-flex flex-column justify-content-center align-items-center mt-5 pt-md-5 pb-md-4">
                <div class="container col-lg-6 col-md-9">
                    <form action="/search" method="get">
                        <div class="input-group mb-5 d-flex justify-content-center align-items-center bordered-group">
                            <input type="text" name="search" class="form-control borderless-input"
                                placeholder="Search document..." aria-label="Search" />
                            <button class="btn btn-danger px-4 rounded-btn" type="submit">
                                Search
                            </button>
                        </div>
                    </form>
                </div>
                <h3 class="mt-md-4 mb-4">Search for outlines that fit your major</h3>
                <div class="container major-wrapper d-flex justify-content-center">
                    <ul class="row">
                        <li class="col-lg-3 col-md-4">
                            <a href="/classes?schoolOptions%5B%5D=Business-Foundation">
                                <img src="/assets/default/image/icons/icon-1.png" alt="icon-1"
                                    class="img-fluid img-thumbnail major-icon" />
                                <span>Business - Foundation</span>
                            </a>
                        </li>
                        <li class="col-lg-3 col-md-4">
                            <a href="/classes?schoolOptions%5B%5D=Digital+Marketing">
                                <img src="/assets/default/image/icons/icon-1.png" alt=""
                                    class="img-fluid img-thumbnail major-icon" />
                                <span>Digital - Marketing</span>
                            </a>
                        </li>
                        <li class="col-lg-3 col-md-4">
                            <a href="/classes?schoolOptions%5B%5D=Professional+Communication">
                                <img src="/assets/default/image/icons/icon-1.png" alt=""
                                    class="img-fluid img-thumbnail major-icon" />
                                <span>Professional - Communication</span>
                            </a>
                        </li>
                        <li class="col-lg-3 col-md-4">
                            <a href="/classes?schoolOptions%5B%5D=Economics+-+Finance">
                                <img src="/assets/default/image/icons/icon-1.png" alt=""
                                    class="img-fluid img-thumbnail major-icon" />
                                <span>Economics - Finance</span>
                            </a>
                        </li>
                        <li class="col-lg-3 col-md-4">
                            <a href="/classes?schoolOptions%5B%5D=Logistics+and+Supply+Chain">
                                <img src="/assets/default/image/icons/icon-1.png" alt=""
                                    class="img-fluid img-thumbnail major-icon" />
                                <span>Logistics - Supply Chain</span>
                            </a>
                        </li>
                        <li class="col-lg-3 col-md-4">
                            <a href="/classes?schoolOptions%5B%5D=People+%26+Organisation">
                                <img src="/assets/default/image/icons/icon-1.png" alt=""
                                    class="img-fluid img-thumbnail major-icon" />
                                <span>People - Organisation</span>
                            </a>
                        </li>
                        <li class="col-lg-3 col-md-4">
                            <a href="/classes?schoolOptions%5B%5D=Global-Business">
                                <img src="/assets/default/image/icons/icon-1.png" alt=""
                                    class="img-fluid img-thumbnail major-icon" />
                                <span>Global - Business</span>
                            </a>
                        </li>
                        <li class="col-lg-3 col-md-4">
                            <a href="/classes?schoolOptions%5B%5D=Management+%26+Change">
                                <img src="/assets/default/image/icons/icon-1.png" alt=""
                                    class="img-fluid img-thumbnail major-icon" />
                                <span>Management - Change</span>
                            </a>
                        </li>
                        
                        <li class="col-lg-3 col-md-4">
                            <a href="">
                                <img src="/assets/default/image/icons/icon-1.png" alt=""
                                    class="img-fluid img-thumbnail major-icon" />
                                <span>Digital Film - Video</span>
                            </a>
                        </li>
                        <li class="col-lg-3 col-md-4">
                            <a href="classes?schoolOptions%5B%5D=Fashion+Enterprise">
                                <img src="/assets/default/image/icons/icon-1.png" alt=""
                                    class="img-fluid img-thumbnail major-icon" />
                                <span>Fashion - Enterprise</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>

            <!-- Stats    -->
            <section id="stats" class="d-flex flex-column align-items-center">
                <div class="container">
                    <h3 class="mt-3 mb-5 px-3">
                        We have solutions for all your assessments and test questions
                    </h3>
                    <div class="row justify-content-center">
                        <div class="col-md-3 col-sm-12">
                            <div class="container">
                                <h2>1200+</h2>
                                <h4>Assessments</h4>
                                <p>
                                    We have access to all assessment details and test questions of
                                    your chosen courses
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 mt-4 mt-md-0">
                            <div class="container">
                                <h2>1500+</h2>
                                <h4>Outlines</h4>
                                <p>
                                    Unlock your assignments with the most detailed and comprehensive
                                    instructions
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 mt-4 mt-md-0">
                            <div class="container">
                                <h2>50+</h2>
                                <h4>Experts</h4>
                                <p>
                                    All the Outlines are proofreaded by our experts to ensure you a
                                    high score
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 mt-4 mt-md-0">
                            <div class="container-fluid">
                                <h2>70%</h2>
                                <h4>Time Saved</h4>
                                <p>Save your time to 70% and Boost your Efficiency to 180%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-12 col-md-3 d-md-block d-none mt-5">
            <div class="">
                <img src="/assets/default/image/banner1.jpg" alt="">
            </div>
            <div class="">
                <img src="/assets/default/image/banner2.jpg" alt="">
            </div>
        </div>
    </div>

    <!-- Upcoming -->
    <section id="upcoming">
        <h3 class="my-5">
            JUMPSTART YOUR SUCCESS<br />FOR THE UPCOMING ASSIGNMENT
        </h3>

        <div class="container mt-5 p-0">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item ms-3 ms-md-0" role="presentation">
                    <button class="nav-link active" id="pills-digital-marketing-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-digital-marketing" type="button" role="tab" aria-controls="tab1"
                        aria-selected="true">
                        Digital Marketing
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-professional-communication" type="button" role="tab"
                        aria-controls="tab2" aria-selected="false">
                        Professional Communication
                    </button>
                </li>
                <li class="nav-item me-3 me-md-0" role="presentation">
                    <button class="nav-link" id="pills-digital-film-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-digital-film" type="button" role="tab" aria-controls="tab2"
                        aria-selected="false">
                        Digital Film and Video
                    </button>
                </li>
                <li class="nav-item me-3 me-md-0" role="presentation">
                    <button class="nav-link" id="pills-digital-economics-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-digital-economics" type="button" role="tab" aria-controls="tab2"
                        aria-selected="false">
                        Economics - Finance
                    </button>
                </li>
                <li class="nav-item me-3 me-md-0" role="presentation">
                    <button class="nav-link" id="pills-global-film-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-global-film" type="button" role="tab" aria-controls="tab2"
                        aria-selected="false">
                        Global Business
                    </button>
                </li>
                <li class="nav-item me-3 me-md-0" role="presentation">
                    <button class="nav-link" id="pills-digital-logistics-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-digital-logistics" type="button" role="tab" aria-controls="tab2"
                        aria-selected="false">
                        Logistics & Supply Chain
                    </button>
                </li>
                <li class="nav-item me-3 me-md-0" role="presentation">
                    <button class="nav-link" id="pills-business-logistics-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-business-logistics" type="button" role="tab"
                        aria-controls="tab2" aria-selected="false">
                        Business Foundations
                    </button>
                </li>
                <li class="nav-item me-3 me-md-0" role="presentation">
                    <button class="nav-link" id="pills-business-management-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-business-management" type="button" role="tab"
                        aria-controls="tab2" aria-selected="false">
                        Management and Change
                    </button>
                </li>
                <li class="nav-item me-3 me-md-0" role="presentation">
                    <button class="nav-link" id="pills-organisation-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-organisation" type="button" role="tab" aria-controls="tab2"
                        aria-selected="false">
                        People and Organisation
                    </button>
                </li>
                <li class="nav-item me-3 me-md-0" role="presentation">
                    <button class="nav-link" id="pills-digital-fashion-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-digital-fashion" type="button" role="tab" aria-controls="tab2"
                        aria-selected="false">
                        Fashion Enterprise
                    </button>
                </li>
                <!-- Repeat for tabs 3, 4, 5 -->
            </ul>

            <!-- Tab panes -->
            <div class="tab-content px-3 px-md-0" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-digital-marketing" role="tabpanel"
                    aria-labelledby="pills-digital-marketing-tab" tabindex="0">
                    <h4 class="my-3">DIGITAL MARKETING COMMUNICATION</h4>
                    <p>
                        Identify and analyse the internal and external factors that marketers of your chosen brand
                        have used to influence their target consumers. You need to recommend marketing strategies
                        and tactics to improve the consumer behaviour and experience based on the concepts and
                        theories learned in the course.
                    </p>
                    <div class="row justify-content-between">
                        <div class="col-12 col-md-6 d-flex flex-column justify-content-center my-4 my-md-0">
                            <div class="d-flex flex-row mb-4">
                                <img src="/assets/default/image/girl.jfif" alt="avatar"
                                    class="rounded-circle avatar" />
                                <div class="ms-3 text-comment-mj">
                                    <p class="comment">
                                        "Big thanks to SNAPS for this guideline! Your insights and guidance have been
                                        invaluable. You've helped me save a lot of timeee :> "
                                    </p>
                                    <p class="comment-author">- Trang Nguyen -</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <img src="/assets/default/image/girl.jfif" alt="avatar"
                                    class="rounded-circle avatar" />
                                <div class="ms-3 text-comment-mj">
                                    <p class="comment mb-1">
                                        “Bài này hay lắm ý cám ơn SNAPS nhiều, thực sự bớt lost hơn rất nhiềuuuu"
                                    </p>
                                    <p class="comment-author">- Quynh Nguyen -</p>
                                </div>
                            </div>
                        </div>
                        <!--              <div class="col-1"></div>-->
                        <div class="col-12 col-md-5 col-lg-4">
                            <a href="https://snapstudy.edu.vn/course/consumer-psychology-and-behaviour---asm-3-9lYja">
                                <div class="rounded-3 doc-wrapper">
                                    <img src="/assets/default/image/doc-avt.png" alt="doc-avt" />
                                    <div class="px-4 py-2 mt-2" style="height: fit-content">
                                        <h5>RMIT University</h5>
                                        <h4>Assignment 3: Powerpoint Presentation</h4>
                                        <p>
                                            Identify and analyse the internal and external factors that marketers of
                                            your chosen brand have used to influence their target consumers. You need to
                                            recommend marketing strategies and tactics to improve the consumer behaviour
                                            and experience based on the concepts and theories learned in the course.
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="tab-pane fade" id="pills-professional-communication" role="tabpanel"
                    aria-labelledby="pills-professional-communication-tab" tabindex="0">

                    <h4 class="my-3">ASIAN MEDIA & COMMUNICATION</h4>
                    <p>
                        Students should be prepared to undertake independent, academic research and demonstrate
                        their
                        ability to discuss the chosen prompt in the white paper. Students will be assessed on their
                        ability to formulate an argument, as well as research, analyze, express and develop their
                        ideas
                        to address the argument. Students will also be assessed on their ability to apply relevant
                        concepts and theories from the course to critically analyze the chosen prompt, and to select
                        and
                        use appropriate peer reviewed sources. Consider reviewing Module 4 Assignment 3.pdf for
                        further
                        information and suggested structure and format.
                    </p>
                    <div class="row justify-content-between">
                        <div class="col-12 col-md-6 d-flex flex-column justify-content-center my-4 my-md-0">
                            <div class="d-flex flex-row mb-4">
                                <img src="/assets/default/image/girl.jfif" alt="avatar"
                                    class="rounded-circle avatar" />
                                <div class="ms-3 text-comment-mj" style="width:500px">
                                    <p class="comment">
                                        "As a university student, I often struggle with articulating my thoughts in
                                        a
                                        logical structure. This app not only offers me an overall structure but also
                                        suggests a bunch of insightful ideas that helped me save a lot of time."
                                    </p>
                                    <p class="comment-author">- Phuong Tran -</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <img src="/assets/default/image/girl.jfif" alt="avatar"
                                    class="rounded-circle avatar" />
                                <div class="ms-3 text-comment-mj">
                                    <p class="comment mb-1">
                                        "In the midst of my panic about my university essay, this website provided
                                        me
                                        with detailed instructions and fantastic ideas.”
                                    </p>
                                    <p class="comment-author">- Phong Nguyen -</p>
                                </div>
                            </div>
                        </div>
                        <!--              <div class="col-1"></div>-->
                        <div class="col-12 col-md-5 col-lg-4">
                            <a href="">
                                <div class="rounded-3 doc-wrapper">
                                    <img src="/assets/default/image/doc-avt.png" alt="doc-avt" />
                                    <div class="px-4 py-2 mt-2" style="height: fit-content">
                                        <h4>Assignment 3: Individual Essay</h4>
                                        <h5>RMIT University</h5>
                                        <p>
                                            Students should be prepared to undertake independent, academic research and
                                            demonstrate their ability to discuss the chosen prompt in the white paper.
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="tab-pane fade" id="pills-digital-film" role="tabpanel"
                    aria-labelledby="pills-digital-film-tab" tabindex="0">
                    <h4 class="my-3">FINANCIAL MARKET & INSTITUTIONS</h4>
                    <p>
                        Write a 2500-word report including a 2000-word research paper to identify and examine an
                        important issue in bond, equity, or derivatives markets. And a 500-word reflection on
                        Industry talk.
                    </p>
                    <div class="row justify-content-between">
                        <div class="col-12 col-md-6 d-flex flex-column justify-content-center my-4 my-md-0">
                            <div class="d-flex flex-row mb-4">
                                <img src="/assets/default/image/girl.jfif" alt="avatar"
                                    class="rounded-circle avatar" />
                                <div class="ms-3 text-comment-mj">
                                    <p class="comment">
                                        "I was drowning in economic theories for my assignment until I found this
                                        website. It not only clarified concepts but also provided examples that made
                                        my finance assignment a breeze."
                                    </p>
                                    <p class="comment-author">- Long Vu -</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <img src="/assets/default/image/girl.jfif" alt="avatar"
                                    class="rounded-circle avatar" />
                                <div class="ms-3 text-comment-mj">
                                    <p class="comment mb-1">
                                        Bài này lắm theories mà nặng academic article, mình thực sự kiểu lost khi
                                        mới đọc đề bài và start làm á. Có SNAPS là life saver
                                    <p class="comment-author">- Hieu Ngo -</p>
                                </div>
                            </div>
                        </div>
                        <!--              <div class="col-1"></div>-->
                        <div class="col-12 col-md-5 col-lg-4">
                            <a href="https://snapstudy.edu.vn/course/Financial_market_and_Institution">
                                <div class="rounded-3 doc-wrapper">
                                    <img src="/assets/default/image/doc-avt.png" alt="doc-avt" />
                                    <div class="px-4 py-2 mt-2" style="height: fit-content">
                                        <h5>RMIT University</h5>
                                        <h4>Assignment 3: Individual report </h4>
                                        <p>
                                            Write a 2500-word report including a 2000-word research paper to identify
                                            and examine an important issue in bond, equity, or derivatives markets. And
                                            a 500-word reflection on Industry talk.
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Repeat for tabs 3, 4, 5 -->
                </div>

                <div class="tab-pane fade" id="pills-digital-economics" role="tabpanel"
                    aria-labelledby="pills-digital-economics-tab" tabindex="0">
                    <h4 class="my-3">INTRODUCTION TO FASHION ENTERPRISE </h4>
                    <p>
                        Discuss and assign the tasks to individual group members and clearly identify who was
                        responsible for what part in your report.
                        Task 1:
                        If required, gather additional information by conducting primary and secondary research and
                        analysis on the group's agreed fashion brand of Assignment 2 - where needed - to identify
                        key elements of the business environment of this brand. Re-iterate the wider sustainability
                        practises of the brand, or lack thereof.
                    </p>
                    <div class="row justify-content-between">
                        <div class="col-12 col-md-6 d-flex flex-column justify-content-center my-4 my-md-0">
                            <div class="d-flex flex-row mb-4">
                                <img src="/assets/default/image/girl.jfif" alt="avatar"
                                    class="rounded-circle avatar" />
                                <div class="ms-3 text-comment-mj">
                                    <p class="comment">
                                        "Fashion assignments are no joke, but this website not only helped me
                                        understand the industry dynamics better but also gave me trendy ideas that
                                        added flair to my project”
                                    </p>
                                    <p class="comment-author">- Phuong Anh -</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <img src="/assets/default/image/girl.jfif" alt="avatar"
                                    class="rounded-circle avatar" />
                                <div class="ms-3 text-comment-mj">
                                    <p class="comment mb-1">
                                        "I'm a fashion student, and this app is a game-changer. From business
                                        strategies to the latest trends, it's a one-stop-shop for everything fashion
                                        enterprise-related. Highly recommended!”
                                    <p class="comment-author">- Thao Nguyen -</p>
                                </div>
                            </div>
                        </div>
                        <!--              <div class="col-1"></div>-->
                        <div class="col-12 col-md-5 col-lg-4">
                            <a href="https://snapstudy.edu.vn/course/intro-to-fashion-enterprise-asm1-uBcgZ">
                                <div class="rounded-3 doc-wrapper">
                                    <img src="/assets/default/image/doc-avt.png" alt="doc-avt" />
                                    <div class="px-4 py-2 mt-2" style="height: fit-content">
                                        <h5>RMIT University</h5>
                                        <h4>Assignment 1: Fashion Enterprise Business Analysis </h4>
                                        <p>
                                            Task 1:
                                            If required, gather additional information by conducting primary and
                                            secondary research and analysis on the group's agreed
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Repeat for tabs 3, 4, 5 -->
                </div>

                <div class="tab-pane fade" id="pills-digital-fashion" role="tabpanel"
                    aria-labelledby="pills-digital-fashion-tab" tabindex="0">
                    <h4 class="my-3">INTRO TO LOGISTICS</h4>
                    <p>
                        Develop a report analyzing the supply chain for a specific commodity: researching 5 supply
                        chain processes for that product, and analyzing those processes in terms of definition,
                        managerial responsibilities, performance measurement, challenges, and recommendations.
                    <div class="row justify-content-between">
                        <div class="col-12 col-md-6 d-flex flex-column justify-content-center my-4 my-md-0">
                            <div class="d-flex flex-row mb-4">
                                <img src="/assets/default/image/girl.jfif" alt="avatar"
                                    class="rounded-circle avatar" />
                                <div class="ms-3 text-comment-mj">
                                    <p class="comment">
                                        "In my opinion, understanding logistics concepts and applying them to my
                                        case studies is very challenging. This provides me with both needs and
                                        further help me format my plan.
                                        ”
                                    </p>
                                    <p class="comment-author">- Linh Le -</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <img src="/assets/default/image/girl.jfif" alt="avatar"
                                    class="rounded-circle avatar" />
                                <div class="ms-3 text-comment-mj">
                                    <p class="comment mb-1">
                                        "Collection of data for assignments have always been intricate and time
                                        consuming. With this much assistance my assignments, it should be done
                                        in short time.”
                                    <p class="comment-author">- Huyen Truong -</p>
                                </div>
                            </div>
                        </div>
                        <!--              <div class="col-1"></div>-->
                        <div class="col-12 col-md-5 col-lg-4">
                            <a href="https://snapstudy.edu.vn/course/intro-to-log-a3-MwzrU">
                                <div class="rounded-3 doc-wrapper">
                                    <img src="/assets/default/image/doc-avt.png" alt="doc-avt" />
                                    <div class="px-4 py-2 mt-2" style="height: fit-content">
                                        <h5>RMIT University</h5>
                                        <h4>Assignment 1: Fashion Enterprise Business Analysis
                                        </h4>
                                        <p>
                                            Task 1:
                                            If required, gather additional information by conducting primary and
                                            secondary research and analysis on the group's agreed
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Repeat for tabs 3, 4, 5 -->
                </div>

                <div class="tab-pane fade" id="pills-digital-logistics" role="tabpanel"
                    aria-labelledby="pills-digital-logistics-tab" tabindex="0">
                    <h4 class="my-3">INTRO TO LOGISTICS
                    </h4>
                    <p>
                        Develop a report analyzing the supply chain for a specific commodity: researching 5 supply chain
                        processes for that product, and analyzing those processes in terms of definition, managerial
                        responsibilities, performance measurement, challenges, and recommendations.
                    <div class="row justify-content-between">
                        <div class="col-12 col-md-6 d-flex flex-column justify-content-center my-4 my-md-0">
                            <div class="d-flex flex-row mb-4">
                                <img src="/assets/default/image/girl.jfif" alt="avatar"
                                    class="rounded-circle avatar" />
                                <div class="ms-3 text-comment-mj">
                                    <p class="comment">
                                        "In my opinion, understanding logistics concepts and applying them to my case
                                        studies is very challenging. This provides me with both needs and further help
                                        me format my plan.
                                        ”
                                    </p>
                                    <p class="comment-author">- Linh Le -</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <img src="/assets/default/image/girl.jfif" alt="avatar"
                                    class="rounded-circle avatar" />
                                <div class="ms-3 text-comment-mj">
                                    <p class="comment mb-1">
                                        "Collection of data for assignments have always been intricate and time
                                        consuming. With this much assistance my assignments, it should be done in short
                                        time.
                                        ”
                                    <p class="comment-author">- Huyen Truong - </p>

                                </div>
                            </div>
                        </div>
                        <!--              <div class="col-1"></div>-->
                        <div class="col-12 col-md-5 col-lg-4">
                            <a href="https://snapstudy.edu.vn/course/understanding-business-environment-a3-I9B11">
                                <div class="rounded-3 doc-wrapper">
                                    <img src="/assets/default/image/doc-avt.png" alt="doc-avt" />
                                    <div class="px-4 py-2 mt-2" style="height: fit-content">
                                        <h5>RMIT University</h5>
                                        <h4>Assignment 3: A report on the supply chain for a specific commodity
                                        </h4>
                                        <p>
                                            Develop a report analyzing the supply chain for a specific commodity:
                                            researching 5 supply chain processes for that product, and analyzing those
                                            processes in terms of definition, managerial responsibilities, performance
                                            measurement, challenges, and recommendations.
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Repeat for tabs 3, 4, 5 -->
                </div>

                <div class="tab-pane fade" id="pills-business-logistics" role="tabpanel"
                    aria-labelledby="pills-business-logistics-tab" tabindex="0">
                    <h4 class="my-3">UNDERSTANDING BUSINESS ENVIRONMENT
                    </h4>
                    <p>
                        To complete this task, you must research the Vietnamese economy to gain a comprehensive
                        understanding of the market. This should include an analysis of the GDP, the factors of AD-AS
                        that can change GDP and price level, inflation, interest rate, financial market, international
                        comparative advantage, etc
                    <div class="row justify-content-between">
                        <div class="col-12 col-md-6 d-flex flex-column justify-content-center my-4 my-md-0">
                            <div class="d-flex flex-row mb-4">
                                <img src="/assets/default/image/girl.jfif" alt="avatar"
                                    class="rounded-circle avatar" />
                                <div class="ms-3 text-comment-mj">
                                    <p class="comment">
                                        "This topic isn't difficult, but I find it really challenging to score high. The
                                        teacher's expectations are very high. Seriously, there are tons of data and
                                        amazing suggested ideas in this."

                                    </p>
                                    <p class="comment-author">- Ngoc Nguyen -</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <img src="/assets/default/image/girl.jfif" alt="avatar"
                                    class="rounded-circle avatar" />
                                <div class="ms-3 text-comment-mj">
                                    <p class="comment mb-1">
                                        "Everyone must read this instruction. It must be over 20 pages, extremely
                                        detailed and helpful.
                                        ”
                                    <p class="comment-author">- Dung Hoang -</p>
                                </div>
                            </div>
                        </div>
                        <!--              <div class="col-1"></div>-->
                        <div class="col-12 col-md-5 col-lg-4">
                            <a href="https://snapstudy.edu.vn/course/understanding-business-environment-a3-I9B11">
                                <div class="rounded-3 doc-wrapper">
                                    <img src="/assets/default/image/doc-avt.png" alt="doc-avt" />
                                    <div class="px-4 py-2 mt-2" style="height: fit-content">
                                        <h5>RMIT University</h5>
                                        <h4>Assignment 3: Research on VN economy
                                        </h4>
                                        <p>
                                            To complete this task, you must research the Vietnamese economy to gain a
                                            comprehensive understanding of the market.
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Repeat for tabs 3, 4, 5 -->
                </div>

                <div class="tab-pane fade" id="pills-business-management" role="tabpanel"
                    aria-labelledby="pills-business-management-tab" tabindex="0">
                    <h4 class="my-3">CROSS - CULTURE MANAGEMENT</h4>
                    <p>
                        Intercultural effectiveness is an essential skill that everyone needs to develop in an
                        inter-connected world and increasingly culturally diverse workplaces. The purpose of this
                        assignment is to reflect on your attitudes and behaviours, what you have learned from this
                        class, and your interactions with people from foreign cultures. You will analyse these
                        interactions when preparing to identify areas for your personal development and to make an
                        action plan to improve your intercultural effectiveness in the future.
                    <div class="row justify-content-between">
                        <div class="col-12 col-md-6 d-flex flex-column justify-content-center my-4 my-md-0">
                            <div class="d-flex flex-row mb-4">
                                <img src="/assets/default/image/girl.jfif" alt="avatar"
                                    class="rounded-circle avatar" />
                                <div class="ms-3 text-comment-mj">
                                    <p class="comment">
                                        "This app transformed the complexities of change management into a
                                        comprehensible roadmap, equipping me with the tools to navigate
                                        organizational
                                        transitions with confidence.
                                        ”
                                    </p>
                                    <p class="comment-author">- Cong Le -</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <img src="/assets/default/image/girl.jfif" alt="avatar"
                                    class="rounded-circle avatar" />
                                <div class="ms-3 text-comment-mj">
                                    <p class="comment mb-1">
                                        "As a management student, this app became my go-to guide. It not only
                                        helped me
                                        comprehend management theories but also equipped me with strategies for
                                        implementing change effectively.
                                        ”
                                    <p class="comment-author">- Trang Nguyen -</p>
                                </div>
                            </div>
                        </div>
                        <!--              <div class="col-1"></div>-->
                        <div class="col-12 col-md-5 col-lg-4">
                            <a href="https://snapstudy.edu.vn/course/cross-culture-management-asm3-FaHM3">
                                <div class="rounded-3 doc-wrapper">
                                    <img src="/assets/default/image/doc-avt.png" alt="doc-avt" />
                                    <div class="px-4 py-2 mt-2" style="height: fit-content">
                                        <h5>RMIT University</h5>
                                        <h4>Assignment 3: Individual Essay </h4>
                                        <p>
                                            Section one: Introduction (identifying one weakness in your
                                            intercultural
                                            interactions, about 200 words) 1) Identify one area of weakness you have
                                            when
                                            interacting with people from different cultures or when working in a ….
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Repeat for tabs 3, 4, 5 -->
                </div>

                <div class="tab-pane fade" id="pills-organisation" role="tabpanel"
                    aria-labelledby="pills-organisation-tab" tabindex="0">
                    <h4 class="my-3">NEGOTIATION AND CONFLICT RESOLUTION</h4>
                    <p>
                        You have been employed as a HR consultant by a medium sized business that has no definitive
                        conflict resolution polices and processes in place. You are required to write a business
                        style
                        report for your senior manager, and you must base your report on the questions below. In
                        your
                        report, please address the below questions separately. Include synthesis and discussion
                        within
                        your work of relevant concepts, research, and legal/regulatory considerations when it comes
                        to
                        conflict in the workplace.
                    <div class="row justify-content-between">
                        <div class="col-12 col-md-6 d-flex flex-column justify-content-center my-4 my-md-0">
                            <div class="d-flex flex-row mb-4">
                                <img src="/assets/default/image/girl.jfif" alt="avatar"
                                    class="rounded-circle avatar" />
                                <div class="ms-3 text-comment-mj">
                                    <p class="comment">
                                        "I swear everyone should read this instruction. I think we just have to
                                        research a little bit to get this assignment done thanks to this super
                                        detailed guideline
                                        ”
                                    </p>
                                    <p class="comment-author">- Anonymous -</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <img src="/assets/default/image/girl.jfif" alt="avatar"
                                    class="rounded-circle avatar" />
                                <div class="ms-3 text-comment-mj">
                                    <p class="comment mb-1">
                                        "For anyone studying people and organization, this app is a goldmine. It
                                        provides detailed explanation for every theories, making them very easy
                                        to understand. It's a must-have!
                                        ”
                                    <p class="comment-author">- Anonymous -</p>
                                </div>
                            </div>
                        </div>
                        <!--              <div class="col-1"></div>-->
                        <div class="col-12 col-md-5 col-lg-4">
                            <a href="https://snapstudy.edu.vn/course/f-ZJTsA">
                                <div class="rounded-3 doc-wrapper">
                                    <img src="/assets/default/image/doc-avt.png" alt="doc-avt" />
                                    <div class="px-4 py-2 mt-2" style="height: fit-content">
                                        <h5>RMIT University</h5>
                                        <h4>Assignment 3: Individual report </h4>
                                        <p>
                                            Question 1: Identify and critically analyse the role that HR, unions and
                                            stakeholders play in workplace conflict resolution.
                                            Question 2: Identify in a critical manner the legal, social, cultural,
                                            and
                                            economic …
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Repeat for tabs 3, 4, 5 -->
                </div>

                <div class="tab-pane fade" id="pills-global-film" role="tabpanel"
                    aria-labelledby="pills-global-film-tab" tabindex="0">
                    <h4 class="my-3">GLOBAL CORPORATE RESPONSIBILITY</h4>
                    <p>
                        Your essay question for this assessment is: With a focus on the environmental impacts of
                        global
                        business, is CSR largely a cover for Corporate Social Irresponsibility? If so, how? If not,
                        why
                        not?
                    <div class="row justify-content-between">
                        <div class="col-12 col-md-6 d-flex flex-column justify-content-center my-4 my-md-0">
                            <div class="d-flex flex-row mb-4">
                                <img src="/assets/default/image/girl.jfif" alt="avatar"
                                    class="rounded-circle avatar" />
                                <div class="ms-3 text-comment-mj">
                                    <p class="comment">
                                        "With a question like this i feel very confused about where to start.
                                        The outline helped me divide my essay into smaller questions and answer
                                        each of them to form my final work.
                                        ”
                                    </p>
                                    <p class="comment-author">- - Anonymous- -</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <img src="/assets/default/image/girl.jfif" alt="avatar"
                                    class="rounded-circle avatar" />
                                <div class="ms-3 text-comment-mj">
                                    <p class="comment mb-1">
                                        "“This assignment is super heavy. Thanks SNAPS, I think you saved me
                                        from losing a Vision haha"
                                        ”
                                    <p class="comment-author">- - Anonymous- -</p>
                                </div>
                            </div>
                        </div>
                        <!--              <div class="col-1"></div>-->
                        <div class="col-12 col-md-5 col-lg-4">
                            <a href="https://snapstudy.edu.vn/course/global-corporate-responsibility-asm3-Pi38S">
                                <div class="rounded-3 doc-wrapper">
                                    <img src="/assets/default/image/doc-avt.png" alt="doc-avt" />
                                    <div class="px-4 py-2 mt-2" style="height: fit-content">
                                        <h5>RMIT University</h5>
                                        <h4>Assignment 3: Individual Essay</h4>
                                        <p>
                                            Structure and guidance: As well as an Introduction and Conclusion, you
                                            need to
                                            include the following sections in the main body of your essay: 1. Define
                                            your
                                            terms: What is CSR? What is Corporate Social Irresponsibility? …
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                    <!-- Repeat for tabs 3, 4, 5 -->
                </div>

                <!-- Repeat for tabs 3, 4, 5 -->
            </div>
        </div>
        </div>
    </section>

    <!-- CTA Signup -->
    <section id="cta-signup" class="mt-5 py-2">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="w-100 row justify-content-center align-items-center">
                <h3 class="col-sm-12 col-md-8 mb-3 mb-md-0" style="text-transform: uppercase">
                    Sign up now to purchase the detailed instruction at 199,000 VND
                </h3>
                <button class="btn btn-danger rounded-btn px-3 col-9 col-md-4"
                    style="text-transform: uppercase; display: inline-block">
                    <a style="color: white" href="https://snapstudy.edu.vn/register">
                        Sign up for free trial
                    </a>
                </button>
            </div>
        </div>
    </section>

    <!-- Top Trending -->
    <section id="top-trending" class="mt-5">
        <div class="container-fluid d-flex flex-column justify-content-center align-items-center"
            style="max-width: 1080px">
            <div class="w-100">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-md-9">
                        <h4>Start learning with Top Trending Outlines</h4>
                        <p class="mb-4">
                            Make a progress towards high scores by starting with the
                            highest-voted outlines
                        </p>
                    </div>
                    <div class="d-flex col-3 justify-content-end">
                        <a href="/classes" class="d-flex align-items-center view-all">
                            View All
                            <img src="/assets/default/image/icons/arrow-right.png" alt="arrow" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php $__currentLoopData = $webinar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trening): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-10 col-md-6 col-lg-3 my-3 my-lg-0">
                        <div class="border rounded-3 doc-outline-wrapper">

                            <img src="/assets/default/image/doc-img.png" alt="doc-image" />


                            <div class="px-3 py-3">
                                <span class="px-3 py-2 mb-3 rounded-3">
                                    <?php echo e($trening->category->title); ?>

                                </span>
                                <a href="<?php echo e($trening->getUrl()); ?>">
                                    <h4 class="mb-3"><?php echo e(clean($trening->title, 'title')); ?></h4>
                                </a>
                                <h5>RMIT University</h5>
                                <p class="meta-seo">
                                    <?php echo e($trening->seo_description); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <!--  Students' Results with SNAPS  -->
    <section id="result-with-snaps">
        <div class="container my-md-3">
            <div class="row align-items-center mx-lg-4">
                <div class="col-12 col-md-7">
                    <h3 class="mb-3">Students' Results with SNAPS</h3>
                    <p>
                        <span>96%</span> of our customers said that they gained higher
                        score and saved a lot of time when they use SNAPS to understand
                        their assessment and come up with ideas
                    </p>
                </div>
                <div class="col-12 col-md-5 my-3">
                    <img src="/assets/default/image/result-snaps.png" alt="result-snaps" class="my-md-5" />
                </div>
            </div>
        </div>
    </section>

    <!--  Community  -->
    <section id="community">
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <h3>The Community we are in</h3>
            <p class="text-center" style="color: #032482">
                Over 3000 students have already joined the SNAPS Community
            </p>
            <div class="row justify-content-center align-items-center">
                <div class="px-4 py-3 my-4 my-md-5 me-md-5 rounded-4 community-item">
                    <div class="d-flex flex-column">
                        <div class="d-flex">
                            <img src="/assets/default/image/girl.jfif" alt="community-avatar"
                                class="rounded-circle me-3 community-avatar" />
                            <div class="w-100">
                                <p class="comment-author text-start" style="font-size: medium">
                                    Ngoc Anh
                                </p>
                                <p>Logistics at RMIT</p>
                            </div>
                            <img src="/assets/default/image/icons/quote-icon.png" alt="quote-icon"
                                class="quote-icon" />
                        </div>

                        <p class="mt-4"
                            style="font-size: small; display: -webkit-box;
                        -webkit-line-clamp: 4;
                        -webkit-box-orient: vertical;
                        overflow: hidden;">
                            The most fascinating thing about SNAPS, in my opinion, is that I can work and study at the
                            same time without compromising my grades. There are times when multiple deadlines overlap,
                            and the outlines provided by SNAPS are a real lifesaver.
                        </p>
                    </div>
                </div>
                <div class="px-4 py-3 mb-4 my-md-5 rounded-3 community-item">
                    <div class="d-flex flex-column">
                        <div class="d-flex">
                            <img src="/assets/default/image/girl.jfif" alt="community-avatar"
                                class="rounded-circle me-3 community-avatar" />
                            <div class="w-100">
                                <p class="comment-author text-start" style="font-size: medium">
                                    Phuong Vu
                                </p>
                                <p>Economics & Finance at RMIT</p>
                            </div>
                            <img src="/assets/default/image/icons/quote-icon.png" alt="quote-icon"
                                class="quote-icon" />
                        </div>

                        <p class="mt-4"
                            style="font-size: small; display: -webkit-box;
                        -webkit-line-clamp: 4;
                        -webkit-box-orient: vertical;
                        overflow: hidden;">
                            At first, I thought this was sample-providing tool, but upon trying it out, I realized they
                            suggest main ideas and provide references for me to gather data/examples. It's incredibly
                            helpful because their suggested ideas are very detailed and insightful. I've got DI in
                            almost courses thanks to SNAPS
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--  Footer  -->
    <section id="footer">
        <div class="container rounded-4 my-5">
            <div class="col-12 col-md-6 d-flex flex-column justify-content-between">
                <h3 class="mb-4">
                    Get ahead to achieve your academic goals with SNAPS
                </h3>
                <p class="mb-4">
                    Sign up now to receive a <span>free trial</span> for the first purchase
                </p>
                <a href="https://snapstudy.edu.vn/register">
                    <button class="btn btn-danger rounded-btn px-3"
                        style="text-transform: uppercase; max-width: 240px">

                        Register for free
                    </button>
                </a>
            </div>
            <img src="/assets/default/image/footer-3d.png" alt="footer-3d" />
        </div>
    </section>

    <!--  SCRIPT   -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
<?php /**PATH D:\laragon\www\snapstudy.edu.vn\public_html\resources\views/web/default/pages/home.blade.php ENDPATH**/ ?>