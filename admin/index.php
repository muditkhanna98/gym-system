<?php
session_start();
//the isset function to check username is already loged in and stored on the session
if (!isset($_SESSION['user_id'])) {
  header('location:../index.php');
}
include "dbcon.php";
$qry = "SELECT services, count(*) as number FROM members GROUP BY services";
$result = mysqli_query($con, $qry);
$qry = "SELECT gender, count(*) as enumber FROM members GROUP BY gender";
$result3 = mysqli_query($con, $qry);
$qry = "SELECT designation, count(*) as snumber FROM staffs GROUP BY designation";
$result5 = mysqli_query($con, $qry);
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <title>Gym System Admin</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
  <link rel="stylesheet" href="../css/fullcalendar.css" />
  <link rel="stylesheet" href="../css/matrix-style.css" />
  <link rel="stylesheet" href="../css/matrix-media.css" />
  <link href="../font-awesome/css/all.css" rel="stylesheet" />
  <link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
  <link rel="stylesheet" href="../css/jquery.gritter.css" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>

<body>

  <!--Header-part-->
  <div id="header">
    <h1><a href="dashboard.html">Perfect Gym Admin</a></h1>
  </div>
  <!--close-Header-part-->


  <!--top-Header-menu-->
  <?php include 'includes/topheader.php' ?>
  <!--close-top-Header-menu-->


  <!--sidebar-menu-->
  <?php $page = 'dashboard';
  include 'includes/sidebar.php' ?>
  <!--sidebar-menu-->

  <!--main-container-part-->
  <div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
      <div id="breadcrumb"> <a href="index.php" title="You're right here" class="tip-bottom"><i class="fa fa-home"></i>
          Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
      <div class="quick-actions_homepage">
        <ul class="quick-actions">
          <li class="bg_ls span"> <a href="index.php" style="font-size: 16px;"> <i class="fas fa-user-check"></i> <span
                class="label label-important">
                <?php include 'actions/dashboard-activecount.php' ?>
              </span> Active Members </a> </li>
          <li class="bg_lo span3"> <a href="members.php" style="font-size: 16px;"> <i class="fas fa-users"></i></i><span
                class="label label-important">
                <?php include 'dashboard-usercount.php' ?>
              </span> Registered Members</a> </li>
          <li class="bg_lg span3"> <a href="payment.php" style="font-size: 16px;"> <i class="fa fa-dollar-sign"></i>
              Total Earnings: $
              <?php include 'income-count.php' ?>
            </a> </li>
          <li class="bg_lb span2"> <a href="announcement.php" style="font-size: 16px;"> <i
                class="fas fa-bullhorn"></i><span class="label label-important">
                <?php include 'actions/count-announcements.php' ?>
              </span>Announcements </a> </li>

        </ul>
      </div>

      <div class="row-fluid">
        <div class="span6">
          <div class="widget-box">
            <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i
                  class="fas fa-chevron-down"></i></span>
              <h5>Gym Announcement</h5>
            </div>
            <div class="widget-content nopadding collapse in" id="collapseG2">
              <ul class="recent-posts">
                <li>
                  <?php
                  include "dbcon.php";
                  $qry = "SELECT * FROM announcements";
                  $result = mysqli_query($conn, $qry);
                  while ($row = mysqli_fetch_array($result)) {
                    echo "<div class='user-thumb'> <img width='70' height='40' alt='User' src='../img/demo/av1.jpg'> </div>";
                    echo "<div class='article-post'>";
                    echo "<span class='user-info'> By: System Administrator / Date: " . $row['date'] . " </span>";
                    echo "<p><a href='#'>" . $row['message'] . "</a> </p>";

                  }
                  echo "</div>";
                  echo "</li>";
                  ?>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div> <!-- End of ToDo List Bar -->
    </div><!-- End of Announcement Bar -->
  </div><!-- End of container-fluid -->
  </div><!-- End of content-ID -->

  <script src="../js/excanvas.min.js"></script>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery.ui.custom.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.flot.min.js"></script>
  <script src="../js/jquery.flot.resize.min.js"></script>
  <script src="../js/jquery.peity.min.js"></script>
  <script src="../js/fullcalendar.min.js"></script>
  <script src="../js/matrix.js"></script>
  <script src="../js/matrix.dashboard.js"></script>
  <script src="../js/jquery.gritter.min.js"></script>
  <script src="../js/matrix.chat.js"></script>
  <script src="../js/jquery.validate.js"></script>
  <script src="../js/matrix.form_validation.js"></script>
  <script src="../js/jquery.wizard.js"></script>
  <script src="../js/jquery.uniform.js"></script>
  <script src="../js/select2.min.js"></script>
  <script src="../js/matrix.popover.js"></script>
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/matrix.tables.js"></script>

  <script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage(newURL) {
      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
        // if url is "-", it is this page -- reset the menu:
        if (newURL == "-") {
          resetMenu();
        }
        // else, send page to designated URL            
        else {
          document.location.href = newURL;
        }
      }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
      document.gomenu.selector.selectedIndex = 2;
    }
  </script>
</body>

</html>