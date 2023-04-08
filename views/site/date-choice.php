<div class="messages">
    <label><?= $error ?? ''; ?></label>
</div>
<div class="form">
    <div class="login-form">
        <form action="/server-practice/all-patients" method="get">
            <label for="record-date">Дата записи</label>
            <?php
            echo "<select id='record-date' name='appointment_date'>";
            foreach ($appointment_date as $date) {
                echo "<option value=$date->id_medcard>"
                    . $date->appointment_date .
                    "</option>";
            }
            echo "</select>";
            ?>
            <input type="submit" value="Выбрать">
        </form>
    </div>
</div>
