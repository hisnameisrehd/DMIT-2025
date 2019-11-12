<?php
session_start();

include("includes/header.php");

$id = $_GET['id'];
?>

<?php
$result = mysqli_query($con, "SELECT * FROM image_gallery WHERE id = $id");
?>

<?php while ($row = mysqli_fetch_array($result)) : ?>
    <!-- Go ahead and do some HTML/CSS styling in here...I dare you! -->
    <div class="row">
        <div class="col-9">
            <?php if ($row['npe_file'] != "") : ?>
                <img src="images/display/<?php echo $row['npe_file']; ?>" alt="">
            <?php endif; ?>
        </div>

        <div class="col-3">
            <?php if ($row['npe_title'] != "") : ?>
                <h1><?php echo $row['npe_title']; ?></h1>
            <?php endif; ?>
            <?php if ($row['npe_description'] != "") : ?>
                <p><?php echo $row['npe_description']; ?></p>
            <?php endif; ?>
            <div>
                <button class="btn btn-info back-button"><<-</button>
                <button class="btn btn-info next-button">->></button>
            </div>
        </div>
    </div>

<?php endwhile; ?>

<script type="text/javascript">
    nextButton = document.querySelector(".next-button");
    backButton = document.querySelector(".back-button");

    nextButton.addEventListener("click", e => {
        <?php
        $nextPage = $id + 1;
        $result = mysqli_query($con, "SELECT * FROM image_gallery WHERE id > $id LIMIT 1");
        ?>
        <?php while ($row = mysqli_fetch_array($result)) : ?>
            <?php if ($row['id'] != null) : ?>
                window.location.href = "http://npeters5.dmitstudent.ca/dmit2025/image-gallery/gallery.php?id=<?php echo $row['id'] ?>";
            <?php endif; ?>
        <?php endwhile; ?>
    })

    backButton.addEventListener("click", e => {
        <?php
        $nextPage = $id + 1;
        $result = mysqli_query($con, "SELECT * FROM image_gallery WHERE id < $id LIMIT 1");
        ?>
        <?php while ($row = mysqli_fetch_array($result)) : ?>
            <?php if ($row['id'] != null) : ?>
                window.location.href = "http://npeters5.dmitstudent.ca/dmit2025/image-gallery/gallery.php?id=<?php echo $row['id'] ?>";
            <?php endif; ?>
        <?php endwhile; ?>
    })
</script>

<?php
include("includes/footer.php");
?>