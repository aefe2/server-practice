<div class="patients-results">
    <h3>Результат выборки</h3>
    <div class="results">
        <?php
        foreach ($patientDiagnoses as $patientDiagnosis) {
            echo "<span>" . $patientDiagnosis->diagnosis_name . "</span>";
        }
        ?>
    </div>
    <div class="results">
        <span>Фамилия</span><span>Иванов</span>
        <span>Имя</span> <span>Иван</span>
        <span>Отчество</span> <span>Иванович</span>
        <span>Дата рождения</span> <span>30.05.1990</span>
        <span>Должность</span> <span>Кто то там</span>
        <span>Специализация</span> <span>Что то там</span>
    </div>
</div>