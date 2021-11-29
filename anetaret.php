<?php include 'inc/header.php';
    if($_SESSION['anetari']['roli']!=1){
        header("Location: index.php");
    }
?>
    <main class="container page">
        <article id="maininfo">
            <h2 class="title">SMP Projekti Pershkrimi</h2>
            <p>
                Sistemi për menaxhimin e projekteve mundëson një kompanie menaxhimin e punëve nga punëtorët e saj për
                projektet që ajo ka. Sistemi ofron menaxhimin e stafit: shtimin, modifikimin fshirjen, paraqitjen e
                stafit, menaxhimin e projekteve: shtimin, modifikimin fshirjen, paraqitjen e projekteve dhe menaxhimin e
                punëve ë bën stafi në kuadër të projekteve.
            </p>

        </article>
       <?php include 'inc/sidebar.php'; ?>
        <section id="content" class="box">
            <h3 class="title">Lista e anetareve</h3>
            <table id="members">
                <tr>
                    <th>Emri dhe Mbiemri</th>
                    <th>Telefoni</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            <?php
                
                $anetaret=merrAnetaret();
                $i=0;
                while ($anetari=mysqli_fetch_assoc($anetaret)) {
                    //print_r($anetari); echo "<br>";
                    $antariid=$anetari['antariid'];
                    if($i%2==0){
                        echo "<tr>";
                    }else{
                        echo "<tr class='alt'>";
                    }
                    $i++;
                    echo "<td>". $anetari['emri'] . " " . $anetari['mbiemri'] . "</td>";
                    echo "<td>". $anetari['telefoni'] ."</td>";
                    echo "<td>". $anetari['email'] ."</td>";
                    echo "<td><a href='modifikoanetar.php?aid={$antariid}'>Edit</a></td>";
                    echo "<td><a href='fshijanetar.php?aid={$antariid}'>Delete</a></td>";
                    echo "</tr>";
                }
                
            ?>
            </table>

        </section>
    </main>
<?php include 'inc/footer.php' ?>