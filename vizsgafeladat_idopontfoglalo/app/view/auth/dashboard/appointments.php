<?php include_once 'header.php';?>

<h1>foglalások
</h1>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Foglalások</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Név</th>
                        <th>Email</th>
                        <th>Telefonszám</th>
                        <th>Dátum</th>
                        <th>Időpont</th>
                        <th>Szolgáltatás</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($appointments as $appointment): ?>
                    <tr>
                        <td><?php echo $appointment['id']; ?></td>
                        <td><?php echo $appointment['name']; ?></td>
                        <td><?php echo $appointment['email']; ?></td>
                        <td><?php echo $appointment['phone']; ?></td>
                        <td><?php echo $appointment['date']; ?></td>
                        <td><?php echo $appointment['time']; ?></td>
                        <td><?php echo $appointment['service']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>