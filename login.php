<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>
<body>
    <!-- This DIV is for the section holding the GOBUYBOOKS logo -->
    <div id="logoSide"></div>

    <!-- This DIV is the section holding the input section for the administrative login -->
    <div id="inputSide">
        <div id="loginCard">
            <form action="" method = "POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="logInUsername">
                <label for="password">Password</label>
                <input type="text" id="password" name="logInPassword">
                <button name="login">Log In</button>
            </form>
            <?php
            session_start();
            if (isset($_POST["login"])) {

                include_once "Includes/databaseconnector.php";

                $logInUsername =mysqli_real_escape_string($conn, $_POST["logInUsername"]);
                $logInPassword =mysqli_real_escape_string($conn, $_POST["logInPassword"]);

                // Error Handlers to check if inputs are empty.
                if (empty($logInUsername) || empty($logInPassword)) {
                    header("Location: http://localhost/gobuybooksadmin/login.php?login=empty");
                    exit();
                }
                else {
                    $sqlQuery = "SELECT * FROM administrative_users WHERE Username = '$logInUsername'";
                    $queryResult = mysqli_query($conn, $sqlQuery);
                    $resultChecker = mysqli_num_rows($queryResult);
                    if ($resultChecker < 1) {
                        header("Location: http://localhost/gobuybooksadmin/login.php?login=data not found");
                        exit();
                    } else {
                        if ($dataRow = mysqli_fetch_assoc($queryResult)) {
                            $passwordCheck = password_verify($logInPassword, $row["Password"]);
                            if ($passwordCheck == false) {
                                header("Location: http://localhost/gobuybooksadmin/login.php?login=invalid login details");
                                exit();
                            } elseif ($passwordCheck == true) {
                                $_SESSION["Username"] = $logInUsername;
                                header("Location: http://localhost/gobuybooksadmin/adminpage.php?");
                                exit();
                            }
                        }
                    }
                }
            }

        ?>
        </div>
        
    </div>
</body>
</html>