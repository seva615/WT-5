<!DOCTYPE HTML>
<html lang="ru">
<html>

<head>
    <meta charset="UTF-8">
    <title>LAB5</title>
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <div class="arrayForm">
        <form method="post">
            <h2 style=" margin: 20px 0 0 0;">Введите число</h2>
            <div class="form-row">
            <input type="text" id="ziph" name="count" required>
            </div><br>
            <input type="submit">
            <h2 style="padding: 35px 0 0 0; margin: 0;">Популяция:</h2>
        </form>
    </div>
  <div class="otvet_cont">
    <div class="otvet">
        <?php
        if (isset($_POST['count'])) {
            if (intval($_POST['count']) > 0) { //целое значение переменной
                $MySQL =  mysqli_connect("localhost:3306", "root", ",fhcev234", "world");

                if (!$MySQL) {
                    echo "Error: Unable to connect to MySQL." . PHP_EOL;
                    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                    exit;
                }

                $SQL = "SELECT DISTINCT `name`, `population` FROM `city` ORDER BY RAND() LIMIT " . intval($_POST['count']);
                $request = mysqli_query($MySQL, $SQL); //запрос к базе данных
                
                while ($data = mysqli_fetch_assoc($request)) { //ассоциативный массив
                    echo $data['name'] . "\t-\t" . $data['population'] . "<br>";
                }
                mysqli_close($MySQL);
            } else {
                echo "You need > 0 nums";
            }
        }
        ?>
    </div>
  </div>
</body>
</html>