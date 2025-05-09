<?php 

    $hname = 'localhost';
    $uname = 'root';
    $pass = '';
    $db = 'bookid';

    $con = mysqli_connect($hname, $uname, $pass, $db);

    if(!$con)
    {
        die("Cannot Connect to Database".mysqli_connect_error());
    }

    function filteration($data)
    {
        foreach($data as $key => $value){
            $value = trim($value);
            $value = stripslashes($value);
            $value = htmlspecialchars($value);
            $value = strip_tags($value);
            $data[$key] = $value;
        }
        return $data;
    }

    /**
     * Summary of selectAll
     * @param mixed $table
     * @return bool|mysqli_result
     */
    function selectAll($table)
    {
        $con = $GLOBALS['con'];
        $res = mysqli_query($con,"SELECT * FROM $table");
        return $res;
    }

    function select($sql, $values = [], $datatypes = '') {
        $stmt = $GLOBALS['con']->prepare($sql);
        if ($datatypes !== '' && !empty($values)) {
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        }
        $stmt->execute();
        return $stmt->get_result(); // Return mysqli_result instead of mysqli_stmt
    }
    

    function update($sql,$values,$datatypes)
    {
        $con = $GLOBALS['con'];
        if($stmt = mysqli_prepare($con,$sql))
        {
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if(mysqli_stmt_execute($stmt)){
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
            }
            else {
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Update");
            }
        }
        else{
            die("Query cannot be executed - Update");
        }
    }
    
    function insert($sql,$values,$datatypes)
    {
        $con = $GLOBALS['con'];
        try {
            if($stmt = mysqli_prepare($con,$sql)) {
                // Log the prepared statement and values
                file_put_contents('../debug_log.txt', "Prepared statement created\n", FILE_APPEND);
                file_put_contents('../debug_log.txt', "SQL: $sql\n", FILE_APPEND);
                file_put_contents('../debug_log.txt', "Values: " . print_r($values, true) . "\n", FILE_APPEND);
                file_put_contents('../debug_log.txt', "Datatypes: $datatypes\n", FILE_APPEND);

                if(!mysqli_stmt_bind_param($stmt,$datatypes,...$values)) {
                    file_put_contents('../debug_log.txt', "Bind param failed: " . mysqli_stmt_error($stmt) . "\n", FILE_APPEND);
                    mysqli_stmt_close($stmt);
                    return false;
                }

                if(!mysqli_stmt_execute($stmt)) {
                    file_put_contents('../debug_log.txt', "Execute failed: " . mysqli_stmt_error($stmt) . "\n", FILE_APPEND);
                    mysqli_stmt_close($stmt);
                    return false;
                }

                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                file_put_contents('../debug_log.txt', "Insert successful. Affected rows: $res\n", FILE_APPEND);
                return $res;
            } else {
                file_put_contents('../debug_log.txt', "Prepare failed: " . mysqli_error($con) . "\n", FILE_APPEND);
                return false;
            }
        } catch (Exception $e) {
            file_put_contents('../debug_log.txt', "Exception in insert: " . $e->getMessage() . "\n", FILE_APPEND);
            return false;
        }
    }

    function delete($sql,$values,$datatypes)
    {
        $con = $GLOBALS['con'];
        if($stmt = mysqli_prepare($con,$sql))
        {
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if(mysqli_stmt_execute($stmt)){
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
            }
            else {
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Delete");
            }
        }
        else{
            die("Query cannot be executed - Delete");
        }
    }
?>