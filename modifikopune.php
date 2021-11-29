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
                
                if (isset($_GET['punaid'])) {
                    $punaid=$_GET['punaid'];
                    $pune=merrPuneId($punaid);
                    if($pune){
                        $pune=mysqli_fetch_assoc($pune);
                        $punaid=$pune['punaid'];
                        $projektiid=$pune['projektiid'];
                        $projekti=$pune['emri'];
                        $data=$pune['data'];
                        $data=date("Y-m-d",strtotime($data));
                        $pershkrimi=$pune['pershkrimi'];
                    }

                }
                if(isset($_POST['modifiko'])){

                    modifikoPune($_POST['punaid'],$_POST['projekti'], $_POST['data'], $_POST['pershkrimi']);
                }
            ?>
             <form id="anetari" class="box" action="" method="post">
                <legend>Forma për modifikim</legend>

                <input type="hidden" id="punaid" name="punaid"
                    value="<?php if(!empty($punaid)) echo $punaid; ?>">
                <fieldset>
                    <label>Emri i projekti: </label>
                    <select name="projekti" id="projekti">
                        <option value="<?php if(!empty($projektiid)) echo $projektiid; ?>">
                        <?php if(!empty($projekti)) echo $projekti; ?>
                        </option>
                        <?php
                            $projektet=merrProjektet();
                            while ($projekti =mysqli_fetch_assoc($projektet)) {
                                $projektid=$projekti['projektiid'];
                                $emriProjekti=$projekti['emri'];
                                if($projektiid!=$projektid){
                                    echo "<option value='{$projektiid}'>$emriProjekti</option>";
                                }
                            }
                        ?>
                    </select>
                </fieldset>
                <fieldset>
                    <label>Data e punes: </label>
                    <input type="date" id="data" name="data" 
                        value="<?php if(!empty($data)) echo $data; ?>">
                </fieldset>
                <fieldset>
                    <label>Pershkrimi: </label>
                    <textarea name="pershkrimi" id="pershkrimi">
                        <?php if(!empty($pershkrimi)) echo $pershkrimi; ?>
                    </textarea>
                </fieldset>
                <input type="submit" name="modifiko" id="modifiko" value="Modifiko">
            </form>
        </section>
    </main>
<?php include 'inc/footer.php' ?>