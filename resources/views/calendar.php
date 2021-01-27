<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar - 2021</title>
    <link rel="stylesheet" href="<?php echo asset('css/calendar.css')?>" type="text/css"> 

</head>
<body>
    <?php
        use App\Http\Controllers\monthController;
        $yearHolidays = monthController::getHolidays();
        echo "<div class =\"calendar\">";
        for ($month=1; $month < 13; $month++) { 
            $days =monthController::getDays($month);
            $name = monthController::getName($month);
            echo "<table>
                <thead>
                    <tr>
                        <th colspan=\"8\">".$name."</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>d</td>
                    <td>l</td>
                    <td>m</td>
                    <td>m</td>
                    <td>j</td>
                    <td>v</td>
                    <td>s</td>
                </tr>
                <tr>";
                $counter=0;

                for ($i=0; $i < monthController::getDayOfWeek($month); $i++) { 
                    echo "<td></td>";
                    $counter+=1;
                }

                for ($i=1; $i<=$days ; $i+=1) {
                    $counter+=1;
                    if($counter==1 || monthController::isHoliday($i,$yearHolidays[$name]))
                        echo "<td class=\"holiday\"> $i </td>";
                    else 
                        echo "<td> $i </td>";
                    if($counter==7){
                        echo "</tr> <tr>";
                        $counter=0;
                    }
                }
            echo "</tr>
            </tbody>
            </table>";

        }
        echo "</div>";
?>

</body>
</html>