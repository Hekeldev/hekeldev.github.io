<?php

?>

<!-- Form untuk mengatur status maintenance -->
<form method="post">
        <label for="maintenance">Maintenance Mode:</label>
        <input type="checkbox" id="maintenance" name="maintenance" <?php echo ($maintenanceMode ? 'checked' : ''); ?>>
        <input type="submit" name="saveMaintenance" value="Simpan">
    </form>