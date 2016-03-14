<div class="magazine">
    <div class="name_issue">

        <?php
        echo $publication->publication_name;
        echo $issue->issue_number;
        ?>

    </div>

    <div class = "date" >
        <?php echo $issue->issue_date_publication; ?>
    </div>

</div>