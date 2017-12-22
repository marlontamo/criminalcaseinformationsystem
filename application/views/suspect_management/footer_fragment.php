
          
      </div><!--end page-content-wrapper-->
</div>
	<!--start footer ==================================================================================================-->      
      
	  <div class="footer">
        <p>&copy;Web Information System 2. Copyright 2013</p>
      </div>
	 
<!--end footer========================================================================================================-->

    </div><!--end of div container-->
   <script type="text/javascript">
    function confirmDelete(id){
        var agree=confirm("Are you sure you want to Delete?");
        if(agree){
            location.href = "http://localhost/wis2_project/index.php/case_delete/deleteCase/"+id;
		
        }
    }
	 function Delete(id){
        var agree=confirm("Are you sure you want to Delete?");
        if(agree){
            location.href = "http://localhost/wis2_project/index.php/admin_delete/delete/"+id;
		
        }
    }
	
</script>
	<script type="text/javascript" src="<?php echo base_url().'bootstrap/js/bootstrap.min.js'?>"></script>
    <!--script type="text/javascript" src="<//?php echo base_url().'bootstrap/js/bootstrap.js' ?>"></script-->
	<script type="text/javascript" src="<?php echo base_url().'bootstrap/js/jquery.min.js' ?>"></script>
	<!--script type="text/javascript" src="<//?php echo base_url().'bootstrap/js/less-1.3.3.min.js' ?>"></script-->
	<!--script type="text/javascript" src="<//?php echo base_url().'bootstrap/js/html5shiv.js' ?>"></script>
	<script type="text/javascript" src="<//?php echo base_url().'bootstrap/js/less-1.3.3.min.js' ?>"></script-->
	<script type="text/javascript" src="<?php echo base_url().'bootstrap/js/scripts.js' ?>"></script>
  
</body>
</html>
