<h2>My Magazines</h2>
<?php
    $this->table->set_heading('Publication', 'Issue', 'Date', 'Cover', 'Actions');
    echo $this->table->generate($magazines);
?>