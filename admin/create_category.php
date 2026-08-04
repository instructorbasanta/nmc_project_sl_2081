<?php 
require_once '../function.php';
$error = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //check title
    if (checkEmpty('title', 'Category title') != '') {
        $error['title'] = "Category title is required";
    } else {
        $title = $_POST['title'];   
        # code...
    }

    //check rank
    if (checkEmpty('rank', 'Display rank') != '') {
        $error['rank'] = "Display rank is required";
    } else {
        $rank = $_POST['rank'];     
        if (!checkNumeric('rank', 'Display rank')) {
            $error['rank'] = "Display rank must be a number";
        }
    }

    $status = $_POST['status'];
    $created_by = $_SESSION['user']['id'] ?? 1; // Default to 1 if not set
    //store into database if no error
    if (count($error) == 0) {
        try {
            $connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if ($connect->connect_error) {
                throw new Exception("Connection failed: " . $connect->connect_error);
            }
            $title = $connect->real_escape_string($title);
            $rank = $connect->real_escape_string($rank);
            $sql = "INSERT INTO categories (title, rank, status, created_by) VALUES ('$title', '$rank', '$status', '$created_by')";
            if ($connect->query($sql) === TRUE) {
                header("Location: category.php?msg=Category created successfully");
                exit();
            } else {
                throw new Exception("Error: " . $sql . "<br>" . $connect->error);
            }
        }catch (Exception $e) {
            $error['connection'] = "Error: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Add / Edit Category | Daily News Portal</title>

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
                TOP NAVIGATION
        =================================== -->

        <header class="admin-header">

            <div>

                <h2>

                    Add / Edit Category

                </h2>

                <p>

                    Create or update a news category

                </p>

            </div>

            <div class="admin-user">

                👤 Administrator

            </div>

        </header>

        <!-- ==================================
                BREADCRUMB
        =================================== -->

        <section class="admin-section">

            <div class="section-header">

                <div>

                    <h2>

                        Category Form

                    </h2>

                    <p>

                        Dashboard >
                        Categories >
                        Category Form

                    </p>

                </div>

                <div>

                    <a href="category.html"
                       class="action-btn">

                        ← Back to List

                    </a>

                </div>

            </div>

        </section>

        <!-- ==================================
                CATEGORY FORM
        =================================== -->

        <section class="admin-section">

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                <!-- Category Title -->

                <div class="form-group">

                    <label>

                        Category Title

                    </label>

                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        placeholder="Enter category title"
                        value="<?php echo $_POST['title']??'' ?>"
                        >
                        <?php echo displayError($error,'title') ?>

                </div>

                <!-- Rank -->

                <div class="form-group">

                    <label>

                        Display Rank

                    </label>

                    <input
                        type="text"
                        class="form-control"
                        placeholder="Enter display rank"
                        name="rank"
                        value="<?php echo $_POST['rank']??'' ?>"
                        >
                        <?php echo displayError($error,'rank') ?>

                </div>

                <!-- Status -->

                <div class="form-group">

                    <label>

                        Status

                    </label>
                    <input type="radio" name="status" value="1" <?php echo isset($_POST['status']) && $_POST['status'] == 1 ?"checked":'' ?> > Active
                    <input type="radio" name="status" value="0" <?php echo (isset($_POST['status']) && $_POST['status'] == 0) || !isset($_POST['status']) ?"checked":'' ?>> Inactive

                   
                </div>

              
                <div class="form-group"
                     style="display:flex;
                            gap:15px;
                            flex-wrap:wrap;
                            margin-top:30px;">

                    <button type="submit"
                            class="action-btn btn-success">

                        💾 Save Category

                    </button>

                    <button type="reset"
                            class="action-btn btn-danger">

                        🔄 Reset

                    </button>

                    <a href="category.html"
                       class="action-btn">

                        ← Back to List

                    </a>

                </div>

            </form>

        </section>

        <!-- ==================================
                FOOTER
        =================================== -->

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