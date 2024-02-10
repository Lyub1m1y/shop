
     <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
             <?php
             include "../db.php";
             if (isset($_SESSION["uid"])) {
                 $sql = "SELECT first_name FROM user_info WHERE user_id='$_SESSION[uid]'";
                 $query = mysqli_query($con, $sql);
                 $row = mysqli_fetch_array($query);

                 echo '
                    <div class="dropdownn">
                        <a class="navbar-brand" href="javascript:void(0)">Привет ' . $row["first_name"] . ' !</a>
                    </div>';
            }
             ?>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
        </div>
      </nav>
      