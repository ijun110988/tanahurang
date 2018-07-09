<!doctype html>
<html>
    <head>
        <title>Chain Dropdown - harviacode</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css') ?>"/>
    </head>
    <body>
        <div class="container">
            <div class="col-md-6">
                <h2>Chain Dropdown Example</h2>
                <form action="<?php echo site_url('chain/aksi_form') ?>" method="post">
                    <div class="form-group">
                        <label>Provinsi</label>
                        <select class="form-control" name="provinsi" id="provinsi">
                            <option value="">Please Select</option>
                            <?php
                            foreach ($provinsi as $prov) {
                                ?>
                                <option <?php echo $provinsi_selected == $prov->id ? 'selected="selected"' : '' ?> 
                                    value="<?php echo $prov->id ?>"><?php echo $prov->name ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kota</label>
                        <select class="form-control" name="kota" id="kota">
                            <option value="">Please Select</option>
                            <?php
                            foreach ($kota as $kot) {
                                ?>
                                <!--di sini kita tambahkan class berisi id provinsi-->
                                <option <?php echo $kota_selected == $kot->province_id ? 'selected="selected"' : '' ?> 
                                    class="<?php echo $kot->province_id ?>" value="<?php echo $kot->id ?>"><?php echo $kot->name ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                  
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
        <script src="<?php echo base_url('assets/js/jquery-1.10.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.chained.min.js') ?>"></script>
        <script>
            $("#kota").chained("#provinsi"); // disini kita hubungkan kota dengan provinsi
            $("#kecamatan").chained("#kota"); // disini kita hubungkan kecamatan dengan kota
        </script>
    </script>
</body>
</html>
