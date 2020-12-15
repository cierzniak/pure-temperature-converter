<?php $partialDir = __DIR__ . '/_partial'; ?>
<!doctype html>
<html lang='pl'>
<?php require "{$partialDir}/head.html"; ?>
<body>
  <?php require "{$partialDir}/header.html"; ?>
  <main class='container'>
    <div class='bg-light p-5 rounded'>
      <h1>Konwerter temperatur</h1>
      <p class='lead'>Dokonaj konwersji temperatur za pomocą niniejszego formularza</p>
      <?php if (!empty($violations)): ?>
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
          <h4 class='alert-heading'>Nastąpiły błędy walidacji danych:</h4>
          <ul class='mb-0'>
          <?php foreach ($violations as $violation) {
            echo "<li>{$violation}</li>";
          } ?>
          </ul>
          <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        </div>
      <?php endif; ?>
      <form action='/' method='GET'>
        Podaj dane wejściowe:
        <div class='row'>
          <div class='col-6 col-md-8'>
            <input class='form-control' type='text' name='v' value='<?= $form['baseValue']; ?>'/>
          </div>
          <div class='col-6 col-md-4'>
            <select class='form-select' name='b'>
            <?php foreach ($available as $unit => $name) {
              $active = null;
              if ($form['baseUnit'] === $unit) {
                $active = 'selected';
              }
              echo "<option value='{$unit}' {$active}>{$name}</option>";
            } ?>
            </select>
          </div>
        </div>
        <br/>
        Podaj dane wyjściowe:
        <div class='row'>
          <div class='offset-6 col-6 offset-md-8 col-md-4'>
            <select class='form-select' name='t'>
            <?php foreach ($available as $unit => $name) {
                $active = null;
                if ($form['targetUnit'] === $unit) {
                    $active = 'selected';
                }
                echo "<option value='{$unit}' {$active}>{$name}</option>";
            } ?>
            </select>
          </div>
        </div>
        <br/>
        <div class='row'>
          <div class='col-12 offset-md-3 col-md-6 d-grid'>
            <button type='submit' class='btn btn-success btn-lg'>Przelicz</button>
          </div>
        </div>
      </form>
      <p class='h2 mb-0 mt-5 text-center'>
      <?php if ($conversionFrom && $conversionTo) {
          echo "<strong>{$conversionFrom}</strong> => <strong>{$conversionTo}</strong>";
      } ?>
      </p>
    </div>
  </main>
  <?php require "{$partialDir}/footer.html"; ?>
</body>
</html>
