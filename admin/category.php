<?php
require_once "../function.php";
$limit = 2;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $offset = ($page-1)*$limit;
} else {
    $offset = 0;
    $page = 1;
}

try {
$connection = new mysqli(DB_HOST,DB_USER,DB_PASS, DB_NAME);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
} catch (Exception $e) {
    die("Database connection error: " . $e->getMessage());
}
$sqlRecordCount = "select count(*) as total_record from categories";
$resultTotalCount = $connection->query($sqlRecordCount);
$record = $resultTotalCount->fetch_assoc();
$total_page = ceil($record['total_record']/$limit);

$sql = "SELECT categories.*,admins.name as username FROM categories join admins on categories.created_by=admins.id limit $limit offset $offset";
$result = $connection->query($sql);
$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}  
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

                <?php
                if (isset($_GET['response']) && $_GET['response'] ==  1) {
                    echo displayFlashMessage('Deleted successfully','success');
                }   
                ?>

                <?php
                if (isset($_GET['response']) && $_GET['response'] ==  0) {
                    echo displayFlashMessage('Delete failed','error');
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
                        <?php foreach($data as $category){ ?>

                        <tr>

                            <td><?php echo $category['id'] ?></td>

                            <td><?php echo $category['title'] ?></td>

                            <td><?php echo $category['rank'] ?></td>

                            <td>
                                <?php if ($category['status'] ==  1) { ?>
                                    <span class="status published" style='color:green'>

Active

</span>
                               <?php } else { ?>
                                    <span class="status " style='color:red'>

DeActive

</span>
                              <?php   } ?>

                               

                            </td>

                            <td><?php echo $category['created_at'] ?></td>

                            <td><?php echo $category['updated_at'] ?></td>

                            <td><?php echo $category['username'] ?></td>

                            <td><?php echo $category['updated_by'] ?></td>

                            <td>

                                <a href="category-form.html"
                                   class="btn-sm btn-warning">

                                    Edit

                                </a>

                                <a href="delete_category.php?id=<?php echo $category['id'] ?>"
                                   class="btn-sm btn-danger" style='margin-top:10px'>

                                    Delete

                                </a>

                            </td>

                        </tr>
                        <?php } ?>
                    </tbody>

                </table>

            </div>

        </section>

        <!-- ==========================================
                PAGINATION
        =========================================== -->

        <section class="admin-section">
            <?php if($total_page > 1){ ?>
            <div class="pagination">
            
            <?php if($page != 1){ ?>
                <a href="category.php?page=<?php echo $page>1?$page-1:$page ?>">

                    Previous

                </a>
                <?php } ?>
                <?php for($i=1;$i<=$total_page;$i++){ ?>
                    <a href="category.php?page=<?php echo $i ?>" class="<?php echo ($page == $i)?'active':'' ?>" ><?php echo $i; ?></a>
                <?php } ?>
               
            <?php if($total_page != $page){ ?>
                <a href="category.php?page=<?php echo $page<$total_page?$page+1:$page ?>">

                    Next

                </a>
                <?php } ?>
            </div>
            <?php } ?>

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