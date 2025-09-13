
@extends('partials.layouts.master3')

@section('title', 'Online Course Dashboard| Herozi - The Worlds Best Selling Bootstrap Admin & Dashboard Template by SRBThemes')
@section('sub-title', 'Online Course' )
@section('pagetitle', 'Dashboard')
@section('buttonTitle', 'Share')
@section('link', '#!')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/libs/air-datepicker/air-datepicker.css') }}">
    <link href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-4">
            <div class="card card-hover overflow-hidden">
                <div class="card-body hstack gap-2">
                    <div class="avatar avatar-item rounded-2">
                        <i class="ri-group-line"></i>
                    </div>
                    <div>
                        <span class="mb-2 fs-12 text-muted">Number of Students</span>
                        <h5 class="fw-medium mb-1">1,200</h5>
                    </div>
                </div>
                <div class="card-body bg-light py-2 bg-opacity-40 hstack justify-content-between gap-3">
                    <div class="hstack gap-3">
                        <h6 class="mb-0 fw-semibold">Active Students:</h6>
                        <p class="fs-12 text-muted mb-0">1,000</p>
                    </div>
                    <div class="vr h-30px align-self-center bg-light"></div>
                    <div class="hstack gap-3">
                        <h6 class="mb-0 fw-semibold">New Students:</h6>
                        <p class="fs-12 text-muted mb-0">200</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Courses Card -->
        <div class="col-lg-4">
            <div class="card card-hover overflow-hidden">
                <div class="card-body hstack gap-2">
                    <div class="avatar avatar-item rounded-2">
                        <i class="ri-book-line"></i>
                    </div>
                    <div>
                        <span class="mb-2 fs-12 text-muted">Total Courses</span>
                        <h5 class="fw-medium mb-1">30</h5>
                    </div>
                </div>
                <div class="card-body bg-light py-2 bg-opacity-40 hstack justify-content-between gap-3">
                    <div class="hstack gap-3">
                        <h6 class="mb-0 fw-semibold">Active Courses:</h6>
                        <p class="fs-12 text-muted mb-0">25</p>
                    </div>
                    <div class="vr h-30px align-self-center bg-light"></div>
                    <div class="hstack gap-3">
                        <h6 class="mb-0 fw-semibold">Archived:</h6>
                        <p class="fs-12 text-muted mb-0">5</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Instructor Performance Card -->
        <div class="col-lg-4">
            <div class="card card-hover overflow-hidden">
                <div class="card-body hstack gap-2">
                    <div class="avatar avatar-item rounded-2">
                        <i class="ri-user-star-line"></i>
                    </div>
                    <div>
                        <span class="mb-2 fs-12 text-muted">Instructor Performance</span>
                        <h5 class="fw-medium mb-1">John Doe - 4.8/5</h5>
                    </div>
                </div>
                <div class="card-body bg-light py-2 bg-opacity-40 hstack justify-content-between gap-3">
                    <div class="hstack gap-3">
                        <h6 class="mb-0 fw-semibold">Completion Rate:</h6>
                        <p class="fs-12 text-muted mb-0">85%</p>
                    </div>
                    <div class="vr h-30px align-self-center bg-light"></div>
                    <div class="hstack gap-3">
                        <h6 class="mb-0 fw-semibold">New Reviews:</h6>
                        <p class="fs-12 text-muted mb-0">15</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row g-4">

        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <h6 class="card-title mb-0">Leave Application</h6>
                    <div class="dropdown">
                        <button class="btn btn-link text-muted p-0" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-more-2-fill"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#!">Approve All</a></li>
                            <li><a class="dropdown-item" href="#!">Reject All</a></li>
                            <li><a class="dropdown-item" href="#!">View Report</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="full-picker full-picker-scrollable">
                        <input type="text" class="form-control d-none" id="inline-date-picker" placeholder="Select a date">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-4">
            <div class="card h-100 mb-0">
                <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <h5 class="card-title mb-0">Weekly Activity Overview</h5>
                    <div class="dropdown">
                        <button class="btn btn-link text-muted p-0" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-more-2-fill"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#!">Refresh</a></li>
                            <li><a class="dropdown-item" href="#!">View Full Report</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div id="orderAnalyticsDashboard" class="apexcharts-container apexcharts-white"></div>
                    <p class="text-muted fs-13 mt-3">Activity tracking for the entire week, with hours logged each day.</p>

                    <div class="row g-4">
                        <div class="col-6">
                            <div class="p-4 rounded bg-light bg-opacity-40">
                                <span class="text-muted fs-12">Total Active Hours</span>
                                <h6 class="mt-1 mb-0">35 hrs</h6>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-4 rounded bg-light bg-opacity-40">
                                <span class="text-muted fs-12">Active Days</span>
                                <h6 class="mt-1 mb-0">5 Days</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-4">
            <div class="card h-100 mb-0">
                <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <h5 class="card-title mb-0">Top Categories</h5>
                    <div class="dropdown">
                        <button class="btn btn-link text-muted p-0" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-more-2-fill"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#!">Add Category</a></li>
                            <li><a class="dropdown-item" href="#!">Edit Categories</a></li>
                            <li><a class="dropdown-item" href="#!">Generate Report</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body p-0 online-course-scroll" data-simplebar>
                    <ul class="d-flex flex-column list-group">
                        <li class="list-group-item list-group-item-action border-0">
                            <div class="hstack">
                                <span class="avatar avatar-item border-0 rounded-3 flex-shrink-0 text-primary bg-primary-subtle">
                                    <i class="ri-dashboard-line fs-20 leading-none"></i>
                                </span>
                                <div class="ms-3 flex-grow-1">
                                    <h6 class="fw-semibold mb-0">UI / UX Design</h6>
                                    <p class="fs-12 text-muted mb-0">10,000 + Courses</p>
                                </div>
                                <span class="fs-14 fw-medium flex-shrink-0">$199.99</span>
                            </div>
                        </li>

                        <li class="list-group-item list-group-item-action border-0">
                            <div class="hstack">
                                <span class="avatar avatar-item border-0 rounded-3 flex-shrink-0 text-secondary bg-secondary-subtle">
                                    <i class="ri-brush-line fs-20 leading-none"></i>
                                </span>
                                <div class="ms-3 flex-grow-1">
                                    <h6 class="fw-semibold mb-0">UI/UX Design & Development</h6>
                                    <p class="fs-12 text-muted mb-0">25,000+ Enrollments</p>
                                </div>
                                <span class="fs-14 fw-medium flex-shrink-0">$299.99</span>
                            </div>
                        </li>

                        <li class="list-group-item list-group-item-action border-0">
                            <div class="hstack">
                                <span class="avatar avatar-item border-0 rounded-3 flex-shrink-0 text-success bg-success-subtle">
                                    <i class="ri-code-line fs-20 leading-none"></i>
                                </span>
                                <div class="ms-3 flex-grow-1">
                                    <h6 class="fw-semibold mb-0">Full Stack Web Development</h6>
                                    <p class="fs-12 text-muted mb-0">18,500+ Enrollments</p>
                                </div>
                                <span class="fs-14 fw-medium flex-shrink-0">$249.99</span>
                            </div>
                        </li>

                        <li class="list-group-item list-group-item-action border-0">
                            <div class="hstack">
                                <span class="avatar avatar-item border-0 rounded-3 flex-shrink-0 text-danger bg-danger-subtle">
                                    <i class="ri-database-2-line fs-20 leading-none"></i>
                                </span>
                                <div class="ms-3 flex-grow-1">
                                    <h6 class="fw-semibold mb-0">Database Management & SQL</h6>
                                    <p class="fs-12 text-muted mb-0">22,000+ Enrollments</p>
                                </div>
                                <span class="fs-14 fw-medium flex-shrink-0">$199.99</span>
                            </div>
                        </li>

                        <li class="list-group-item list-group-item-action border-0">
                            <div class="hstack">
                                <span class="avatar avatar-item border-0 rounded-3 flex-shrink-0 text-warning bg-warning-subtle">
                                    <i class="ri-smartphone-line fs-20 leading-none"></i>
                                </span>
                                <div class="ms-3 flex-grow-1">
                                    <h6 class="fw-semibold mb-0">Mobile App Development</h6>
                                    <p class="fs-12 text-muted mb-0">15,000+ Enrollments</p>
                                </div>
                                <span class="fs-14 fw-medium flex-shrink-0">$249.99</span>
                            </div>
                        </li>

                        <li class="list-group-item list-group-item-action border-0">
                            <div class="hstack">
                                <span class="avatar avatar-item border-0 rounded-3 flex-shrink-0 text-primary bg-primary-subtle">
                                    <i class="ri-search-line fs-20 leading-none"></i>
                                </span>
                                <div class="ms-3 flex-grow-1">
                                    <h6 class="fw-semibold mb-0">Digital Marketing & SEO</h6>
                                    <p class="fs-12 text-muted mb-0">12,500+ Enrollments</p>
                                </div>
                                <span class="fs-14 fw-medium flex-shrink-0">$179.99</span>
                            </div>
                        </li>

                        <li class="list-group-item list-group-item-action border-0">
                            <div class="hstack">
                                <span class="avatar avatar-item border-0 rounded-3 flex-shrink-0 text-info bg-info-subtle">
                                    <i class="ri-camera-line fs-20 leading-none"></i>
                                </span>
                                <div class="ms-3 flex-grow-1">
                                    <h6 class="fw-semibold mb-0">Photography & Video Editing</h6>
                                    <p class="fs-12 text-muted mb-0">8,500+ Enrollments</p>
                                </div>
                                <span class="fs-14 fw-medium flex-shrink-0">$159.99</span>
                            </div>
                        </li>

                        <li class="list-group-item list-group-item-action border-0">
                            <div class="hstack">
                                <span class="avatar avatar-item border-0 rounded-3 flex-shrink-0 text-danger bg-danger-subtle">
                                    <i class="ri-robot-line fs-20 leading-none"></i>
                                </span>
                                <div class="ms-3 flex-grow-1">
                                    <h6 class="fw-semibold mb-0">Artificial Intelligence & Machine Learning</h6>
                                    <p class="fs-12 text-muted mb-0">20,000+ Enrollments</p>
                                </div>
                                <span class="fs-14 fw-medium flex-shrink-0">$299.99</span>
                            </div>
                        </li>

                        <li class="list-group-item list-group-item-action border-0">
                            <div class="hstack">
                                <span class="avatar avatar-item border-0 rounded-3 flex-shrink-0 text-primary bg-primary-subtle">
                                    <i class="bi bi-shield-lock fs-20 leading-none"></i>
                                </span>
                                <div class="ms-3 flex-grow-1">
                                    <h6 class="fw-semibold mb-0">Cybersecurity & Ethical Hacking</h6>
                                    <p class="fs-12 text-muted mb-0">17,500+ Enrollments</p>
                                </div>
                                <span class="fs-14 fw-medium flex-shrink-0">$279.99</span>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card h-100 mb-0">
                <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <h5 class="card-title mb-0">Top Mentors</h5>
                    <a href="apps-course-teacher-list" class="btn btn-light btn-sm flex-shrink-0">View All</a>
                </div>
                <div class="card-body h-500px" data-simplebar>
                    <table class="table align-middle table-borderless table-centered table-nowrap mb-0">
                        <thead class="text-muted bg-light bg-opacity-40">
                        <tr>
                            <th scope="col">Mentor Name</th>
                            <th scope="col">Expertise</th>
                            <th scope="col">Course</th>
                            <th scope="col">Experience</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="d-flex gap-2 align-items-center">
                                    <img src="{{ asset('assets/images/avatar/avatar-2.jpg') }}" alt="Full Stack Development Course" class="avatar rounded-2">
                                    <a href="#!" class="text-body">
                                        <p class="mb-0 fw-medium text-truncate">Caleb Riv</p>
                                    </a>
                                </div>
                            </td>
                            <td>Web Designer</td>
                            <td>110</td>
                            <td>12 Years</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex gap-2 align-items-center">
                                    <img src="{{ asset('assets/images/avatar/avatar-1.jpg') }}" alt="Web Design Course" class="avatar rounded-2">
                                    <a href="#!" class="text-body">
                                        <p class="mb-0 fw-medium text-truncate">Maria Stone</p>
                                    </a>
                                </div>
                            </td>
                            <td>Full Stack Developer</td>
                            <td>98</td>
                            <td>8 Years</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex gap-2 align-items-center">
                                    <img src="{{ asset('assets/images/avatar/avatar-3.jpg') }}" alt="UI/UX Course" class="avatar rounded-2">
                                    <a href="#!" class="text-body">
                                        <p class="mb-0 fw-medium text-truncate">Samuel Lee</p>
                                    </a>
                                </div>
                            </td>
                            <td>UI/UX Designer</td>
                            <td>120</td>
                            <td>9 Years</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex gap-2 align-items-center">
                                    <img src="{{ asset('assets/images/avatar/avatar-4.jpg') }}" alt="Data Science Course" class="avatar rounded-2">
                                    <a href="#!" class="text-body">
                                        <p class="mb-0 fw-medium text-truncate">Nina Patel</p>
                                    </a>
                                </div>
                            </td>
                            <td>Data Scientist</td>
                            <td>75</td>
                            <td>10 Years</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex gap-2 align-items-center">
                                    <img src="{{ asset('assets/images/avatar/avatar-5.jpg') }}" alt="Marketing Course" class="avatar rounded-2">
                                    <a href="#!" class="text-body">
                                        <p class="mb-0 fw-medium text-truncate">John Carter</p>
                                    </a>
                                </div>
                            </td>
                            <td>Digital Marketer</td>
                            <td>105</td>
                            <td>6 Years</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex gap-2 align-items-center">
                                    <img src="{{ asset('assets/images/avatar/avatar-7.jpg') }}" alt="Photography Course" class="avatar rounded-2">
                                    <a href="#!" class="text-body">
                                        <p class="mb-0 fw-medium text-truncate">Olivia Green</p>
                                    </a>
                                </div>
                            </td>
                            <td>Mobile App Developer</td>
                            <td>90</td>
                            <td>7 Years</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex gap-2 align-items-center">
                                    <img src="{{ asset('assets/images/avatar/avatar-6.jpg') }}" alt="Mobile App Development Course" class="avatar rounded-2">
                                    <a href="#!" class="text-body">
                                        <p class="mb-0 fw-medium text-truncate">Lucas Gray</p>
                                    </a>
                                </div>
                            </td>
                            <td>Photographer</td>
                            <td>60</td>
                            <td>15 Years</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex gap-2 align-items-center">
                                    <img src="{{ asset('assets/images/avatar/avatar-8.jpg') }}" alt="AI & Machine Learning Course" class="avatar rounded-2">
                                    <a href="#!" class="text-body">
                                        <p class="mb-0 fw-medium text-truncate">Ethan Black</p>
                                    </a>
                                </div>
                            </td>
                            <td>AI Engineer</td>
                            <td>85</td>
                            <td>11 Years</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex gap-2 align-items-center">
                                    <img src="{{ asset('assets/images/avatar/avatar-9.jpg') }}" alt="SQL & Database Course" class="avatar rounded-2">
                                    <a href="#!" class="text-body">
                                        <p class="mb-0 fw-medium text-truncate">Sophia King</p>
                                    </a>
                                </div>
                            </td>
                            <td>Database Administrator</td>
                            <td>130</td>
                            <td>14 Years</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex gap-2 align-items-center">
                                    <img src="{{ asset('assets/images/avatar/avatar-10.jpg') }}" alt="Blockchain Development Course" class="avatar rounded-2">
                                    <a href="#!" class="text-body">
                                        <p class="mb-0 fw-medium text-truncate">Daniel Scott</p>
                                    </a>
                                </div>
                            </td>
                            <td>Blockchain Developer</td>
                            <td>50</td>
                            <td>5 Years</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <!-- Countup init -->
    <script type="module" src="{{ asset('assets/js/pages/countup.init.js') }}"></script>

    <!-- Swiper init -->
    <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Air Datepicker js -->
    <script src="{{ asset('assets/libs/air-datepicker/air-datepicker.js') }}"></script>

    <!-- ApexChat js -->
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Online Course Dashboard init -->
    <script src="{{ asset('assets/js/charts/apexcharts-config.init.js') }}"></script>
    <script src="{{ asset('assets/js/dashboards/dashboard-online-course.init.js') }}"></script>

    <!-- App js -->
    <script type="module" src="{{ asset('assets/js/app.js') }}"></script>
@endsection
