<?php
/**
 *
 * This file is part of HESK - PHP Help Desk Software.
 *
 * (c) Copyright Klemen Stirn. All rights reserved.
 * https://www.hesk.com
 *
 * For the full copyright and license agreement information visit
 * https://www.hesk.com/eula.php
 *
 */

/* Check if this is a valid include */
/* if (!defined('IN_SCRIPT')) {
    die('Invalid attempt');
} */

#error_reporting(E_ALL);

/*** FUNCTIONS ***/
require(HESK_PATH . 'hesk_settings.inc.php');

function getStatisticData()
{
    hesk_load_database_functions();
    hesk_dbConnect();

    $query = "SELECT * FROM hesk_users";
    $sql = mysqli_query($GLOBALS['hesk_db_link'], $query);
    if ($sql) {
        $result = array();
        while ($row = mysqli_fetch_array($sql)) {
            array_push(
                $result,
                array(
                    'id' => $row['id'],
                    'nama' => $row['nama'],
                    'alamat' => $row['alamat'],
                    'hoby' => $row['hoby']
                )
            );
        }
        /*  echo json_encode(array('result' => $result)); */
        /*         echo json_encode($result); */
        return $result;
    }
}
?>