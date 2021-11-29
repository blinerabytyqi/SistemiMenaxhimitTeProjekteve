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
                if(isset($_POST['regjistro'])){
                    shtoPune($_POST['projekti'], $_POST['data'], $_POST['pershkrimi']);
                }
            ?>
             <form id="anetari" class="box" action="" method="post">
                <legend>Forma për regjistrim</legend>
                <fieldset>
                    <label>Emri i projekti: </label>
                    <select name="projekti" id="projekti">
                        <?php
                            $projektet=merrProjektet();
                            while ($projekti =mysqli_fetch_assoc($projektet)) {
                                $projektiid=$projekti['projektiid'];
                                $emriProjekti=$projekti['emri'];
                                echo "<option value='{$projektiid}'>$emriProjekti</option>";
                            }
                        ?>
                    </select>
                </fieldset>
                <fieldset>
                    <label>Data e punes: </label>
                    <input type="date" id="data" name="data">
                </fieldset>
                <fieldset>
                    <label>Pershkrimi: </label>
                    <textarea name="pershkrimi" id="pershkrimi">
                    </textarea>
                </fieldset>
                <input type="submit" name="regjistro" id="regjistro" value="Regjistro">
            </form>
        </section>
    </main>
<?php include 'inc/footer.php' ?>