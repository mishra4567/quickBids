<?php
function pr($arr)
{
    echo '<pre>';
    print_r($arr);
};
function prx($arr)
{
    echo '<pre>';
    print_r($arr);
    die();
};
function get_safe_value($con, $str)
{
    if ($str != "") {
        $str = trim($str);
        return strip_tags(mysqli_real_escape_string($con, $str));
    }
};

function isAdmin()
{
    if (!isset($_SESSION['QBADMIN_LOGIN'])) {
?>
        <script>
            window.location.href = 'index.php'
        </script>
    <?php
    }
    if ($_SESSION['QBADMIN_ROLE'] == 1) {
    ?>
        <script>
            window.location.href = 'index.php'
        </script>
<?php
    }
}
