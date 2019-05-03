<?php
    $_POST['delete'] ? unlink('./scripts/' . $_POST['delete']) : null ;
?>
    <form action="/" id="goHome">
    </form>
    <script>
        document.getElementById('goHome').submit()
    </script>