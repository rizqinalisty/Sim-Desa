<div class="container">
 <div class="card">
 <div class="card-header text-center">
 <h4>Edit User</h4>
 </div>
 <div class="card-body">
 <a href="<?php echo base_url().'admin/user' ?>" class='btn btn-sm btnlight btn-outline-dark pull-right'><i class="fa fa-arrow-left"></i> Kembali</a>
 <br/>
 <br/>
 <?php foreach($petugas as $p){ ?>
 <form method="post" action="<?php echo base_url('User/User_Edit'); 
?>">
 <div class="form-group">
 <label class="font-weight-bold" for="nama">Nama Lengkap</label>
 <input type="hidden" value="<?php echo $p->username; ?>" name="username">
 <input type="text" class="form-control" name="username" 
placeholder="Masukkan Username" required="required" value="<?php echo $p->; 
?>">
 </div>
 <div class="form-group">
 <label class="font-weight-bold" for="username">Username</label>
<input type="text" class="form-control" name="username" 
placeholder="Masukkan username" required="required" value="<?php echo $p->username; 
?>">
 </div>
 <div class="form-group">
 <label class="font-weight-bold" for="password">Password</label>
 <input type="password" class="form-control" name="password" 
placeholder="Masukkan password">
 <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah 
password.</small>
 </div>
 <input type="submit" class="btn btn-primary" value="Simpan">
 </form>
 <?php } ?>
 </div>
 </div>
</div>