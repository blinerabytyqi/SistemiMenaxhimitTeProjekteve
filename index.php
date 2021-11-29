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
            <h3 class="title">Projektet e Fundit</h3>
            <section id="projects">
            <div class="slider">
                <?php
                    $projektet=merrProjektet();
                    $i=0;
                    while ($projekti =mysqli_fetch_assoc($projektet)) {
                        $projektiid=$projekti['projektiid'];
                        $emriProjekti=$projekti['emri'];
                        $pershkrimi=$projekti['pershkrimi'];
                        if(strlen($pershkrimi)>100){
                            $pershkrimi=substr($pershkrimi,0,100) . "...";
                        }
                        echo "<div class='card-info'>";
                        echo "<div class='card-img'>";
                        echo "<img src='images/project{$i}.jpg' alt='Projekti i pare'>";
                        echo "</div>";
                        echo "<div class='card-title'><h4>";
                        echo $emriProjekti;
                        echo "</h4></div>";
                        echo "<div class='card-footer'><p>";
                        echo $pershkrimi;
                        echo "</p></div>";
                        echo "<a class='meShume' href='projekti?prijektiid=$projektiid'>me shume &#8658;</a>";
                        echo "</div>";
                        $i++;
                        if($i==3) $i=0;
                    }
                ?>    
            </div>
            </section>
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
                    if($i==7) break;
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