<div class="row">
    <?php
      $all_olahraga = array('Futsal/Sepak Bola','Bulu Tangkis','Voli','Basket','Panahan', 'Tenis', 'Catur');
      foreach($esports as $row) :
        array_push($all_olahraga, $row['nama_esport']);
      endforeach;
      foreach($all_olahraga as $olahraga) :
        if(!in_array($olahraga, $minatolahraga)){
          $checked_select = "";
        } else{
          $checked_select = "checked";
        }
      ?>
      <div class="col-lg-3 col-md-3 col-12">
        <div class="form-group">
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="olahraga[]"
                        <?=$checked_select;?>  value="<?=$olahraga;?>"> <?= $olahraga; ?> </label>
            </div>
        </div>
    </div>
    <?php
      endforeach;
    ?>
</div>