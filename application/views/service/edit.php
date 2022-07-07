<div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Modifier Services</p>
              </div>
            </div>
            <div class="card-body">

						<form method="post" action="<?php echo site_url('service/edit/'. $service['serviceID']); ?>">
              <div class="row">

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Titre</label>
                    <input class="form-control" type="text" id="title" name="title" placeholder="Entrer votre Titre" 
											value="<?php echo ($this->input->post('title') ? $this->input->post('title') : $service['title']); ?>">
											<span class="text-danger"><?php echo form_error('title');?></span>
                  </div>
                </div>
								
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">icon</label>
                    <select name="icon" id="pet-select">
													<option value="">--choisir une icone--</option>
													<option value="bi bi-briefcase">Message</option>
													<option value="bi bi-card-checklist">Liste</option>
													<option value="bi bi-bar-chart">Charte</option>
													<option value="bi bi-binoculars">Toure</option>
													<option value="bi bi-brightness-high">Soleil</option>
													<option value="bi bi-calendar4-week">Calendrier</option>
										</select>

                  </div>
                </div>

								<div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Date</label>
                    <input class="form-control" type="date" id="created_at" name="created_at" placeholder="Date" 
													value="<?php echo ($this->input->post('created_at') ? $this->input->post('created_at') : $service['created_at']); ?>">
													<span class="text-danger"><?php echo form_error('created_at');?></span>
                  </div>
                </div>

								<div class="col-md-6">
                  <div class="form-group">
                    <textarea name="desc" id="desc" cols="30" rows="5" name="decription" placeholder="Entrer votre description"
												value="<?php echo ($this->input->post('desc') ? $this->input->post('desc') : $service['desc']); ?>"></textarea>
												<span class="text-danger"><?php echo form_error('desc');?></span>
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
        