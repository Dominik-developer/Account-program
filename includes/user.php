<?php
function user()
{
?>
<div style="text-align: center" class="profil">

<h2>Oto Twoje dane:</h2>

    <table>
        <thead>
            <tr>
                <th>Imię</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <?php
                         echo "<p> ".$_SESSION["name"]."</p>";
                    ?>
                </td>
                <td>
                    <?php
                        echo "<p> ".$_SESSION["email"]."</p>";
                    ?>
                </td>
            </tr>           
        </tbody>
    </table>
</div>

<?php
}
?>
