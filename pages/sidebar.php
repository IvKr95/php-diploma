<aside class="main-sidebar">
    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="../vendor/robot.png" width="160" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p class="user-name"><?= $_SESSION['name'] ?></p>
                <a href="#">
                    <i class="fa fa-circle text-success"></i> Online
                </a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">
                Sort by
            </li>
            <li class="menu-item">
                <a href="#" class="menu-btn all" role="button">
                    <span>All</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-btn new" role="button">
                    <span>New</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-btn resolved" role="button">
                    <span>Resolved</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-btn rejected" role="button">
                    <span>Rejected</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-btn done" role="button">
                    <span>Done</span>
                </a>
            </li>
        </ul>

        <ul class="sidebar-menu">
            <?php
                if ($_SESSION['role'] === 'manager') {
                    echo '<li class="header">
                            <div class="pull-right">
                                <button type="button" class="create btn btn-block btn-success btn-xs">
                                    <span class="fa fa-plus"></span>
                                    Create new
                                </button>
                            </div>
                        </li>';
                };
            ?>
            
            <li class="header">
                <form action="../logout.php" method="post">
                    <button type="submit" class="logout btn btn-danger">Log out</button>
                </form>
            </li>
        </ul>
    </section>
</aside>