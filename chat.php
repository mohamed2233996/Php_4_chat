<?php
include("confing.php");
$query = "SELECT * FROM chat ORDER BY ID";
$run = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($run)) {
    $Name = $row['Name'];
    $Msg = $row['Msg'];
    $Date = $row['Date'];
    echo ("
                        <div class='chat-data mb-1'>
                            <span class='fw-bold text-primary'>$Name</span>
                            <span>:</span>
                            <span>$Msg</span>
                            <span class='float-end text-black-50'>$Date</span>
                        </div>
                        ");
};
