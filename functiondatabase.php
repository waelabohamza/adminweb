<?php

//=====================================================================
// جميع الحقوق محفوظة للمهندس وائل احمد ابو حمزه 
// 
//  CopyRight By Wael Abu Hamza
//=====================================================================


define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);

$now = date('Y-m-d H:i:s', time());

function superFilter($var)
{
    return  htmlspecialchars(strip_tags(trim($var)));
}
function checkLength($name, $str, $min, $max)
{
    global  $msgerrors;
    if (strlen($str) > $max) {
        $msgerrors[] = $name  . " Can't To be more than " . $max  .  "  letter  or number";
    }
    if (strlen($str) < $min) {
        $msgerrors[] = $name . "   Can't To be less than  " . $min . " letter or number ";
    }
}

function getAllData($table, $where = null, $values = null, $and = null)
{
    global $con;
    $data = array();
    $stmt = $con->prepare("SELECT  * FROM $table WHERE   $where  $and ");
    $stmt->execute($values);
    $values = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count  = $stmt->rowCount();
    $data['values'] = $values;
    $data['count'] = $count;
    return $data;
}
function insertData($table, $data)
{
    global $con;
    foreach ($data as $field => $v)
        $ins[] = ':' . $field;
    $ins = implode(',', $ins);
    $fields = implode(',', array_keys($data));
    $sql = "INSERT INTO $table ($fields) VALUES ($ins)";

    $stmt = $con->prepare($sql);
    foreach ($data as $f => $v) {
        $stmt->bindValue(':' . $f, $v);
    }
    $stmt->execute();
    $count = $stmt->rowCount();
    return $count;
}


function updateData($table, $data, $where)
{
    global $con;
    $cols = array();
    $vals = array();

    foreach ($data as $key => $val) {
        $vals[] = "$val";
        $cols[] = "`$key` =  ? ";
    }
    $sql = "UPDATE $table SET " . implode(', ', $cols) . " WHERE $where";

    $stmt = $con->prepare($sql);
    $stmt->execute($vals);
    $count = $stmt->rowCount();
    return $count;
}

function deleteData($table, $col, $value)
{
    global $con;
    $stmt = $con->prepare("DELETE FROM $table WHERE $col  = ? ");
    $stmt->execute(array($value));
    $count = $stmt->rowCount();
    return $count;
}
// ==============

function getData($table, $where, $value, $and = NULL)
{

    global $con;

    $data = array();

    $stmt = $con->prepare("SELECT * FROM $table WHERE $where = ? $and  ");

    $stmt->execute(array($value));

    $count = $stmt->rowCount();

    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    $data['count'] = $count;
    $data['values'] = $item;

    return $data;
}

function paginationLimit($getpage, $countrow)
{
    //  CountRow :  Number Items view In Evey Page
    if ($getpage != null) {
        $page = $getpage;
        $limit = "LIMIT $page , $countrow";
    } else {
        $limit = null;
    }
    return $limit;
}

function createJson($count, $values)
{
    if ($count > 0) {
        echo json_encode($values);
    } else {
        zeroCount();
    }
}

// ===========================

function countCoulmn($column, $table, $where = null)
{
    global $con;
    $stmt = $con->prepare("SELECT COUNT($column) FROM $table 
    $where ");
    $stmt->execute();
    $countcolumn = $stmt->fetchColumn();
    return $countcolumn;
}

function maxId($column, $table)
{
    global $con;
    $stmt = $con->prepare("SELECT MAX($column) FROM $table  ");
    $stmt->execute();
    $maxid = $stmt->fetchColumn();
    return $maxid;
}

//===========================

function signInWithEmailAndPassword($table, $columnemail, $columnpassword, $email, $password)
{
    global $con;
    $stmt = $con->prepare("SELECT * FROM $table WHERE $columnemail = ? AND $columnpassword = ?  AND users_approve = 1 ");
    $stmt->execute(array($email, $password));
    $user  = $stmt->fetch(PDO::FETCH_ASSOC);
    $data = array();
    $data['values'] = $user;
    $data['count'] = $stmt->rowCount();
    return $data;
}



//===========================

function deleteFile($filedir, $imageold)
{

    if (file_exists("../upload/" . $filedir . "/" . $imageold)) {
        unlink("../upload/" . $filedir . "/" . $imageold);
    }
}

// ==========================
//  count faild or success
// ==========================

function zeroCount()
{
    echo json_encode(array(0 => "falid"));
}


function countresault($count, $data = null)
{
    if ($count  > 0) {
        echo json_encode(array("status" => "success"));
    } else {
        if ($data != null) {
            echo json_encode(array("status" => "faild", "error" => $data));
        } else {
            echo json_encode(array("status" => "faild"));
        }
    }
}





// Send Email 

function sendEmail($email, $title, $body)
{
    $to         = $email;
    $subject    = $title;
    $txt        = $body;
    $headers    = "From: Support@SideShow.com" . "\r\n" .
        "CC: ddd@ddd.com";
    mail($to, $subject, $txt, $headers);
}



























// ======================================
//  Image Upload Function 
// ======================================



function image_data($imagerequset)
{
    global  $msgerrors;
    $imagename          = $_FILES[$imagerequset]['name'];
    $imagetype          = $_FILES[$imagerequset]['type'];
    $imagetmp           = $_FILES[$imagerequset]['tmp_name'];
    $imagesize          = $_FILES[$imagerequset]['size'];
    $allowextention     = array("jpg", "png", "jpeg", "gif"  , "pdf");
    $strtoarray         = explode(".", $imagename);
    $imageextentionone  = end($strtoarray);
    $imageextension     = strtolower($imageextentionone);
    if (!empty($imagename) && !in_array($imageextension, $allowextention)) {
        $msgerrors[] = "File Not Image";
    }
    if ($imagesize > 10 * MB) {
        $msgerrors[] = "can't upload File larger than 10 mb ";
    }
    if (empty($imagename)) {
        $msgerrors[] = "Not exist File";
    }
    $image = array();
    $image['name'] = $imagename;
    $image['tmp'] =  $imagetmp;
    return  $image;
}

function image_upload($imagename, $imagetmp, $directory)
{


    if (!empty($imagename)) {

        $image = rand(0, 1000000) . "_" . $imagename;
        move_uploaded_file($imagetmp, "uploads/" . $directory . "/" . $image);
    } else {
        $image = "";
    }

    return $image;
}

function edit_image($imagename, $imageold, $imagetmp, $directory)
{

    if (!empty($imagename)) {
        $image = rand(0, 10000) . "_" . $imagename;
        if (file_exists($directory . $imageold) && $imageold != "") {
            unlink($directory . $imageold);
        }
        move_uploaded_file($imagetmp, $directory . $image);
    } else {
        $image = $imageold;
    }
    return $image;
}


function image_data_multiple($imagerequset)
{
    global  $msgerrors;
    $imagename          = $_FILES[$imagerequset]['name'];
    $imagetype          = $_FILES[$imagerequset]['type'];
    $imagetmp           = $_FILES[$imagerequset]['tmp_name'];
    $imagesize          = $_FILES[$imagerequset]['size'];
    $numberarray = count($imagename);
    $allowextention     = array("jpg", "png", "jpeg", "gif");
    $image = array();


    for ($i = 0; $i < $numberarray; $i++) {

        $strtoarray[$i]         = explode(".", $imagename[$i]);
        $imageextentionone[$i]  = end($strtoarray[$i]);
        $imageextension[$i]     = strtolower($imageextentionone[$i]);
        if (!empty($imagename[$i]) && !in_array($imageextension[$i], $allowextention)) {
            $msgerrors[] = "this is file "  . $imagename[$i] . " Not Image ";
        }

        if ($imagesize[$i] > 10 * MB) {

            $msgerrors[] =  "this is file "  . $imagename[$i] . " larger Than 10 Mega ";
        }
        $image[$i]['name'] = $imagename[$i];
        $image[$i]['tmp'] =  $imagetmp[$i];
    }


    return  $image;
}


function image_upload_multiple($imagemultipe, $cat, $table,  $filedir)
{
    for ($n = 0; $n < count($imagemultipe); $n++) {
        $imagename[$n] = $imagemultipe[$n]["name"];
        if (!$imagemultipe[$n]["name"] == "") {
            $imagetmp[$n]  = $imagemultipe[$n]["tmp"];
            move_uploaded_file($imagetmp[$n], "../upload/" . $filedir . "/" . $imagename[$n]);
            $data = array(
                "imageitems_name"  => $imagename[$n],
                "imageitems_items" => $cat
            );
            insertData($table, $data);
        }
    }
}


function checksignin() {
    // ob_start() ; 
    // session_start() ; 
    // if (!isset($_SESSION['email'])){
    //        header("Location:../../index.php") ;
    //        exit()  ; 
    // }
}


  //==================================================
  // End Functions Upload 
  //==================================================