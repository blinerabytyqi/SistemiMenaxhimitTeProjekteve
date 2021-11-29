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
            <?php
                if (isset($_GET['aid'])) {
                    $aid=$_GET['aid'];
                    $anetari=merrAnetarId($aid);
                    if($anetari){
                        $anetari=mysqli_fetch_assoc($anetari);
                        $antariid=$anetari['antariid'];
                        $emri=$anetari['emri'];
                        $mbiemri=$anetari['mbiemri'];
                        $telefoni=$anetari['telefoni'];
                        $email=$anetari['email'];
                        $fjalekalimi=$anetari['fjalekalimi'];
                    }

                }
                if(isset($_POST['fshij'])){
                    $antariid=$_POST['antariid'];
                    fshijAnetar($antariid);
                }
                
            ?>
            <form id="anetari" class="box" action="" method="post">
                <legend>Forma për fshirje</legend>
                <input type="hidden" id="antariid" name="antariid"
                    value="<?php if(!empty($antariid)) echo $antariid; ?>">
                <label>Emri: </label>
                <input type="text" id="emri" name="emri" readonly
                    value="<?php if(!empty($emri)) echo $emri; ?>">
                <label>Mbiemri: </label>
                <input type="text" id="mbiemri" name="mbiemri" readonly
                    value="<?php if(!empty($mbiemri)) echo $mbiemri; ?>">
                <label>Telefoni: </label>
                <input type="text" id="telefoni" name="telefoni" readonly
                    value="<?php if(!empty($telefoni)) echo $telefoni; ?>">
                <label>Email: </label>
                <input type="email" id="email" name="email" readonly
                    value="<?php if(!empty($email)) echo $email; ?>">
                <label>Fjalekalimi: </label>
                <input type="password" id="fjalekalimi" name="fjalekalimi" readonly
                    value="<?php if(!empty($fjalekalimi)) echo $fjalekalimi; ?>">
                <input type="submit" name="fshij" id="fshij" value="Fshij">
            </form>
        </section>
    </main>
<?php include 'inc/footer.php' ?>