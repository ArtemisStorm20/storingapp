<?php require_once __DIR__.'/../../../config/config.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen / Nieuw</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
</head>

<body>

<?php 
    
    $id = $_GET['id'];
    require_once '../../../config/conn.php';
    $query = "SELECT * FROM  meldingen WHERE id = :id";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":id" => $id
    ]);
    $melding = $statement->fetch(PDO::FETCH_ASSOC);
    
?>
    <?php require_once __DIR__.'/../components/header.php'; ?>
     

    <div class="container">
        <h1>Melding aanpassen</h1>

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingenController.php" method="POST">
        <input type="hidden"  name="action" value="update">
        <input type="hidden"  name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="attractie">Naam attractie:</label>
                <?php echo $melding['attractie'];?>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <?php echo $melding['type'];?>
                <!-- hier komt een dropdown -->
            </div>
            <div class="form-group">
                <label for="capaciteit">Capaciteit p/uur:</label>
                <input type="number" min="0" name="capaciteit" id="capaciteit" class="form-input"value="<?php echo $melding['capaciteit'];?>">
            </div>
            <div class="form-group">
                <label for ="prioriteit" class="form-label">prioriteit:</label>
                <input type="checkbox"  name="prioriteit" id="prioriteit" class="form-input" <?php if($melding['prioriteit'] == 1){echo 'checked';}?>
            </div>
            <div class="form-group">
                <label for="melder">Naam melder:</label>
                <input type="text" name="melder" id="melder" class="form-input"value="<?php echo $melding['melder'];?>"
    
            </div>
            <div class="form-group">
                <label for="overige_info">overig:</label>
                <textarea name="overige_info" id=""><?php echo $melding['overige_info']; ?></textarea>
            </div>

            <input type="submit" value="Melding opslaan">
            </form>

            <form action = "<?php echo $base_url; ?>/app/Http/Controllers/meldingenController.php" method="POST">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" value="Melding verwijderen">
            </form>
        </for>
    </div>

</body>

</html>
