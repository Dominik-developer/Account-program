<?php

function nowy()
{
?>

<div class="zakladanie">

<form action="account.php" method="post">
<fieldset>
    <legend>
        Szczegóły konta:
    </legend>
<label>
    Imię:
    <input type="text" name="name" size="30" maxlength="15" required="required" >
</label>
<br />
<label>
    E-mail:
    <input type="email" name="email" size="30" maxlength="30" required="required" >
</label>
<br />
<label>
    Hasło:
    <input type="password" name="password" size="30" maxlength="50" required="required" >
</label>
<br />
</fieldset>

<fieldset>
    <legend>
        Kilka informacji o Tobie:
    </legend>
<label>
    Opis profilu:
    <textarea rows="4" cold="20" id="content">
    </textarea>
</label>
</fieldset>

<input type="submit" value="Załóż konto" />
</form>
</div>

<?php
}
?>