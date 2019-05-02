<?php
    unlink('./scripts/' . $_POST['delete'])
    ?>
    <form action="/" id="goHome"></form>
    <script>
        document.getElementById('goHome').submit()
    </script>