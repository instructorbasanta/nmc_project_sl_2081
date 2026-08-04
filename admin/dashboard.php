<?php  
@session_start(); 
require_once "../function.php";
checkLoginStatus();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard | Daily News Portal</title>

    <link rel="stylesheet"
          href="../css/style.css">

</head>

<body>

<!-- ==========================================
        ADMIN DASHBOARD
=========================================== -->

<div class="admin-layout">

    <!-- ======================================
            SIDEBAR
    ======================================= -->

    <aside class="admin-sidebar">

        <div class="sidebar-logo">

            <h2>

                News Admin

            </h2>

        </div>

     <?php require_once "menu.php"; ?>

    </aside>

    <!-- ======================================
            MAIN CONTENT
    ======================================= -->

    <main class="admin-content">

        <!-- ==================================
                TOP NAVBAR
        =================================== -->

        <header class="admin-header">

            <div>

                <h2>

                    Dashboard

                </h2>

                <p>

                    Welcome back, Administrator

                </p>

            </div>

            <div class="admin-user">

                <span>

                    👤 <?php echo $_SESSION['user']['name'] ?>

                </span>

            </div>

        </header>

        <!-- ==================================
                DASHBOARD CARDS
        =================================== -->

        <section class="dashboard-cards">

            <!-- Card 1 -->

            <div class="dashboard-card">

                <h3>

                    Total Categories

                </h3>

                <h1>

                    12

                </h1>

                <p>

                    Available categories

                </p>

            </div>

            <!-- Card 2 -->

            <div class="dashboard-card">

                <h3>

                    Total News

                </h3>

                <h1>

                    148

                </h1>

                <p>

                    News articles

                </p>

            </div>

            <!-- Card 3 -->

            <div class="dashboard-card">

                <h3>

                    Published News

                </h3>

                <h1>

                    128

                </h1>

                <p>

                    Live articles

                </p>

            </div>

            <!-- Card 4 -->

            <div class="dashboard-card">

                <h3>

                    Draft News

                </h3>

                <h1>

                    20

                </h1>

                <p>

                    Pending publication

                </p>

            </div>

        </section>

        <!-- ==================================
             Continue in Phase 5C-2
             Latest News Table
             Latest Categories Table
        =================================== -->
                <!-- ==================================
                LATEST NEWS TABLE
        =================================== -->

        <section class="admin-section">

            <div class="section-header">

                <h2>

                    Latest News

                </h2>

            </div>

            <div class="table-responsive">

                <table class="admin-table">

                    <thead>

                        <tr>

                            <th>ID</th>

                            <th>Title</th>

                            <th>Category</th>

                            <th>Rank</th>

                            <th>Status</th>

                            <th>Created Date</th>

                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>1</td>

                            <td>AI Revolution in Education</td>

                            <td>Technology</td>

                            <td>1</td>

                            <td>
                                <span class="status published">
                                    Published
                                </span>
                            </td>

                            <td>03 Aug 2026</td>

                            <td>

                                <a href="news-form.html"
                                   class="btn-sm">

                                    Edit

                                </a>

                                <a href="#"
                                   class="btn-sm btn-danger">

                                    Delete

                                </a>

                            </td>

                        </tr>

                        <tr>

                            <td>2</td>

                            <td>Stock Market Hits Record High</td>

                            <td>Business</td>

                            <td>2</td>

                            <td>

                                <span class="status draft">

                                    Draft

                                </span>

                            </td>

                            <td>02 Aug 2026</td>

                            <td>

                                <a href="news-form.html"
                                   class="btn-sm">

                                    Edit

                                </a>

                                <a href="#"
                                   class="btn-sm btn-danger">

                                    Delete

                                </a>

                            </td>

                        </tr>

                        <tr>

                            <td>3</td>

                            <td>National Team Wins Championship</td>

                            <td>Sports</td>

                            <td>3</td>

                            <td>

                                <span class="status published">

                                    Published

                                </span>

                            </td>

                            <td>01 Aug 2026</td>

                            <td>

                                <a href="news-form.html"
                                   class="btn-sm">

                                    Edit

                                </a>

                                <a href="#"
                                   class="btn-sm btn-danger">

                                    Delete

                                </a>

                            </td>

                        </tr>

                        <tr>

                            <td>4</td>

                            <td>Healthcare Innovation Through AI</td>

                            <td>Health</td>

                            <td>4</td>

                            <td>

                                <span class="status published">

                                    Published

                                </span>

                            </td>

                            <td>01 Aug 2026</td>

                            <td>

                                <a href="news-form.html"
                                   class="btn-sm">

                                    Edit

                                </a>

                                <a href="#"
                                   class="btn-sm btn-danger">

                                    Delete

                                </a>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </section>

        <!-- ==================================
                LATEST CATEGORIES
        =================================== -->

        <section class="admin-section">

            <div class="section-header">

                <h2>

                    Latest Categories

                </h2>

            </div>

            <div class="table-responsive">

                <table class="admin-table">

                    <thead>

                        <tr>

                            <th>ID</th>

                            <th>Category</th>

                            <th>Rank</th>

                            <th>Status</th>

                            <th>Created Date</th>

                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>1</td>

                            <td>Technology</td>

                            <td>1</td>

                            <td>

                                <span class="status published">

                                    Active

                                </span>

                            </td>

                            <td>01 Jan 2026</td>

                            <td>

                                <a href="category-form.html"
                                   class="btn-sm">

                                    Edit

                                </a>

                                <a href="#"
                                   class="btn-sm btn-danger">

                                    Delete

                                </a>

                            </td>

                        </tr>

                        <tr>

                            <td>2</td>

                            <td>Business</td>

                            <td>2</td>

                            <td>

                                <span class="status published">

                                    Active

                                </span>

                            </td>

                            <td>01 Jan 2026</td>

                            <td>

                                <a href="category-form.html"
                                   class="btn-sm">

                                    Edit

                                </a>

                                <a href="#"
                                   class="btn-sm btn-danger">

                                    Delete

                                </a>

                            </td>

                        </tr>

                        <tr>

                            <td>3</td>

                            <td>Sports</td>

                            <td>3</td>

                            <td>

                                <span class="status published">

                                    Active

                                </span>

                            </td>

                            <td>01 Jan 2026</td>

                            <td>

                                <a href="category-form.html"
                                   class="btn-sm">

                                    Edit

                                </a>

                                <a href="#"
                                   class="btn-sm btn-danger">

                                    Delete

                                </a>

                            </td>

                        </tr>

                        <tr>

                            <td>4</td>

                            <td>Health</td>

                            <td>4</td>

                            <td>

                                <span class="status draft">

                                    Inactive

                                </span>

                            </td>

                            <td>15 Jan 2026</td>

                            <td>

                                <a href="category-form.html"
                                   class="btn-sm">

                                    Edit

                                </a>

                                <a href="#"
                                   class="btn-sm btn-danger">

                                    Delete

                                </a>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </section>

        <!-- Continue in Phase 5C-3 -->
                 <!-- ==========================================
                DASHBOARD BOTTOM SECTION
        =========================================== -->

        <div class="dashboard-bottom">

            <!-- ======================================
                    RECENT ACTIVITIES
            ======================================= -->

            <section class="admin-section">

                <div class="section-header">

                    <h2>

                        Recent Activities

                    </h2>

                </div>

                <ul class="activity-list">

                    <li>

                        <strong>Admin</strong> published
                        <strong>"AI Revolution in Education"</strong>

                        <span class="activity-time">

                            10 minutes ago

                        </span>

                    </li>

                    <li>

                        <strong>Editor</strong> added a new
                        category
                        <strong>"Health"</strong>

                        <span class="activity-time">

                            35 minutes ago

                        </span>

                    </li>

                    <li>

                        <strong>Reporter</strong> created
                        a draft news article

                        <span class="activity-time">

                            1 hour ago

                        </span>

                    </li>

                    <li>

                        <strong>Admin</strong> updated
                        category
                        <strong>"Technology"</strong>

                        <span class="activity-time">

                            Yesterday

                        </span>

                    </li>

                    <li>

                        <strong>Editor</strong> deleted
                        one outdated article

                        <span class="activity-time">

                            2 days ago

                        </span>

                    </li>

                </ul>

            </section>

            <!-- ======================================
                    QUICK ACTIONS
            ======================================= -->

            <section class="admin-section">

                <div class="section-header">

                    <h2>

                        Quick Actions

                    </h2>

                </div>

                <div class="quick-actions">

                    <a href="news-form.html"
                       class="action-btn">

                        + Add News

                    </a>

                    <a href="category-form.html"
                       class="action-btn">

                        + Add Category

                    </a>

                    <a href="news.html"
                       class="action-btn">

                        Manage News

                    </a>

                    <a href="category.html"
                       class="action-btn">

                        Manage Categories

                    </a>

                    <a href="../index.html"
                       class="action-btn">

                        View Website

                    </a>

                    <a href="login.html"
                       class="action-btn logout-btn">

                        Logout

                    </a>

                </div>

            </section>

        </div>

        <!-- ======================================
                FOOTER
        ======================================= -->

        <footer class="admin-footer">

            <p>

                © 2026 Daily News Portal |
                Admin Dashboard |
                All Rights Reserved.

            </p>

        </footer>

    </main>

</div>

</body>

</html>