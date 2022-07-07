<div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
    <!-- End Navbar -->
  
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Ajouter</p>
              </div>
            </div>
            <div class="card-body">
					<form method="post" action="<?php echo base_url('partenaire/add')?>"  enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Titre</label>
                    <input class="form-control" type="text" id="title" name="title" placeholder="Entrer votre Titre" 
												value="<?php echo $this->input->post('title'); ?>">
												<span class="text-danger"><?php echo form_error('title');?></span>
                  </div>
                </div>

				<div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nom</label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="Entrer Nom" 
							value="<?php echo $this->input->post('name'); ?>">
					<span class="text-danger"><?php echo form_error('name');?></span>
                  </div>
                </div>

				<div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Categorie</label>
                    <input class="form-control" type="text" id="categorie" name="categorie" placeholder="exemple: web design" 
							value="<?php echo $this->input->post('categorie'); ?>">
					<span class="text-danger"><?php echo form_error('categorie');?></span>
                  </div>
                </div>

				<div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Lien du site Web</label>
                    <input class="form-control" type="url" id="url" name="url" placeholder="exemple.com" 
							value="<?php echo $this->input->post('url'); ?>">
					<span class="text-danger"><?php echo form_error('url');?></span>
                  </div>
                </div>
								
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">image</label>
                    <input class="form-control" type="file" name="image" id="image" 
													value="<?php echo $this->input->post('image'); ?>">
                  </div>
                </div>

				<div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Date</label>
                    <input class="form-control" type="date" id="created_at" name="created_at" placeholder="Date" 
							value="<?php echo $this->input->post('created_at'); ?>">
							<span class="text-danger"><?php echo form_error('created_at');?></span>
                  </div>
                </div>

				<div class="col-md-6">
                  <div class="form-group">
                    <textarea name="desc" id="desc" cols="30" rows="5" placeholder="Entrer votre description"
						value="<?php echo $this->input->post('desc'); ?>"></textarea>
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
        