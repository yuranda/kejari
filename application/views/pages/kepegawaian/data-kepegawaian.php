<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
.hoverTable{
			width:100%; 
			border-collapse:collapse; 
			}
.hoverTable td
			{ 
			padding:7px; border:#4e95f4 1px solid;
			}
.hoverTable tr:hover
			{
 			background-color: #D8E9A7;
			}

</style> 
<div class="row">
<div class="col-md-8 col-md-offset-2 col-xs-12">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
  <strong><?php echo $this->session->flashdata('alert'); ?></strong>
</div>
	<div class="col-md-12">
		<div class="box box-primary">
			<?php echo form_open(current_url(), array('method' => 'GET')); ?>
			<div class="box-header">
				<div class="col-md-12">
					<div class="col-md-4">
						<input type="text" class="form-control" name="query" placeholder="Pencarian...." value="<?php echo $this->input->get('query') ?>">
					</div>
					<div class="col-md-3">
						<button type="submit" class="btn btn-success" id="search"><i class="fa fa-search"></i> Cari Data</button>
						<a href="<?php echo base_url('kepegawaian') ?>" class="btn btn-default" id="reset-form"><i class="fa fa-times"></i> Reset</a>
					</div>
					<div class="col-md-3 pull-right">
						<a href="<?php echo base_url('kepegawaian/create') ?>" class="btn btn-success" id="reset-form"><i class="fa fa-plus"></i> Tambahkan</a>
						<a href="<?php echo base_url('kepegawaian') ?>" class="btn btn-success" id="reset-form"><i class="fa fa-print"></i> Cetak</a>
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>
			<div class="box-body no-padding">
				<table class="table table-bordered table-stripped">
					<thead class="bg-green">
						<tr>
							<th rowspan="2">No.</th>
							<th rowspan="2" class="text-center">NIP</th>
							<th rowspan="2" class="text-center">NRP</th>
							<th rowspan="2" class="text-center">Pangkat</th>
							<th rowspan="2" class="text-center">Jabatan</th>
							<th rowspan="2" class="text-center">Nama Lengkap</th>
							<th rowspan="2" class="text-center">Tempat, Tanggal</th>
							<th rowspan="2" class="text-center">Agama</th>
							<th rowspan="2" class="text-center">Jenis Kelamin</th>
							<th rowspan="2" class="text-center">Pendidikan Terakhir</th>
							<th colspan="2" class="text-center">TMT</th>
							<th rowspan="2" class="text-center"></th>
						</tr>
						<tr>
							<th class="text-center">TMT</th>
							<th class="text-center">YAD</th>
						</tr>

					</thead>
					<tbody class="hoverTable">
						<?php foreach($kepegawaian as $row) : ?>
						<tr style="vertical-align: top">
							<td><?php echo ++$this->page ?>.</td>
							<td><?php echo $row->nip ?></td>
							<td><?php echo $row->nrp ?></td>
							<td></td>
							<td></td>
							<td><a href="<?php echo base_url('kepangkatan/detail_kepangkatan/'.$row->ID) ?>"><?php echo $row->nama ?></td>
							<td><?php echo $row->tempat_lahir ?>, <?php echo date_id($row->tgl_lahir) ?></td>
							<td><?php echo strtoupper($row->agama) ?></td>
							<td><?php echo strtoupper($row->jns_kelamin) ?></td>
							<td><?php echo $row->pendidikan_terakhir ?></td>
							<td></td>
							<td></td>
							<td class="text-center">
								<a href="<?php echo base_url('kepegawaian/update/'.$row->ID) ?>" class="btn btn-xs btn-primary" style="margin-right: 10px">
									<i class="fa fa-pencil"></i>
								</a>
								<a href="javascript:void(0)" id="delete-pegawai" data-id="<?php echo $row->ID ?>"  class="btn btn-xs btn-danger">
									<i class="fa fa-trash-o"></i>
								</a>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-md-12 text-center">
			<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>
</div>


<div class="modal fade in modal-danger" id="modal-delete" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-warning"></i> Perhatian!</h4>
                <span>Hapus data ini dari sistem?</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                <a id="delete-yes" class="btn btn-outline"> Iya </a>
            </div>
        </div>
    </div>
</div>

<?php
/* End of file main-anggota.php */
/* Location: ./application/views/pages/anggota/main-anggota.php */