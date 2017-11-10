<div class="left-sidebar">
    <div class="left-sidebar-widget">
        <div class="title">
            <h3>Who's Online?</h3>
        </div>
        <div class="sidebar-content">
            <table class="online">
                <tr>
                    <td><a href="">FTW_CTR</a></td>
                    <td class="label-online"><a href="">Cameron Bristol</a> | I3</td>
                </tr>
                <tr>
                    <td><a href="">REG_APP</a></td>
                    <td class="label-online"><a href="">John Bartlett</a> | I1</td>
                </tr>
            </table>
        </div>
    </div>
    <?php
    if ($_SESSION['first_name']!=""){
        ?>
        <div class="left-sidebar-widget">
            <div class="title">
                <h3>Controller Actions</h3>
            </div>
            <div class="sidebar-content">
                Welcome, <em><?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] . " (" . $_SESSION['OI'] .")"; ?></em>
                <div class="list-group" style="width: 100%;">
                    <a class="list-group-item-link" href="" style="background: transparent; border-top: .5px solid slategray;">
                        <table >
                            <tr>
                                <td>Training Requests</td>
                            </tr>
                        </table>
                    </a>
                    <a class="list-group-item-link" href="" style="background: transparent;">
                        <table >
                            <tr>
                                <td>Unread CBTs</td>
                            </tr>
                        </table>
                    </a>
                    <a class="list-group-item-link" href="" style="background: transparent;">
                        <table >
                            <tr>
                                <td>New Tests</td>
                            </tr>
                        </table>
                    </a><a class="list-group-item-link" href="" style="background: transparent;">
                        <table >
                            <tr>
                                <td>Account Management</td>
                            </tr>
                        </table>
                    </a>

                    <a class="list-group-item-link" href="http://localhost/ZFW/Frontend/logout.php" style="background: transparent; border-bottom: 0; padding-bottom: 0;">
                        <table >
                            <tr>
                                <td><b>Logout</b></td>
                            </tr>
                        </table>
                    </a>
                </div>
            </div>
        </div>
        <?php;
    }
    ?>
    <div class="left-sidebar-widget">
        <div class="title">
            <h3>Upcoming Events</h3>
        </div>
        <div class="sidebar-content">
            <table class="online">
                <tr>
                    <td><a href="">I20 Poker Run</a></td>
                    <td class="label-date"><a href="">Sept 28</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="left-sidebar-widget">
        <div class="title">
            <h3>Quick Chart Search</h3>
        </div>
        <div class="sidebar-content">
            <table class="chart-search">
                <tr>
                    <td>
                        <form method="post" class="search">
                            <input type="text" placeholder="ICAO"/>
                            <input type="submit" value="Search"/>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="left-sidebar-widget">
        <div class="title">
            <h3>Schedule for Thursday August 3<sup>rd</sup></h3>
        </div>
        <div class="sidebar-content">
            <div class="controller-schedule">
                <input type="button" value="Previous Day"/>
                <input type="button" value="Next Day"/>
                <p>There are currently no controllers scheduled for this day.</p>
                <?php if ($_SESSION['first_name']!=""){?><input type="button" class="signup" value="Controller Signup"/><?php;}?>
            </div>
        </div>
    </div>
    <div class="fb-page"></div>
</div>