<?php
if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    if ($_SESSION['user']['admin'] == 0) {
        echo "<div class=\"wrapper-50 margin-auto center\">
                <h2>Unauthorized</h2>
                <p>
                    You don't have access to this ressource !<br>
                    Please contact an administrator.
                </p>
                <p>
                    <a href=\"./index.php\">Return to main page</a>
                </p>
            </div>";
    } else {
        if (isset($_SESSION['list_user']) && !empty($_SESSION['list_user'])) {
            echo '<table><thead><tr><th> firstname </th> <th>lastname</th> <th>email</th> <th>address</th> <th>cp</th> <th>city</th> <th>password</th> </tr> </thead>
            <tbody> ';

            for ($i = 0; $i < count($_SESSION['list_user']); $i++) {
                $user = $_SESSION['list_user'][$i];
                echo '<tr>
                    <td>' . $user['firstName'] . '</td>
                    <td>' . $user['lastName'] . '</td>
                    <td>' . $user['email'] . '</td>
                    <td>' . $user['address'] . '</td>
                    <td>' . $user['postalCode'] . '</td>
                    <td>' . $user['city'] . '</td>
                    <td>' . $user['password'] . '</td>
                    </tr>';

            }
            echo '</tbody></table>';
        }
    }
       
    
}


?>