<?php include 'inc/header.php';?>
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
            <h3 class="title">Lista e puneve</h3>
            <div id="mesazhi">
                <?php if(isset($_SESSION['mesazhi'])) echo $_SESSION['mesazhi']; ?>
            </div>
            <table id="members">
                <tr>
                    <th>Projekti</th>
                    <th>Data e punes</th>
                    <th>Pershkrimi</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            <?php
                
                $punet=merrPunet();
                $i=0;
                while ($pune=mysqli_fetch_assoc($punet)) {
                    //print_r($anetari); echo "<br>";
                    $punaid=$pune['punaid'];
                    if($i%2==0){
                        echo "<tr>";
                    }else{
                        echo "<tr class='alt'>";
                    }
                    $i++;
                    echo "<td>". $pune['emri'] . "</td>";
                    echo "<td>". $pune['data'] ."</td>";
                    echo "<td>". $pune['pershkrimi'] ."</td>";
                    echo "<td><a href='modifikopune.php?punaid={$punaid}'>Edit</a></td>";
                    echo "<td><a href='fshijpune.php?punaid={$punaid}'>Delete</a></td>";
                    echo "</tr>";
                }
                
            ?>
            </table>

        </section>
    </main>
<?php include 'inc/footer.php' ?>