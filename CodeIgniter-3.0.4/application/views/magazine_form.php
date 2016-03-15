<?php echo validation_errors();?>
<?php echo $this->upload->display_errors('<div class = "alert alert-error">', '</div>'); ?>
<?php echo form_open_multipart(); ?>
<!--<form method="post">-->
    <div>
        <?php echo form_label('Publication Name', 'publication_id'); ?>
        <?php echo form_dropdown('publication_id', $publication_form_options, set_value('publication_id')); ?>

<!--        <label for="publication_id">Publication Name</label>-->
<!--        <select name="publication_id">-->
<!--            --><?php
//            foreach ($publication_form_options as $publication_id => $publication_name) {
//                echo '<option value="' . html_escape($publication_id). '">' . html_escape($publication_name). '</option>';
//            }
//            ?>
<!--        </select>-->
    </div>

    <div>
        <?php echo form_label('Issue Number', 'issue_number'); ?>
        <?php echo form_input('issue_number', set_value('issue_number')); ?>
        <!--        <label for=" issue_number">Issue Number</label>-->
<!--        <input type="text" name="issue_number" value=""/>-->
    </div>
    <div>
        <?php echo form_label('Date Published', 'issue_date_publication'); ?>
        <?php echo form_input('issue_date_publication', set_value('issue_date_publication')); ?>
<!--        <label for=" issue_date_publication">Date Published</label>-->
<!--        <input type="text" name="issue_date_publication" value=""/>-->
    </div>
    <div>
        <?php echo form_label('Cover scan', 'issue_cover'); ?>
        <?php echo form_upload('issue_cover'); ?>
    </div>

    <div>
<!--        <input type="submit" value="Save"/>-->
        <?php echo form_submit('save', 'Save'); ?>
    </div>
<?php echo form_close();?>