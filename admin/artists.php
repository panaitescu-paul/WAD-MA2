<?php
    include_once('../fragments/header-admin.php');
?>

<?php
    require_once('../src/functions.php');

    session_start();
    debug($_SESSION);

    if (!isset($_SESSION['userID'])) {
        header('Location: ../auth/login.php');
    }
    // if you are loged in as Customer, then you are redirected to a Customer page
    if (isset($_SESSION['userID']) && $_SESSION['userID'] !== 0) {
        header('Location: ../user/library-tracks.php');
    }
    
    $userID = $_SESSION['userID'];
    $firstName = $_SESSION['firstName'];
    $lastName = $_SESSION['lastName'];
    $email = $_SESSION['email'];
?>

<!-- Start of Page content -->
<div class="container" id="page-artists">

    <!-- Sidebar navigation -->
    <div class="sidebar">
        <button type="button" class="btn btn-primary scrollUp">Up</button>
        <button type="button" class="btn btn-primary scrollDown">Down</button>
    </div>

    <h1 class="main-title">Artists</h1>
    <div class="resultArea">
        <div class="controls">
            <button type="button" class="btn btn-success mb-2 createArtistModal" 
                    id="btnAdd" data-toggle='modal' data-target='#modal'>Create Artist</button>
            <label for="txtName" id="txtNameLabel">Artist Name</label>
            <input type="text" id="searchArtistName" name="Name" class="form-control" required>
            </br>
            <button type="button" class="btn btn-success mb-2" id="btnSearchArtist">Search Artist</button>
        </div>
        
        <section id="artistResults" class="table-responsive">
        </section>
    </div>
</div>

<!-- End of Page content -->

<?php
    include_once('../fragments/footer.php');
?>
