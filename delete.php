<?php
    $_POST['delete'] ? unlink('./scripts/' . $_POST['delete']) : null ;
    $_POST['deleteDraft'] ? unlink('./draft/' . $_POST['deleteDraft'] . '.json') : null;
    // echo $_POST['deleteDraft'];
?>
    <form action="/" id="goHome"></form>
    <script>
        document.getElementById('goHome').submit()
    </script>