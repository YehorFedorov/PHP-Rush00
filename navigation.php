<?php
session_start();
if($_SESSION['users'] == "Users") {
    $str = unserialize(file_get_contents("user/private/passwd"));
    foreach ($str as $elem) {
        if ($elem['root'] == 'mod')
            echo $elem['login']."<b>- moderator</b><br>";
        else
            echo $elem['login']."<br>";
    };
    echo "<form method=post><input style=\"background-color:green; color:white;\" type=\"submit\" name=\"add\" value=\"Add\"></input><input type=\"text\" name=\"add_login\" value=\"\"></input></form>";
    if ($_POST['add'] == 'Add') {
        if ($_POST[add_login] != NULL) {
            $str = unserialize(file_get_contents("user/private/passwd"));
            $i = 0;
            foreach ($str as $elem) {
                if ($elem['login'] == $_POST['add_login'])
                    $str[$i]['root'] = "mod";
                $i++;
            }
            file_put_contents("user/private/passwd", serialize($str));
            header("Refresh: 0;");
        }
    }
}
elseif($_SESSION['items'] == "Items") {
    $fch = fopen("user/private/articles.csv", 'r');
    $items_array = array();
    $keys = array();
    $tmp = array();
    $i = 0;
    while (($items = fgetcsv($fch, ',')) != False) {
      if ($i == 0) {
        $keys = $items;
        $i = 1;
      }
      else {
        for ($j = 0; $j<count($keys); $j++) {
            $tmp[$keys[$j]] = $items[$j];
        }
        $items_array[] = $tmp;
      }
    }
    fclose($fch);
    echo "<form method=post>";
    foreach ($items_array as $elem) {
        echo '<img style="width:9%; height:15%;" src="'.$elem['Image'].'" alt="'.$elem['Name'].'">';
        echo '<input type="hidden" name="'.$elem['Name'].'Name" value="'.$elem['Name'].'"></input>';
        echo '<input type="text" name="'.$elem['Name'].'Description" value="'.$elem['Description'].'"></input>';
        echo '<input type="text" name="'.$elem['Name'].'Price" value="'.$elem['Price'].'"></input>';
        echo '<input type="text" name="'.$elem['Name'].'Category" value="'.$elem['Category'].'"></input>';
        echo '<input style="width:400px;" type="text" name="'.$elem['Name'].'Image" value="'.$elem['Image'].'"></input><br>';
    }
    echo '<input style="background-color:green; color:white;" type="submit" name="Apply" value="Apply"></input>';
    if ($_POST['Apply'] == 'Apply') {
        $i = 0;
        foreach ($items_array as $data) {
            if ($data['Name'] == $_POST[$data['Name']."Name"]) {
                if ($_POST[$data['Name']."Description"] != NULL)
                    $items_array[$i]['Description'] = $_POST[$data['Name']."Description"];
                if ($_POST[$data['Name']."Price"] != NULL)
                    $items_array[$i]['Price'] = $_POST[$data['Name']."Price"];
                if ($_POST[$data['Name']."Category"] != NULL)
                    $items_array[$i]['Category'] = $_POST[$data['Name']."Category"];
                if ($_POST[$data['Name']."Image"] != NULL)
                    $items_array[$i]['Image'] = $_POST[$data['Name']."Image"];
            }
            $i++;
        }
        $fd = fopen("user/private/articles.csv", "w+");
        flock($fd, LOCK_EX);
        fwrite($fd, 'Name,Description,Price,Image,Category'."\n");
        $i = 0;
        foreach ($items_array as $value) {
            fwrite($fd, $items_array[$i]['Name'].",".$items_array[$i]['Description'].",".$items_array[$i]['Price'].",".$items_array[$i]['Image'].",\"".$items_array[$i]['Category']."\"\n");
            $i++;
        }
        fclose($fd);
        header("Refresh: 0;");
    }
    echo "</form>";
}
?>