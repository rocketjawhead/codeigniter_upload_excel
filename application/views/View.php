

    <br/>

    <!-- Breadcomb area End-->
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <!-- <h2>List Dat</h2> -->
                            <a href="<?php echo base_url("Siswa/form"); ?>" class="btn btn-sm btn-success">Import Data</a>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nis</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($list_data as $data){?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <td><?php echo $data->nis;?></td>
                                        <td><?php echo $data->nama;?></td>
                                        <td><?php echo $data->jenis_kelamin;?></td>
                                        <td><?php echo $data->alamat;?></td>
                                    </tr>
                                    <?php $no++;}?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Employee No</th>
                                        <th>Nama</th>
                                        <th>Basic Salary</th>
                                        <!-- <th>Transport</th> -->
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
