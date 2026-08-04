<?php
require_once "../function.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Category Management | Daily News Portal</title>

    <link rel="stylesheet"
          href="../css/style.css">

</head>

<body>

<!-- ==========================================
        ADMIN LAYOUT
========================================== -->

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

                    Category Management

                </h2>

                <p>

                    Manage all news categories

                </p>

            </div>

            <div class="admin-user">

                👤 Administrator

            </div>

        </header>

        <!-- ==================================
                PAGE HEADER
        =================================== -->

        <section class="admin-section">

            <div class="section-header">

                <div>

                    <h2>

                        Category List

                    </h2>

                    <p>

                        Dashboard >
                        Category Management

                    </p>

                </div>

                <div>

                    <a href="create_category.php"
                       class="action-btn">

                        + Add Category

                    </a>

                </div>

            </div>

        </section>

        <!-- ==================================
                SEARCH BAR
        =================================== -->

        <section class="admin-section">

            <div class="search-box-admin">

                <input
                    type="text"
                    class="form-control"
                    placeholder="Search category by title...">

                <button
                    class="action-btn">

                    Search

                </button>

            </div>

        </section>

        <!-- ==================================
             Continue in Phase 5D-2
             Category Table
        =================================== -->
                <!-- ==========================================
                CATEGORY TABLE
        =========================================== -->

        <section class="admin-section">

            <div class="table-responsive">
                <?php
                if (isset($_GET['msg'])) {
                    echo displayFlashMessage($_GET['msg'],'success');
                }   
                ?>

                <table class="admin-table">

                    <thead>

                        <tr>

                            <th>ID</th>

                            <th>Title</th>

                            <th>Rank</th>

                            <th>Status</th>

                            <th>Created At</th>

                            <th>Updated At</th>

                            <th>Created By</th>

                            <th>Updated By</th>

                            <th width="160">

                                Actions

                            </th>

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

                            <td>15 Jul 2026</td>

                            <td>Admin</td>

                            <td>Editor</td>

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

                            <td>10 Jul 2026</td>

                            <td>Admin</td>

                            <td>Admin</td>

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

                            <td>05 Jan 2026</td>

                            <td>18 Jul 2026</td>

                            <td>Editor</td>

                            <td>Editor</td>

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

                            <td>08 Jan 2026</td>

                            <td>20 Jul 2026</td>

                            <td>Admin</td>

                            <td>Reporter</td>

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

                            <td>5</td>

                            <td>Education</td>

                            <td>5</td>

                            <td>

                                <span class="status published">

                                    Active

                                </span>

                            </td>

                            <td>10 Jan 2026</td>

                            <td>22 Jul 2026</td>

                            <td>Admin</td>

                            <td>Editor</td>

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

                            <td>6</td>

                            <td>Entertainment</td>

                            <td>6</td>

                            <td>

                                <span class="status published">

                                    Active

                                </span>

                            </td>

                            <td>12 Jan 2026</td>

                            <td>25 Jul 2026</td>

                            <td>Editor</td>

                            <td>Admin</td>

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

        <!-- ==========================================
                PAGINATION
        =========================================== -->

        <section class="admin-section">

            <div class="pagination">

                <a href="#">

                    Previous

                </a>

                <a href="#"
                   class="active">

                    1

                </a>

                <a href="#">

                    2

                </a>

                <a href="#">

                    3

                </a>

                <a href="#">

                    Next

                </a>

            </div>

        </section>

        <!-- Continue in Phase 5D-3 -->
                 <!-- ==========================================
                PAGE FOOTER
        =========================================== -->

        <footer class="admin-footer">

            <p>

                © 2026 Daily News Portal |
                Category Management |
                All Rights Reserved.

            </p>

        </footer>

    </main>

</div>

</body>

</html>