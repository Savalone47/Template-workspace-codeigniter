<div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
    <!-- End Navbar -->
  
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Modifier Un utilisateur</p>
              </div>
            </div>
            <div class="card-body">

		<form method="post" action="<?php echo site_url('user/edit/'. $management['adminID']); ?>">
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nom</label>
                    <input class="form-control" type="text" id="username" name="username" placeholder="Entrer votre Nom" 
								value="<?php echo ($this->input->post('username') ? $this->input->post('username') : $management['username']); ?>">
								<span class="text-danger"><?php echo form_error('username');?></span>
                  </div>
                </div>

								<div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Email</label>
                    <input class="form-control" type="email" id="email" name="email" placeholder="Entrer votre Email" 
									value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $management['email']); ?>">
									<span class="text-danger"><?php echo form_error('email');?></span>
                  </div>
                </div>
							<div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Mot de Passe</label>
                    <input class="form-control" type="password" id="password" name="password" placeholder="Changer votre Mot de passe" 
								value="<?php echo ($this->input->post('password') ? $this->input->post('password') : $management['password']); ?>">
								<span class="text-danger"><?php echo form_error('password');?></span>
                  </div>
                </div>	
                
				<div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Date</label>
                    <input class="form-control" type="date" id="created_at" name="created_at" placeholder="Date" 
									value="<?php echo ($this->input->post('created_at') ? $this->input->post('created_at') : $management['created_at']); ?>">
									<span class="text-danger"><?php echo form_error('created_at');?></span>
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
              <hr class="horizontal dark">
					<div class="box-footer">
						<button type="submit" class="btn btn-success">
							<i class="fa fa-check"></i> Save
						</button>
          		</div>
				</form>
            </div>
          </div>
        </div>
      </div>
     