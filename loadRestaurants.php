<?php
if($_POST['page'])
{
$page = $_POST['page'];
$cur_page = $page;
$page -= 1;
$per_page = 9;
$previous_btn = true;
$next_btn = true;
$first_btn = true;
$last_btn = true;
$start = $page * $per_page;
include"database.php";

$query_pag_data = "SELECT
                            restaurante.id as id,
                            restaurante.nombre as nombre,
                            restaurante.descripcion,
                            multimedia.ruta as ruta
                        FROM
                            restaurante,
                            multimedia
                        WHERE
                            restaurante.id = multimedia.Restaurante_id
                        AND 
                            multimedia.plato_id is NULL
                        LIMIT
                            $start,
                            $per_page";


$result_pag_data = mysql_query($query_pag_data) or die('MySql Error' . mysql_error());
$msg = "";
while ($row = mysql_fetch_array($result_pag_data)) {
    //$htmlmsg=htmlentities($row['message']);
    //$msg .= "<li><b>" . $row['msg_id'] . "</b> " . $htmlmsg . "</li>";

    $htmlmsg=htmlentities($row['nombre']);
    $htmlimg=htmlentities($row['ruta']);
    header("Content-type: .gif");
    $msg .= "<div class='item'> <div class='foto'><img src='imagesRestaurant/".$htmlimg."' alt='imagesRestaurant/".$htmlimg."'/></div> <div class='texto'  onclick='mostrar(".$row['id'].")'><p><a href='infoRestaurant.php?id=".$row['id']."'>".$htmlmsg."</a></p></div> </div>";
}
$msg = "<div class='data'>" . $msg . "</div>"; // Content for Data


/* --------------------------------------------- */
//$query_pag_num = "SELECT COUNT(*) AS count FROM messages";

$query_pag_num = "SELECT COUNT(*) AS count FROM restaurante";
$result_pag_num = mysql_query($query_pag_num);
$row = mysql_fetch_array($result_pag_num);
$count = $row['count'];
$no_of_paginations = ceil($count / $per_page);

/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
if ($cur_page >= 7) {
    $start_loop = $cur_page - 3;
    if ($no_of_paginations > $cur_page + 3)
        $end_loop = $cur_page + 3;
    else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
        $start_loop = $no_of_paginations - 6;
        $end_loop = $no_of_paginations;
    } else {
        $end_loop = $no_of_paginations;
    }
} else {
    $start_loop = 1;
    if ($no_of_paginations > 7)
        $end_loop = 7;
    else
        $end_loop = $no_of_paginations;
}
/* ----------------------------------------------------------------------------------------------------------- */
$msg .= "<div class='pagination'><ul>";

// FOR ENABLING THE FIRST BUTTON
if ($first_btn && $cur_page > 1) {
    $msg .= "<li p='1' class='active'>Primera</li>";
} else if ($first_btn) {
    $msg .= "<li p='1' class='inactive'>Primera</li>";
}

// FOR ENABLING THE PREVIOUS BUTTON
if ($previous_btn && $cur_page > 1) {
    $pre = $cur_page - 1;
    $msg .= "<li p='$pre' class='active'>Anterior</li>";
} else if ($previous_btn) {
    $msg .= "<li class='inactive'>Anterior</li>";
}
for ($i = $start_loop; $i <= $end_loop; $i++) {

    if ($cur_page == $i)
        $msg .= "<li p='$i' style='color:#fff;background-color:#006699;' class='active'>{$i}</li>";
    else
        $msg .= "<li p='$i' class='active'>{$i}</li>";
}

// TO ENABLE THE NEXT BUTTON
if ($next_btn && $cur_page < $no_of_paginations) {
    $nex = $cur_page + 1;
    $msg .= "<li p='$nex' class='active'>Proxima</li>";
} else if ($next_btn) {
    $msg .= "<li class='inactive'>Proxima</li>";
}

// TO ENABLE THE END BUTTON
if ($last_btn && $cur_page < $no_of_paginations) {
    $msg .= "<li p='$no_of_paginations' class='active'>Ultima</li>";
} else if ($last_btn) {
    $msg .= "<li p='$no_of_paginations' class='inactive'>Ultima</li>";
}
$goto = -"<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:60px;'/><input type='button' id='go_btn' class='go_button' value='Ir'/>";
$total_string = "<span class='total' a='$no_of_paginations'>P&aacute;g. <b>" . $cur_page . "</b> de <b>$no_of_paginations</b></span>";
$msg = $msg . "</ul>" . $goto . $total_string . "</div>";  // Content for pagination
echo $msg;
}

