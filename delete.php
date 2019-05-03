<?php
    $_POST['delete'] ? unlink('./scripts/' . $_POST['delete']) : null ;
?>
    <form action="/" id="goHome" method="post">
        <?php echo "<input name='deleteDraft' value'".$_POST['deleteDraft']."' type='hidden' />" ?>
    </form>
    <script>
        document.getElementById('goHome').submit()
    </script>