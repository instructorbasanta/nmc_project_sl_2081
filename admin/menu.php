<ul class="sidebar-menu">
<?php require_once '../function.php' ; ?>
<li>

    <a href="dashboard.php"
       class="<?php echo checkCurrentPage('dashboard.php') ?>">

        🏠 Dashboard

    </a>

</li>

<li>

    <a href="category.php" class="<?php echo checkCurrentPage('category.php') ?>">

        📂 Categories

    </a>

</li>

<li>

    <a href="news.php" class="<?php echo checkCurrentPage('news.php') ?>">

        📰 News

    </a>

</li>

<li>

    <a href="register.html" class="<?php echo checkCurrentPage('register.html') ?>">

        👤 Users

    </a>

</li>

<li>

    <a href="../index.html">

        🌐 View Website

    </a>

</li>

<li>

    <a href="logout.php">

        🚪 Logout

    </a>

</li>

</ul>