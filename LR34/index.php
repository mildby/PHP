<?php
print("-----------------------<br>");
error_reporting(0);
$link = mysqli_connect("localhost:3307", "", "");

if ($link == false) {
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
} else {
    $sql = 'Select count(*) as kol, Post from lab34.employees group by Post;'; ///////////
    $result = mysqli_query($link, $sql);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса");
    } else {
        print("Должности и количество работников  <br>");
        while ($row = mysqli_fetch_array($result)) {
            print($row['kol'] . " чел. | " . $row['Post'] . "<br>");
        }
    }

    $sql = 'Select count(*) as kol, Age from lab34.employees group by Age having count(*) > 1;'; //////////
    $result = mysqli_query($link, $sql);
    print("-----------------------<br>");
    if ($result == false) {
        print("Произошла ошибка при выполнении запроса");
    } else {
        print("Количество людей каждого возраста, меньше 2 чел не считаем<br>");
        while ($row = mysqli_fetch_array($result)) {
            print($row['kol'] . " чел. | " . $row['Age'] . " Лет <br>");
        }
    }

    $sql = 'Select Avg(Salary) as sredny, Post from lab34.employees group by Post;'; ///////////
    $result = mysqli_query($link, $sql);
    print("-----------------------<br>");

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса");
    } else {
        print("Должности и средняя зп  <br>");
        while ($row = mysqli_fetch_array($result)) {
            print($row['sredny'] . " " . $row['Post'] . "<br>");
        }
    }

    $sql = 'Select * from lab34.employees where Full_Name like "Иванов%";'; ///////////
    print("-----------------------<br>");
    $result = mysqli_query($link, $sql);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса");
    } else {
        print("Все Ивановы<br>");
        while ($row = mysqli_fetch_array($result)) {
            print($row['id'] . " " . $row['Full_Name'] . " " . $row['Age'] . " " . $row['Salary'] . " " . $row['Post'] . " <br>");
        }

    }

    $sql = 'Select * from lab34.employees where Salary between 501 and 999;'; ///////////
    print("-----------------------<br>");
    $result = mysqli_query($link, $sql);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса");
    } else {
        print("Все ЗП между 500 и 1000<br>");
        while ($row = mysqli_fetch_array($result)) {
            print($row['id'] . " " . $row['Full_Name'] . " " . $row['Age'] . " Лет " . $row['Salary'] . " у.е. " . $row['Post'] . " <br>");
        }

    }
}
print("-----------------------<br>");
?>