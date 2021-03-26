<?php
    // connect database 
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";        
    $db_name = "blog";

    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
    $mysqli->set_charset("utf8");

    // check connection error 
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    } else {
        // connect success, do nothng
    }

    function connectDB1(){ //insert a author
        return "INSERT INTO authors (username, passwd, name, penname, email)
                VALUES (?,?,?,?,?)";
    }
    function connectDB2(){ //ตรวจสอบ username
        return "SELECT *
                FROM authors
                WHERE username = ?";
        // return true;
                //  $username รับค่ำมำจำกฟอร์ม
    }
    function connectDB3($username,$passwd){ //ตรวจสอบ login
        return "SELECT *
                FROM authors
                WHERE username = '$username' AND passwd = md5('$passwd')";
                // ถ้าได้ข้อมูล 1 แถว หมายความว่า login ส าเร็จ --> ให้ท า session ของ id, username, name
    }
    function connectDB4(){ //แสดงบทความทั้งหมด เรียงจากวันที่ล่าสุด (เฉพาะ publish_sts = Y)
        return "SELECT *
                FROM articles ar INNER JOIN authors a
                ON authors_id = a.id
                WHERE publish_sts = 'Y'
                ORDER BY CASE when updatetime != null then updatetime 
                else create_ts END DESC";
    }
    function connectDB5($user_id){ //บทความทั้งหมดของผู้แต่งแต่ละคน ตาม session['id']
        return "SELECT *
                FROM articles ar INNER JOIN authors a
                ON authors_id = a.id
                WHERE a.id = $user_id
                ORDER BY CASE when updatetime != null then updatetime 
                else create_ts END DESC";
    }
    function connectDB6(){ //หน้าเพิ่มบทความใหม่
        return "INSERT INTO articles (title, body, authors_id, updatetime, publish_sts,image_url)
                VALUES (?, ?, ?, ?, ?,?)";
                // session['id'] date('Y-m-d H:i:s') 'N'"
    }
    function connectDB7(){ //publish / unpublish
        return "UPDATE articles
                SET publish_sts = ? 
                WHERE id = ?";
                //'Y' / 'N'
    }
