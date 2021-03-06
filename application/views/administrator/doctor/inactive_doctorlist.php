<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-sm-3">
          <section class="panel">
             <header style="font-weight:300" class="panel-heading">
                 New Doctor
             <span class="tools pull-right">
				<a data-original-title="Show Active Doctors"
				   data-placement="top" 
				   data-toggle="tooltip"
				class="tooltips" href="<?=base_url()?>Admin/DoctorList" role="button" ><i style="color:black" class="fa fa-eye"></i></a>
             </span>
            </header>
               <div class="panel-body">
               <div class="adv-table">
              <table class="table">
			  
                  <tr>
                  </tr>
                  <tr>
                    <td>Number of Doctors: </td>
                    <td><?=$total_doctors_count?></td>
                  </tr>
                  <tr>
                    <td>Number of Active Doctors: </td>
                    <td><?=$total_active_doctors_count?></td>
                  </tr>
                  <tr>
                    <td>Number of Inactive Doctors: </td>
                    <td><?=$total_inactive_doctors_count?></td>
                  </tr>
              </table>
			  <center>
			  <a href="<?=base_url()?>Admin/AddDoctor" role="button" class="btn btn-sm btn-round btn-success"><i class="fa fa-plus-circle"></i> Add Doctor</a>
			  </center>
			  </div>
			  </div>
          </section>
      </div>
      <div class="col-sm-9">
        <section class="panel">
          <header style="font-weight:300" class="panel-heading">
                 Doctor List (Inactive)
             <span class="tools pull-right">
             </span>
          </header>
		  <div class="panel-body">
          <div class="adv-table">
          <table class="table table-striped" style="text-align: center;" id="dynamic-table">
		  <thead>
		   <tr id="tblheader">
                <th>#</th>
                <th>Name</th>
                <th>Contact No.</th>
                <th>Birthdate</th>
                <th>Specialty</th>
                <th>Action</th>
            </tr>
		   </thead>
		   <tbody>
            <?php
              foreach($doctors as $doctor){
                echo "<tr>";
                  echo "<td>DCTR-".$doctor['user_id']."</td>";
                  echo "<td>";
                    if($doctor['gender'] == 'M'){
                      echo "Mr. ";
                    }else{
                      echo "Ms. ";
                    }
                    echo $doctor['first_name']." ".$doctor['middle_name']." ".$doctor['last_name'];
                  echo "</td>";
                  echo "<td>".$doctor['contact_number']."</td>";
                  echo "<td>".date('F d, Y', strtotime($doctor['birthdate']))."</td>";
                  echo "<td>".$doctor['spec_name']."</td>";
                  echo "<td>";
                    echo "<div class='btn-group' role='group' aria-label='...'>";
                      echo "<a href='".base_url()."Admin/ActivateDoctor/".$doctor['user_id']."' role='button' class='btn btn-default btn-sm'>Activate</a>";
                    echo "</div>";
                  echo "</td>";
                echo "</tr>";
              }
            ?>
		  </tbody>
          </table>
		  </div>
		  </div>
        </section>
      </div>
    </div>
  </section>
</section>

<script src="<?=base_url()?>js/jquery.js"></script>
<script src="<?=base_url()?>js/bootstrap.min.js"></script>

<script class="include" type="text/javascript" src="<?=base_url()?>js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?=base_url()?>js/jquery.scrollTo.min.js"></script>
<script src="<?=base_url()?>js/jquery.nicescroll.js" type="text/javascript"></script>

<!--right slidebar-->
<script src="<?=base_url()?>js/slidebars.min.js"></script>
<!--common script for all pages-->
<script src="<?=base_url()?>js/common-scripts.js"></script>

<!--dynamic table initialization -->
<script type="text/javascript" language="javascript" src="<?php echo base_url()?>assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/data-tables/DT_bootstrap.js"></script>
<script src="<?php echo base_url()?>js/dynamic_table_init.js"></script>
