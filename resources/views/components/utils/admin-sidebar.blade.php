<!-- Start Dashboard Sidebar  -->
<div class="rbt-default-sidebar sticky-top rbt-shadow-box rbt-gradient-border">
    <div class="inner">
        <div class="content-item-content">

            <div class="rbt-default-sidebar-wrapper">
                @if (auth()->user()->role === 0)
                    <div class="section-title mb--20">
                        <h6 class="rbt-title-style-2">Welcome, Admin</h6>
                    </div>
                    <nav class="mainmenu-nav">
                        <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                            <li><a href="{{ route("admin_dashboard") }}"><i class="feather-home"></i><span>Dashboard</span></a>
                            </li>
                            <li><a href="{{ route('admin.products.all') }}"><i
                                        class="feather-shopping-bag"></i><span>Products</span></a>
                            </li>
                            <li>
                                <a href="{{ route('order.index') }}">
                                    <i class="feather-truck"></i>
                                    <span>Orders</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('all_students') }}">
                                    <i class="feather-star"></i>
                                    <span>Visitors</span>
                                </a>
                            </li>
                            <li><a href="{{ route('enrollment.show_all') }}"><i
                                        class="feather-book-open"></i><span>Enrollements
                                    </span></a>
                            </li>
                            <li><a href="{{ route('admin.courses') }}"><i
                                        class="feather-monitor"></i><span>Courses</span></a>
                            </li>




                            <li><a href="{{ route('badges.all') }}"><i class="feather-help-circle"></i><span>
                                        Batches
                                    </span></a>
                            </li>
                        </ul>
                    </nav>

                    <div class="section-title mt--40 mb--20">
                        <h6 class="rbt-title-style-2">Quick Actions</h6>
                    </div>

                    <nav class="mainmenu-nav">
                        <ul class="dashboard-mainmenu rbt-default-sidebar-list">

                            <li>
                                <a href="{{ route('admin.course.create') }}">
                                    <i class="feather-plus-square"></i>
                                    <span>Create Course</span>
                                </a>
                            </li>

                            <li><a href="{{ route('admin.product.create') }}"><i class="feather-list"></i><span>Add
                                        Product</span></a>
                            </li>
                        </ul>
                    </nav>
                @endif
                {{-- teacher --}}
                @if (auth()->user()->role === 2)
                    <div class="section-title mt--40 mb--20">
                        <h6 class="rbt-title-style-2">Instructor</h6>
                    </div>
                    <nav class="mainmenu-nav">
                        <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                            <li><a href="instructor-dashboard.html"><i
                                        class="feather-home"></i><span>Dashboard</span></a>
                            </li>
                            <li><a href="instructor-profile.html"><i class="feather-user"></i><span>My
                                        Profile</span></a>
                            </li>
                            <li><a href="instructor-enrolled-courses.html"><i
                                        class="feather-book-open"></i><span>Classes</span></a>
                            </li>
                            {{-- <li><a href="instructor-wishlist.html"><i
                                        class="feather-bookmark"></i><span>Wishlist</span></a>
                            </li>
                            <li><a href="instructor-reviews.html"><i class="feather-star"></i><span>Reviews</span></a>
                            </li>
                            <li><a href="instructor-my-quiz-attempts.html"><i class="feather-help-circle"></i><span>My
                                        Quiz
                                        Attempts</span></a>
                            </li>
                            <li><a href="{{ route('order.index') }}"><i class="feather-shopping-bag"></i><span>Order
                                        History</span></a>
                            </li> --}}
                            {{--
                            <li><a href="{{ route('all_students') }}"><i class="feather-shopping-bag"></i><span>All
                                        Students</span></a>
                            </li> --}}
                        </ul>
                    </nav>
                @endif

                <div class="section-title mt--40 mb--20">
                    <h6 class="rbt-title-style-2">Settings</h6>
                </div>

                <nav class="mainmenu-nav">
                    <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                        <li><a href="instructor-profile.html"><i class="feather-user"></i><span>My
                                        Profile</span></a>
                            </li>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <a class="log" :href="route('logout')"
                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                <i class="feather-log-out"></i>
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </ul>
                </nav>
            </div>

        </div>
    </div>
</div>
<!-- End Dashboard Sidebar  -->
